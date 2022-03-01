<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;
use App\Traits\Process;
use App\Traits\ApiResponser;
use App\User;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\RequestQuote as Quote;

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
        $data = $this->getInfoRequest($id_rol)
        ->leftJoin('request_quote_tutors as qt', function($join)
        {
            $join->on('qt.request_id','=','requests.id')
            ->where('qt.user_id',Auth::user()->id);
        })
        ->select('requests.*','qt.id as id_cot')
        ->distinct()
        ->get();

        if ($id_rol == 4) {
            return view('process.request.index',compact('data'));
        }
        return view('process.request.list_request',compact('data'));
    }

    public function list_request()
    {
        $data = $this->getInfoRequest()->where('request_state_id',2)->get();

        return view('process.quotes.index',compact('data'));
    }

    public function create_request()
    {

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

    public function edit_request($id)
    {

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

    public function store_request(Request $request)
    {

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

           $request = $this->validateTopicsRequest($id);

           if($request){
              return redirect()->back()->withErrors(['error' => 'No se puede solicitar cotizaciones a esta solicitud, pendiente asignarles temas']);
           }
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

    /////////// Cotizaciones  tutor//////////

    public function index_quotes()
    {
        return view('process.quotes.index');
    }

    public function create_quotes_turtor($id)
    {

        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();
        $request = $this->getInfoRequest(Auth::user()->roles()->first()->id)->where('requests.id',$id)->select('requests.*')->first();
        $user = User::find(Auth::user()->id);
        return view('process.quotes.create',compact('request','question','languages','list_systems','areas','subjects','topics','user'));
    }

    public function edit_quotes_turtor($id)
    {

        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();
        $request = $this->getInfoRequest(Auth::user()->roles()->first()->id)->where('requests.id',$id)->select('requests.*')->first();
        $user = User::find(Auth::user()->id);
        return view('process.quotes.edit',compact('request','question','languages','list_systems','areas','subjects','topics','user'));
    }

    public function store_quotes_tutors(Request $request)
    {
        $this->saveQuotesTutors($request);

        return redirect()->route('process.request.index',Auth::user()->roles()->first()->id)->with('success','Registro creado con éxito');
    }

    public function view_list_quotes_tutor($id)
    {
        $quotes_tutors = $this->DataQuotesTutor()->where('request_id',$id)->get();
        $request = $quotes_tutors[0]->request;

        return view('process.quotes.list_quotes_tutor',compact('quotes_tutors','request'));

    }

     ////////// trabajos  ////////
    public function index_works()
    {
        return view('process.works.index');
    }

    public function list_works()
    {
        $quotes = Quote::join('request_quote_tutors as rt','rt.id','=','request_quotes.request_quote_tutor_id')
        ->join('requests','rt.request_id','=','requests.id')
        ->whereNull('requests.deleted_at')
        ->select('request_quotes.*')
        ->get();

        return view('process.works.list',compact('quotes'));
    }

    public function create_works()
    {
        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.works.create',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }

    public function edit_works()
    {
        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('process.works.edit',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }


    //////////////Cotizaciones formales///////////

    public function create_quotes($id)
    {
        $request = $this->DataQuotesTutor()->find($id);
        $type_value = $this->getDataParametrics('param_type_value')->orderby('p_order')->get();
        $bonds = $this->getInfoBonds($request->request->users->id);
        $trm = $this->getInfoTrm($request->request->users->id);
        $fecha = $this->get_date_now();
        $fechaMax = Carbon::now()->addDays(1)->format('Y-m-d');

        
        return view('process.quotes.create_formal',compact('request','type_value','bonds','trm','fecha','fechaMax'));
    }

    public function store_quotes(Request $request)
    {
        $this->validateQuotes($request);

        $data = $this->saveQuotesFormal($request);

        $pdf = PDF::loadView('process.quotes.pdf_quote_formal',compact('data'));
        Storage::put('Folders/Quotes/quote_'.$data->id.'.pdf', $pdf->output());


        //return $pdf->download('invoice.pdf');

    }

    public function validateQuotes($request)
    {
        $rules = [];
        $messages = [];
        $fecha_quote = $request->date_quote;
        $fecha_max = $request->date_validate;

        if ($fecha_max < $fecha_quote) {
            $rules['validate1'] = 'required';
            $messages['validate1.required'] =trans('La fecha maxima de validez no puede ser inferior a la fecha de creación');  
        }

        if ($request->value_utility == 0) {
            $rules['validate2'] = 'required';
            $messages['validate2.required'] =trans('Por favor asigne un valor de utilidad a la cotización formal');  
        }
        $this->validate($request, $rules, $messages);
        return true;
    }

    public function download_quote($id)
    {
        return Storage::download("Folders/Quotes/quote_".$id.'.pdf');
    }
}
