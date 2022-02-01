<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;
use App\Traits\Process;
use App\Traits\ApiResponser;
use Session;


class ProcessController extends Controller
{
    const CREADA               = 1;
    const ENVIADA_TUTOR        = 2;
    const EN_COTIZACIÓN        = 3;
    const EN_DEARROLLO         = 4;
    const ENTREGABLE           = 5;
    const ENTREGABLE_APROBADO  = 6;
    const ENTREGABLE_RECHAZADO = 7;

    use Managment;
    use Process;  
    use ApiResponser;

    public function index_request()
    {
        return view('process.request.index');
    }

    public function create_request(){
        
        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.request.create',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }

    public function edit_quotes(){

        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('quotes.edit_my_quotes',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }

    public function store_request(Request $request){

        $this->validateRequest($request);      
        $this->saveRequest($request);
        return redirect()->route('process.request.index')->with('success','Registro actualizado con éxito');
    }

    public function validateRequest($request)
    {
        $rules = [];
        $messages = [];
        $files = $request->file("file");

        if($files != null){
            foreach($files as $key => $file)
            {  
                $name = $file->getClientOriginalName();
                $extFile = $file->getClientOriginalExtension();
                $sizeFile[$key] =  $file->getSize();
    
                if(intval($sizeFile[$key]) >= 10000000)
                {
                    $rules['fileZise'.$key] = 'required';
                    $messages['fileZise'.$key.'.required'] =trans('El tamaño máximo permitido es de :size, El archivo es :file', ['size' => '10MB','file' => $name]);               
                }         
            }
            $this->validate($request, $rules, $messages);
        }

        return true;
    }
}
