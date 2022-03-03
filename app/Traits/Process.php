<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;
use Illuminate\Support\Str;
use App\User;
use App\Models\Request as solicitud;
use App\Models\RequestHistory as history;
use App\Models\RequestResponse as responses;
use App\Models\RequestLanguage as lanjuage;
use App\Models\RequestSystem as systems;
use App\Models\RequestTopic as topics;
use App\Models\RequestFile as filesRequest;
use App\Models\RequestQuoteTutor as requestTutor;
use App\Models\RequestQuote as Quote;
use App\Models\Communications;
use App\Models\Bonds as bonds;
use App\Models\BondQuote as rel_bond;
use Facade\Ignition\QueryRecorder\Query;
use GuzzleHttp\Psr7\Message;

trait Process
{
    public function getInfoTrm($id)
    {
        $trm = User::find($id)->coins->c_trm_currency;
        return $trm;
    }

    public function getInfoRequest($id_rol = null)
    {
        $query = solicitud::orderBy('date_delivery');

        if($id_rol == 4){
            $query = $query->where('requests.user_id',Auth::user()->id);
        }elseif($id_rol == 6){

            $query =$query->where('request_state_id',2);
           

            $arrayServices = [];
            $arrayTopics = [];

            $user = User::find(Auth::user()->id);

            $services = $user->tutorServices->where('t_s_state',1)->toArray();
            $topics = $user->tutorTopics->where('t_t_state',1)->toArray();

            foreach ($services as $key => $value) {
                array_push($arrayServices,$value['id_service']);
            }
            foreach ($topics as $key => $value) {
                array_push($arrayTopics,$value['id_topic']);
            }
            if (count($arrayServices) > 0) {
                $query = $query->whereIn('type_service_id',$arrayServices);
            }
            
            if (count($arrayTopics) > 0) {  
                $query = $query->join('request_topics','request_topics.request_id','=','requests.id')
                ->whereIn('request_topics.topic_id',$arrayTopics);
            }
        }
        return $query;
    }

    public function infoClients()
    {
        $clients = User::join('model_has_roles as m','m.model_id','=','users.id')
        ->where('m.role_id',4)
        ->select('users.id','users.u_nickname')
        ->get();

        return $clients;
    }

