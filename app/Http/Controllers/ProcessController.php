<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;
use App\Traits\Process;
use App\Traits\ApiResponser;
use Session;
use Illuminate\Support\Facades\Auth;

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

    public function index_request($id_rol)
    {
        $data = $this->getInfoRequest($id_rol)->select('requests.*')->distinct()->get();

        if ($id_rol == 4) {
            return view('process.request.index',compact('data'));
        }
        return view('process.request.list_request',compact('data'));
    }

    public function create_request(){

        $users = [];

        if(Auth::user()->roles()->first()->id != 4)
        {
            $users = $this->infoClients();
        }
        
        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.request.create',compact('languages','list_systems','areas','subjects','topics','services','question','users'));
    }

    public function edit_request($id){

        $users = [];

        if(Auth::user()->roles()->first()->id != 4)
        {
            $users = $this->infoClients();
        }

        $request = $this->getInfoRequest(Auth::user()->roles()->first()->id)->where('id',$id)->first();

        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.request.edit',compact('request','languages','list_systems','areas','subjects','topics','services','question','users'));
    }

    public function store_request(Request $request){

        $this->validateRequest($request);      
        $this->saveRequest($request);
        return redirect()->route('process.request.index',Auth::user()->roles()->first()->id)->with('success','Registro actualizado con éxito');
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

    public function delete_file(Request $request)
    {
        $this->deleteFile($request->id);

        return true;
    }

    public function change_estate($id, $state = null)
    {
        if ($state == null) {
           $state = 2;
        }
        $this->changeState($id,$state);

        return redirect()->route('process.request.index',Auth::user()->roles()->first()->id)->with('success','Registro actualizado con éxito');
    }

    public function delete_request($id)
    {
        $this->deleteRequest($id);
        return redirect()->route('process.request.index',Auth::user()->roles()->first()->id)->with('success','Registro eliminado con éxito');
    }

    /////////// Cotizaciones  //////////

    public function index_quotes()
    {
        return view('process.quotes.index');
    }

    public function create_quotes($id){

        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();
        $request = $this->getInfoRequest(Auth::user()->roles()->first()->id)->where('requests.id',$id)->select('requests.*')->first();
        return view('process.quotes.create',compact('request','question','languages','list_systems','areas','subjects','topics'));
    }

    public function edit_quotes(){

        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.quotes.edit',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }

    public function store_quotes(Request $request)
    {
        $this->saveQuotes($request);

        return redirect()->route('process.request.index',Auth::user()->roles()->first()->id)->with('success','Registro creado con éxito');
    }

     ////////// trabajos  ////////
    public function index_works()
    {
        return view('process.works.index');
    }

    public function create_works(){

        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.works.create',compact('languages','list_systems','areas','subjects','topics','services','question'));

    }

    public function edit_works(){

        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.works.edit',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }
}
