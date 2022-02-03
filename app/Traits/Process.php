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
use App\Models\Communications;
use Facade\Ignition\QueryRecorder\Query;
use GuzzleHttp\Psr7\Message;

trait Process
{
    public function getInfoRequest($id_rol)
    {
        $query = solicitud::orderBy('date_delivery');

        if($id_rol == 4){
            $query = $query->where('user_id',Auth::user()->id);
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
            $register->observation = $data->observations;
            $register->type_service_id  = $data->id_service;
            $register->request_state_id  = 1;
            if (isset($data->id_client)) {         
                $register->user_id = $data->id_client;
            }else{
                $register->user_id = Auth::user()->id;
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

            if ($data->id_request != null) {         
                $this->changeHistoryState($id_request,1);
            }else{
                $this->deletaDataTable($id_request,'request_responses'); 
                $this->deletaDataTable($id_request,'request_languages'); 
                $this->deletaDataTable($id_request,'request_systems'); 
                $this->deletaDataTable($id_request,'request_topics'); 
                $this->deletaDataTable($id_request,'request_files'); 
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
                $consult->end_date = $this->get_date_now();
                $consult->updated_by = Auth::user()->id;
                $consult->save();
            }

            $state = new history();
            $state->start_date = $this->get_date_now();
            $state->request_id  = $id;
            $state->request_state_id = $state;
            $state->created_by = Auth::user()->id;
            $state->save();

            return true;  
          
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    public function deletaDataTable($id,$table)
    {
        try {            
            $registers = DB::table($table)->where('request_id')->get();

            if (count($registers) > 0) {
                foreach ($registers as $key => $reg) {
                    $reg->update([
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
            return $this->errorResponse($e->getMessage(), 409);
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
    
}