    public function saveRequest($data)
    {
        try {
            $communication = null;
            if (isset($data->id_request)) {         
                $register = solicitud::find($data->id_request);
                $register->updated_by = Auth::user()->id;
            }else{
                $register = new solicitud();
                $register->created_by = Auth::user()->id;
                $communication = new Communications([
                    'id_user' => Auth::user()->id,
                    'c_status' => 1
                ]);                
            }
            $register->date_delivery = $data->deliver_date;
           
            $register->type_service_id  = $data->id_service;
            $register->request_state_id  = 1;
            if (isset($data->id_client)) {         
                $register->user_id = $data->id_client;
                $register->note_private_comercial = $data->note_private;
            }else{
                $register->user_id = Auth::user()->id;
                $register->observation = $data->observations;
            }
            $register->save();            
            if (!is_null($communication)) {            
                $register->communications()->save($communication);
                $communication->messages()->create([
                    'id_user' => 1,
                    'm_date_message' => date('Y-m-d H:i:s'),
                    'm_text_message' => sprintf(
                        'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,'
                        . 'por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #%d,'
                        .' nuestro personal está atento a responder tus mensajes', 
                        $communication->id
                    ),
                    'm_state' => 0,
                ]);
            }

            $id_request = $register->id;

            if (!isset($data->id_request)) {  
                $this->changeHistoryState($id_request,1);
            }else{
                $this->deletaDataTable($id_request,'request_responses'); 
                $this->deletaDataTable($id_request,'request_languages'); 
                $this->deletaDataTable($id_request,'request_systems'); 
                $this->deletaDataTable($id_request,'request_topics'); 
                if ($data->hasFile('file')) {
                    if (count($data->files_changes) == count($data->File('file'))) { 
                        $this->deletaDataTable($id_request,'request_files'); 
                    }
                }
            }

            if (isset($data->question)) {
                $this->saveQuestionsRequest($data->question,$data->answer,$id_request);
            }
            if (isset($data->id_language)) {
                $this->saveLanjuagesRequest($data->id_language,$id_request);
            }
            if (isset($data->id_system)) {
                $this->saveSystemsRequest($data->id_system,$id_request);
            }
            if (isset($data->id_topic)) {
                $this->saveTopicsRequest($data->id_topic,$id_request);
            }
            if ($data->hasFile('file')) {
                $files = $data->file("file");
                $this->saveFilesRequest($files,$id_request);
            }

            

            return true;
            
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function changeHistoryState($id,$state,$state_old = null)
    {
        try {

            if ($state_old != null) {           
                $consult = history::where('request_id',$id)->where('request_state_id',$state_old)->first();
                //dd($consult);
                if ($consult != null) {
                    $consult->end_date = $this->get_date_now();
                    $consult->updated_by = Auth::user()->id;
                    $consult->save();
                }
               
            }
            
            $history = new history();
            $history->start_date = $this->get_date_now();
            $history->request_id  = $id;
            $history->request_state_id = $state;
            $history->created_by = Auth::user()->id;
            $history->save();
            return true;  
          
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function deletaDataTable($id,$table)
    {
        try {            
            $registers = DB::table($table)->where('request_id',$id)->get();

            if (count($registers) > 0) {
                foreach ($registers as $key => $reg) {

                   DB::table($table)
                    ->where('id',$reg->id)
                    ->update([
                        'deleted_at' => Carbon::now()->parse()->format('Y-m-d H:m:s'),
                        'deleted_by' => Auth::user()->id,
                     ]);
                 }
            }           
            return true;  
          
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function deleteFile($id)
    {
        $file_exist = filesRequest::find($id);
        $file_exist->deleted_by = Auth::user()->id;
        $file_exist->save();
        $file_exist->delete();

        if(isset($file_exist))
        {
            $file_path = public_path() .'/folders/request/files_request_'.$file_exist->request_id.'/file_'.$file_exist->id.'/'.$file_exist->file.'';
            if (File::exists($file_path)) {
                File::delete($file_path);
            }  
        }      
    }

    public function saveQuestionsRequest($question,$answers,$id)
    {
        try {
            foreach ($question as $key => $value) {
                $register = new responses();
                $register->response = $answers[$key];
                $register->request_id = $id;
                $register->request_question_id = $value;
                $register->created_by = Auth::user()->id;
                $register->save();
            }
            return true;  
          
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function saveLanjuagesRequest($data,$id)
    {
        try {
            foreach ($data as $key => $value) {
                $register = new lanjuage();
                $register->request_id = $id;
                $register->language_id  = $value;
                $register->created_by = Auth::user()->id;
                $register->save();
            }
            return true;  
          
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function saveSystemsRequest($data,$id)
    {
        try {
            foreach ($data as $key => $value) {
                $register = new systems();
                $register->request_id = $id;
                $register->system_id  = $value;
                $register->created_by = Auth::user()->id;
                $register->save();
            }
            return true;  
          
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function saveTopicsRequest($data,$id)
    {
        try {
            foreach ($data as $key => $value) {
        
                $register = new topics();
                $register->request_id = $id;
                $register->topic_id   = $value;
                $register->created_by = Auth::user()->id;
                $register->save();
            }
           
            return true;  
          
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function saveFilesRequest($data,$id)
    {
        try {
            foreach ($data as $key => $value) {

                $register = new filesRequest();          
                $register->request_id = $id;
                $register->created_by = Auth::user()->id;
                $register->save();
                $file_exist = filesRequest::where('request_id',$id)->get();

                if(count($file_exist) > 0)
                {
                    foreach ($file_exist as $key => $item) {
                        $file_path = public_path() .'/folders/request/files_request_'.$id.'/file_'.$item->file;
                        if (File::exists($file_path)) {
                            File::delete($file_path);
                        }
                    }
                }          
                $name = $value->getClientOriginalName();
                $path = public_path() .'/folders/request/files_request_'.$id.'/file_'.$register->id;            
                $value->move($path,$name);            
                $register->file = $name;
                $register->save();              
            }    
            
            return true;  
          
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function changeState($id,$state)
    {
        $state_old = null;
        if ($state == 2) {
            $state_old = 1;
        }else if ($state == 3) {
            $state_old = 2;
        }
 
        $this->changeHistoryState($id,$state,$state_old);

        $register = solicitud::find($id);
        $register->request_state_id = $state;
        $register->updated_by = Auth::user()->id;
        $register->save();

        return true;
       
    }

    public function deleteRequest($id)
    {
        $register = solicitud::find($id);
        $register->deleted_by = Auth::user()->id;
        $register->save();
        $register->delete();

        return true;
    }

    public function saveQuotesTutors($data)
    {
        $trm = $this->getInfoTrm(Auth::user()->id);
       
        if (isset($data->id_quote_tutor)) {
            $register = requestTutor::find($data->id_quote_tutor);
            $register->updated_by = Auth::user()->id;
        }else{
            $register = new requestTutor();
            $register->created_by = Auth::user()->id;
        }
        $register->value = $data->value;
        $register->trm_assigned = $trm;
        $register->observation = $data->comentarios_tutor;
        $register->request_id  = $data->id_request;
        $register->user_id  = Auth::user()->id;
        $register->application_date = $data->fecha_postulada;
        $register->save();

        return true;
    }

    public function DataQuotesTutor()
    {
        $query = requestTutor::orderBy('created_at');
        return $query;
    }

    public function validateTopicsRequest($id)
    {
        $solicitud = solicitud::find($id);
        if(count($solicitud->requestTopics) > 0){
            return false;
        }else{
            return true;
        }
    }

    public function getInfoBonds($id)
    {
        $bonds = bonds::where('id_user',$id)->where('b_state',1)->get();
        return $bonds;
    }

    public function saveQuotesFormal($request)
    {
        try {
           
            $register = new Quote();
            $register->value = $request->value_cot_formal;
            $register->value_utility = $request->value_utility;
            $register->observation = $request->observation;
            $register->private_note = $request->private_note;
            $register->request_quote_tutor_id = $request->id_request_tutor;
            $register->utility_type_id = $request->type_utility;
            $register->date_quote = $request->date_quote;
            $register->date_validate = $request->date_validate;
            $register->trm_assigned = $request->value_trm_client;
            $register->created_by = Auth::user()->id;
            $register->save();

            if ($request->id_bond != 0) {

                $bond = bonds::find($request->id_bond);
                $value_bond = 0;
                $divisor = 0;

                if($bond->value_bond->p_text == "Porcentaje"){
                    $divisor = 100 - $bond->b_value;
                    $value_bond = (((float)$request->value_cot_formal / $divisor) * 100)-(float)$request->value_cot_formal;
                }else{
                    $value_bond = $bond->b_value;
                }

                $relation = new rel_bond();
                $relation->bond_id = $request->id_bond;
                $relation->request_quote_id  = $register->id;
                $relation->value_bond = $value_bond;
                $relation->trm_assigned = $request->value_trm_client;
                $relation->created_by = Auth::user()->id;
                $relation->save();
               
            }
            $this-> changeState($register->requestQuoteTutor->request_id,3);
            //dd($request->id_bond);
            if ($request->id_bond != 0) {
                $this-> changeStateBond($request->id_bond,2);
            }
            return $register;

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function changeStateBond($id,$state)
    {
        $bond = bonds::find($id);
        $bond->b_state = $state;
        $bond->updated_by = Auth::user()->id;
        $bond->save();

        return true;
    }

    public function deleteQuote($id)
    {
        $register = Quote::find($id);
        $request = solicitud::find($register->requestQuoteTutor->request->id);
        $this->changeHistoryState($request->id,2,3);
        $request->request_state_id = 2;
        $request->updated_by = Auth::user()->id;
        $request->save();
        $this-> changeStateBond($register->requestBond->bond_id,1);
        $register->deleted_by = Auth::user()->id;
        $register->save();
        $register->delete();

        return true;
    }
    
}