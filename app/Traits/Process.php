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
use App\Models\Work;
use App\Models\WorkDetail;
use App\Models\Deliverable;
use App\Models\Observations_services as obs_services;
use App\Models\Deliverable_qualificates as Qualificate;
use App\Models\PointsQualificates as Points;

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
                if ($consult != null) {
                    $consult->end_date = Carbon::now()->parse()->format('Y-m-d H:m:s');
                    $consult->updated_by = Auth::user()->id;
                    $consult->save();
                }             
            }          
            $history = new history();
            $history->start_date =  Carbon::now()->parse()->format('Y-m-d H:m:s');
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
        }else if($state == 4){
            $state_old = 3;
        }else if($state == 5){
            $state_old = 4;
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
        $query = requestTutor::join('requests as r','r.id','=','request_quote_tutors.request_id')
        ->select('request_quote_tutors.*')
        ->whereNull('r.deleted_at')
        ->orderBy('created_at');
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

            if (isset($request->id_quote)) {
                $register = Quote::find($request->id_quote);


                $register->updated_by = Auth::user()->id;
            }else{
                $register = new Quote();
                $register->created_by = Auth::user()->id;
            }
           
            $register->value = $request->value_cot_formal;
            $register->value_utility = $request->value_utility;
            $register->observation = $request->observation;
            $register->private_note = $request->private_note;
            $register->request_quote_tutor_id = $request->id_request_tutor;
            $register->utility_type_id = $request->type_utility;
            $register->date_quote = $request->date_quote;
            $register->date_validate = $request->date_validate;
            $register->trm_assigned = $request->value_trm_client;
           
            $register->save();

           if ($register->requestBond == null) {
                if ($request->id_bond > 0) {
                    $this->saveQuoteBond($request,$register->id);
                }
           }else{
                if ($request->id_bond == 0) {
                    $this->changeRelationBond($register);            
                }elseif($request->id_bond > 0){
                    $this->changeRelationBond($register); 
                    $this->saveQuoteBond($request,$register->id);
                    $this-> changeStateBond($request->id_bond,2);
                }
           }

           if (!isset($request->id_quote)) {
               $this-> changeState($register->requestQuoteTutor->request_id,3);
                if ($request->id_bond != 0) {
                    $this-> changeStateBond($request->id_bond,2);
                }
           }
            
            return $register;

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function changeRelationBond($register)
    {
        $this->changeStateBond($register->requestBond->bond_id,1);

        $relation = rel_bond::find($register->requestBond->id);
        $relation->deleted_by = Auth::user()->id;
        $relation->save();
        $relation->delete();

        return true;
    }

    public function saveQuoteBond($request,$id)
    {
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
        $relation->request_quote_id  = $id;
        $relation->value_bond = $value_bond;
        $relation->trm_assigned = $request->value_trm_client;
        $relation->created_by = Auth::user()->id;
        $relation->save();

        return true;
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
        if ($register->requestBond != null) {
            $this-> changeStateBond($register->requestBond->bond_id,1);
        }
        $register->deleted_by = Auth::user()->id;
        $register->save();
        $register->delete();

        return true;
    }

    public function createWorkQuote($id)
    {
        try {
            $register = new Work();
            $register->start_date = $this->get_date_now();
            $register->request_quote_id  = $id;
            $register->created_by = Auth::user()->id;
            $register->save();

            $this->changeState($register->requestQuote->requestQuoteTutor->request->id,4);

            return true;     

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function infoQuote($id)
    {
        $query = Work::find($id);
        return $query; 
    }

    public function dataInfoWorksTutor($id_tutor)
    {
        $query = Work::join('request_quotes','request_quotes.id','=','works.request_quote_id')
        ->join('request_quote_tutors','request_quote_tutors.id','=','request_quotes.request_quote_tutor_id')
        ->where('request_quote_tutors.user_id',$id_tutor)
        ->select('works.*')
        ->get();

        return $query;
    }

    public function saveDetailWork($request,$id,$name)
    {
        $detail = new WorkDetail();
        $detail->observation = $request->message;
        $detail->file = $name;
        $detail->work_id = $id;
        $detail->created_by = Auth::user()->id;
        $detail->save();

        return true;
    }

    public function getDataDeliverables()
    {
        $id_rol = Auth::user()->roles()->first()->id;

        $query = Deliverable::join('works as w','w.id','=','deliverables.work_id')
        ->join('request_quotes as rq','rq.id','=','w.request_quote_id')
        ->join('request_quote_tutors as rqt','rqt.id','=','rq.request_quote_tutor_id')
        ->select('deliverables.*');

        if($id_rol == 6){
            $query = $query->where('rqt.user_id', Auth::user()->id);
        }else if($id_rol == 4){
            $query = $query
            ->join('requests as r','r.id','=','rqt.request_id')
            ->where('r.user_id', Auth::user()->id)
            ->where('deliverables.status',2);
        }
        $query = $query->get();

        return $query;
    }

    public function saveDataDeliverable($request)
    {
        try {
            $work = Work::find($request->id_work);
            $work->end_date = $this->get_date_now();
            $work->save();

            if(!isset($request->id_deliverable))
            {
                $register = new Deliverable();
                $this->changeState($work->requestQuote->requestQuoteTutor->request->id,5);
            }else{
                $register = Deliverable::where('id',$request->id_deliverable)->first();
            }
            $register->date_delivery = Carbon::now()->parse()->format('Y-m-d');
            $register->observaciones = $request->obs_deliverable;
            $register->work_id  = $request->id_work;
            if(!isset($request->id_deliverable)){
            $register->created_by = Auth::user()->id;
            }else{
            $register->updated_by = Auth::user()->id;
            }
            $register->save();

            $id_register = $register->id;

            if($request->hasFile('file_deliverable')){
                $file_path = public_path() .'/folders/deliverables/deliverable_'.$id_register.'/'.$register->file;
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
                $file = $request->file('file_deliverable');
                $name = $file->getClientOriginalName();
                $path = public_path() .'/folders/deliverables/deliverable_'.$id_register;
                $file->move($path,$name);

                $register->file = $name;
                $register->save();
            }

            if($request->hasFile('cuenta_cobro')){
                $file_path = public_path() .'/folders/deliverables/charge_acount_'.$id_register.'/'.$register->cuenta_cobro;
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
                $file = $request->file('cuenta_cobro');
                $name = $file->getClientOriginalName();
                $path = public_path() .'/folders/deliverables/charge_acount_'.$id_register;
                $file->move($path,$name);

                $register->cuenta_cobro = $name;
                $register->save();
            }

            return true;

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function getInfoDeliverable($id)
    {
        $query = Deliverable::find($id);
        return $query;
    }

    public function getDeleteDeliverable($id)
    {
        $register = Deliverable::find($id);
        $request = solicitud::find($register->work->requestQuote->requestQuoteTutor->request->id);
        $this->changeHistoryState($request->id,4,5);
        $request->request_state_id = 4;
        $request->updated_by = Auth::user()->id;
        $request->save();
        $register->deleted_by = Auth::user()->id;
        $register->save();
        $register->delete();

        return true;
    }

    public function dataObsService($service_id)
    {
        $observatios = obs_services::where('id_service',$service_id)->get();
        return $observatios;
    }

    public function changeStateCamp($id,$camp,$status)
    {
        $register = Deliverable::find($id);
        $register->$camp = $status;
        $register->save();

        return true;
    }

    public function infoDeliverable($id)
    {
        $query = Deliverable::find($id);
        return $query;
    }

    public function getInfoPoints()
    {
        $query = Points::all();
        return $query;
    }

    public function saveQualification($request)
    {
        try {
            if (isset($request->id_qualificate)) {
                $quality = Qualificate::find($request->id_qualificate);
                $quality->updated_by = Auth::user()->id;
            }else{
                $quality = new Qualificate();
                $quality->id_deliverable = $request->id_deliverable;
                $quality->created_by = Auth::user()->id;
            }
            
            $quality->date_qualificate = $this->get_date_now();
            $quality->state_deliverable = $request->type_bond;
            $quality->value_qualificate = $request->num_qualificate;
            
            $quality->save();

            if ( $quality->state_deliverable == 113) {
                $this->changeStateCamp($request->id_deliverable,'status_deliverable',3);
                if (!isset($request->id_qualificate)) {
                    $solicitud = solicitud::find($quality->deliverable->work->requestQuote->requestQuoteTutor->request->id);
                    $this->changeHistoryState($solicitud->id,7,5);
                    $solicitud->request_state_id = 7;
                    $solicitud->updated_by = Auth::user()->id;
                    $solicitud->save();
                }
            }else{
                $this->changeStateCamp($request->id_deliverable,'status_deliverable',2);
                if (!isset($request->id_qualificate)) {
                $solicitud = solicitud::find($quality->deliverable->work->requestQuote->requestQuoteTutor->request->id);
                $this->changeHistoryState($solicitud->id,6,5);
                $solicitud->request_state_id = 6;
                $solicitud->updated_by = Auth::user()->id;
                $solicitud->save();
                }
            }


            return true;
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function datDataQualificate($id)
    {
        $query = Qualificate::find($id);
        return $query;
    }

    public function getDeleteQualificate($id)
    {
        $register = Qualificate::find($id);
        $request = solicitud::find($register->deliverable->work->requestQuote->requestQuoteTutor->request->id);
        $this->changeHistoryState($request->id,5,$request->request_state_id);      
        $request->request_state_id = 5;
        $request->updated_by = Auth::user()->id;
        $request->save();

        $deliverable = Deliverable::find($register->id_deliverable);
        $deliverable->status_deliverable = 1;
        $deliverable->save();

        $register->deleted_by = Auth::user()->id;
        $register->save();
        $register->delete();

        return true;
    }   
    
    public function getDataQualificate($id)
    {
        $qualificate = Qualificate::join('points_qualificates as pq','pq.id','=','deliverable_qualificates.value_qualificate')
        ->join('deliverables as d','d.id','=','deliverable_qualificates.id_deliverable')
        ->join('works as w','w.id','=','d.work_id')
        ->join('request_quotes as rq','rq.id','=','w.request_quote_id')
        ->join('request_quote_tutors as rqt','rqt.id','=','rq.request_quote_tutor_id')
        ->whereNull('deliverable_qualificates.deleted_at')
        ->whereNull('d.deleted_at')
        ->whereNull('w.deleted_at')
        ->whereNull('rq.deleted_at')
        ->whereNull('rqt.deleted_at')
        ->where('rqt.user_id',$id)
        ->select('pq.point_value')
        ->get();

        $count = count($qualificate);
        $points = null;
        $sum = 0;
        $number = null;

        if ($count > 0) {
           foreach ($qualificate as $key => $quality) {
              $sum = $sum + (float)$quality->point_value;
           }

           $points = $sum/$count;

           if ($points >= 0 && $points <= 0.4) {
                $number = 1;
            }else if($points >= 0.5 && $points <= 0.9) {
                $number = 2;
            }else if($points >= 1.0 && $points <= 1.4) {
                $number = 3;
            }elseif ($points >= 1.5 && $points <= 1.9) {
                $number = 4;
            }elseif ($points >= 2.0 && $points <= 2.4) {
                $number = 5;
            }elseif ($points >= 2.5 && $points <= 2.9) {
                $number = 6;
            }elseif ($points >= 3.0 && $points <= 3.4) {
                $number = 7;
            }elseif ($points >= 3.5 && $points <= 3.9) {
                $number = 8;
            }elseif ($points >= 4.0 && $points <= 4.4) {
                $number = 9;
            }elseif ($points >= 4.5 && $points <= 4.9) {
                $number = 10;
            }elseif ($points == 5.0 ) {
                $number = 11;
            }
        }

        return $number;
    }
}