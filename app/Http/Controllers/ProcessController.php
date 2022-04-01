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
    const ENTREGABLE_CARGADO   = 5;
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
        $data = $this->DataQuotesTutor()->where('request_quote_tutors.user_id',Auth::user()->id)->get();
        return view('process.quotes.myQuotes',compact('data'));
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

        foreach ($quotes_tutors as $key => $tutor) {
           $qualificate = $this->getDataQualificate($tutor->user_id);
           $tutor->qualificate = $qualificate;
        }

        return view('process.quotes.list_quotes_tutor',compact('quotes_tutors','request'));

    }

     ////////// trabajos  ////////
    public function index_works()
    {
        $id_tutor = Auth::user()->id;

        $work = $this->dataInfoWorksTutor($id_tutor);

        return view('process.works.index',compact('work'));
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

    public function create_works($id)
    {
        $this->createWorkQuote($id);
        return redirect()->route('process.works.list')->with('success','Trabajo creada con éxito');
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

    public function view_works($id)
    {
        $work = $this->infoQuote($id);
        return view('process.works.view',compact('work'));
    }

    public function store_detail(Request $request,$id)
    {
        $name = null;
        if($request->hasFile('file_detail')){
           
            $file = $request->file('file_detail');
            $name = $file->getClientOriginalName();
            $path = public_path() .'/folders/works/files_work'.$id;
            $file->move($path,$name);   
        }

        $detail = $this->saveDetailWork($request,$id,$name);
        
        return redirect()->route('process.works.view',$id)->with('success','Detalle creado con éxito');
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
        $observatios = $this->dataObsService($request->request->type_service_id);
        
        return view('process.quotes.create_formal',compact('request','type_value','bonds','trm','fecha','fechaMax','observatios'));
    }

    public function store_quotes(Request $request)
    {
        $this->validateQuotes($request);
        $data = $this->saveQuotesFormal($request);
        $pdf = PDF::loadView('process.quotes.pdf_quote_formal',compact('data'));
        Storage::put('Folders/Quotes/quote_'.$data->id.'.pdf', $pdf->output());

        return redirect()->route('process.works.list')->with('success','Cotización creada con éxito');
    }

    public function edit_quotes($id)
    {
        $data = Quote::find($id);
        $type_value = $this->getDataParametrics('param_type_value')->orderby('p_order')->get();
        $bonds = $this->getInfoBonds($data->requestQuoteTutor->request->users->id);
        $trm = $this->getInfoTrm($data->requestQuoteTutor->request->users->id);
        $fecha = $this->get_date_now();
        $fechaMax = Carbon::now()->addDays(1)->format('Y-m-d');
        return view('process.quotes.edit_formal',compact('data','type_value','bonds','trm','fecha','fechaMax'));
    }

    public function delete_quotes($id)
    {
       $this->deleteQuote($id);
       return redirect()->back()->with(['success' => 'Cotización eliminada con éxito']);
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

    //////////////Entregables ////////////////////

    public function deliverables_index()
    {
       $data = $this->getDataDeliverables();
       return view('process.deliverables.index',compact('data'));
    }

    public function deliverables_list()
    {
        $data = $this->getDataDeliverables();
        return view('process.deliverables.list',compact('data'));
    }

    public function deliverables_create($id)
    {
        $work = $this->infoQuote($id);
        $fecha = Carbon::now()->parse()->format('Y-m-d');
        return view('process.deliverables.create',compact('work','fecha'));
    }

    public function deliverables_store(Request $request)
    {
        if($request->hasFile('cuenta_cobro')){
            $this->validateFileCuentaCobro($request,$request->cuenta_cobro);
        }
        $this->saveDataDeliverable($request);
        return redirect()->route('process.deliverables.index')->with('success','Cotización creada con éxito');
    }

    public function validateFileCuentaCobro($request,$file)
    {
        $rules = [];
        $messages = [];
        
        $rules['cuenta_cobro'] = 'mimes:pdf';
        $messages['cuenta_cobro.mimes'] =trans('El formato de la cuenta de cobro no es valido.');               
                
        $this->validate($request, $rules, $messages);
        
        return true;
    }

    public function deliverables_edit($id)
    {
        $data = $this->getInfoDeliverable($id);
        $fecha = Carbon::now()->parse()->format('Y-m-d');
        return view('process.deliverables.edit',compact('data','fecha'));
    }

    public function deliverables_delete($id)
    {
        $this->getDeleteDeliverable($id);
        return redirect()->route('process.deliverables.index')->with('success','Cotización eliminada con éxito');
    }

    public function validate_deliverable($id)
    {
        $camp = 'status';
        $this->changeStateCamp($id,$camp,2);

        return redirect()->route('process.deliverables.list')->with('success','Cotización actualizada con éxito');
    }

    public function validate_count($id)
    {
        $camp = 'status_cb';
        $this->changeStateCamp($id,$camp,1);

        return redirect()->route('process.deliverables.list')->with('success','Cotización actualizada con éxito');
    }

    /////////////calificaciones////////////////////
    public function deliverables_view_form_qualificate($id)
    {
        $deliverable = $this->infoDeliverable($id);
        $fecha = Carbon::now()->parse()->format('Y-m-d');
        $types = $this->getDataParametrics('type_qualificate')->get();
        $qualificates = $this->getInfoPoints();

        return view('process.qualifications.form_create',compact('deliverable','fecha','types','qualificates'));
    }

    public function qualificate_store(Request $request)
    {
        $this->saveQualification($request);
        return redirect()->route('process.deliverables.index')->with('success','Cotización calificada con éxito');
    }

    public function form_edit_qualificate($id)
    {
        $quality = $this->datDataQualificate($id);
        $fecha = Carbon::now()->parse()->format('Y-m-d');
        $types = $this->getDataParametrics('type_qualificate')->get();
        $qualificates = $this->getInfoPoints();
        return view('process.qualifications.form_edit',compact('quality','fecha','types','qualificates'));
    }

    public function delete_qualificate($id)
    {
        $this->getDeleteQualificate($id);
        return redirect()->route('process.deliverables.index')->with('success','Calificación eliminada con éxito');
    }
}
