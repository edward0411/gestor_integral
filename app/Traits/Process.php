<?php namespace app\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Request as solicitud;
use App\Models\RequestHistory as history;


trait Process
{
    const CREADA               = 1;
    const ENVIADA_TUTOR        = 2;
    const EN_COTIZACIÓN        = 3;
    const EN_DEARROLLO         = 4;
    const ENTREGABLE           = 5;
    const ENTREGABLE_APROBADO  = 6;
    const ENTREGABLE_RECHAZADO = 7;


    public function saveRequest($data)
    {
        try {

            if (isset($data->id_request)) {         
                $register = solicitud::find($data->id_request);
            }else{
                $register = new solicitud();
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
            if (isset($data->id_request)) {         
                $register->created_by = Auth::user()->id;
            }else{
                $register->created_by = Auth::user()->id;
            }
            $register->save();        
            $id_request = $register->id;
    
            $this->changeHistoryState($id_request,Process::CREADA);
            
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
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
    
}