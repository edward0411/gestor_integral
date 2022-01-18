<?php

namespace App\Http\Controllers;

use App\Http\Resources\TutorLanguageCollection;
use App\Http\Resources\TutorServiceCollection;
use App\Http\Resources\TutorSystemCollection;
use App\Http\Resources\TutorTopicCollection;
use App\Models\TutorLanguage;
use App\Models\TutorsBanks;
use App\Models\TutorService;
use App\Models\TutorSystem;
use App\Models\TutorTopic;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Preregister;
use App\Traits\Managment;
use App\User;

class Pre_registrationController extends Controller
{
    use Preregister;
    use Managment;
    use ApiResponser;

    const PENDIENTE     = 0;
    const APROBADO      = 1;
    const RECHAZADO     = 2;
    const NO_ACEPTADO   = 3;

    public function index_registration(){

        $countData = [];
        $countData[0] = $this->consultTable('tutors_bank_details','t_b_state',0);
        $countData[1] = $this->consultTable('tutors_bank_details','t_b_state',1);
        $countData[2] = $this->consultTable('tutors_bank_details','t_b_state',2);
        $countData[3] = $this->consultTable('language_tutors','l_t_state',0);
        $countData[4] = $this->consultTable('language_tutors','l_t_state',1);
        $countData[5] = $this->consultTable('language_tutors','l_t_state',2);
        $countData[6] = $this->consultTable('tutors_topics','t_t_state',0);
        $countData[7] = $this->consultTable('tutors_topics','t_t_state',1);
        $countData[8] = $this->consultTable('tutors_topics','t_t_state',2);
        $countData[9] = $this->consultTable('tutors_services','t_s_state',0);
        $countData[10] = $this->consultTable('tutors_services','t_s_state',1);
        $countData[11] = $this->consultTable('tutors_services','t_s_state',2);
        $countData[12] = $this->consultTable('tutors_systems','t_s_state',0);
        $countData[13] = $this->consultTable('tutors_systems','t_s_state',1);
        $countData[14] = $this->consultTable('tutors_systems','t_s_state',2);

        return view('pre_registration.index_registration',compact('countData'));
    }

    public function get_info_acount_bank(Request $request)
    {

        if (isset($request->id_tutor)) {
            $cuentas = $this->get_data_table('tutors_bank_details',$request->id_tutor);
        }else{
            $cuentas = $this->get_data_table('tutors_bank_details');
        }

        $cuentas = $cuentas->join('parametrics as p1','p1.id','=','tutors_bank_details.id_bank')
        ->join('parametrics as p2','p2.id','=','tutors_bank_details.id_type_account')
        ->select('tutors_bank_details.*','p1.p_text as name_bank','p2.p_text as type_acount')
        ->whereIn('t_b_state', [Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO])
        ->get();

        return response()->json($cuentas);
    }

    // listar los tutores
    public function index_turors_list(){
        $users = User::rolUser('tutor')->stateUser(User::REGISTRADO)->get();
        return view('pre_registration.index_turors_list', compact('users'));
    }

    public function view_tutors(User $user){
        return view('pre_registration.view_tutors', compact('user'));
    }

    // guardar estado del tutor
    public function save_state_tutor(User $user, $value){
        $user->update([
            'u_state' => $value
        ]);
        return redirect()->action('Pre_registrationController@index_turors_list');
    }

    // guardar primera linea
    public function save_line_first(Request $request){
        $user = User::find($request->id);
        $user->update([
            'u_line_first' => $request->value
        ]);
        return $this->showMessage('Se ha cambiado el registro');
    }

    public function processRequest(Request $request)
    {
        $data = $request->all();
        try {
            $handleState = $this->handle_state($data);
            return $this->showMessage('Se ha cambiado el registro');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 409);
        }
    }

    ///////////informacion bancaria /////

    public function create_information_bank()
    {

        $banks = $this->getDataParametrics('param_list_banks')->orderby('p_order')->get();
        $type_acounts = $this->getDataParametrics('param_type_acount')->orderby('p_order')->get();

        return view('pre_registration.my_register.form_information_bank',compact('banks','type_acounts'));
    }

    public function acount_bank_store(Request $request)
    {
        $this->saveDataAcount($request);

        return true;
    }

    public function acountBankDelete(TutorsBanks $account){
        $account->delete();
        return $this->showMessage(' Se ha eliminado el registro');
    }


    ////////informacion de idiomas ///////

    public function create_information_language(){

        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();

        return view('pre_registration.my_register.form_information_language',compact('languages'));
    }

    // retorna la informacion de lenguaje
    public function get_info_language(Request $request){
        $infoLanguage = TutorLanguage::infoUser($request->id_tutor ? $request->id_tutor:Auth::user()->id);
        if (isset($request->state)) {
            $infoLanguage->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO]);
        }
        return $this->successResponse(new TutorLanguageCollection($infoLanguage->get()));
    }

    public function lenguageStore(Request $request)
    {
        if(!$request->id && TutorLanguage::infoUser(Auth::user()->id)->infoLanguage($request->id_language)->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO])->first()){
            return $this->showMessage('No se puede guardar porque ya existe un registro con esta información');
        }
        $this->saveLanguage($request);
        return $this->showMessage('Se ha guardado la información');
    }

    public function lenguageDelete(TutorLanguage $language){
        $language->delete();
        return $this->showMessage(' Se ha eliminado el registro');
    }

    ////////// informacion temas trabajables /////

    public function create_information_topics_work(){

        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();

        return view('pre_registration.my_register.form_information_topics_work',compact('areas','subjects','topics'));
    }

    // retorna la informacion de temas de trabajo
    public function get_info_topic(Request $request){
        $infoTopic = TutorTopic::infoUser($request->id_tutor ? $request->id_tutor:Auth::user()->id);
        if (isset($request->state)) {
            $infoTopic->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO]);
        }
        return $this->successResponse(new TutorTopicCollection($infoTopic->get()));
    }

    public function topicStore(Request $request)
    {
        if(!$request->id && TutorTopic::infoUser(Auth::user()->id)->infoTopic($request->id_topic)->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO])->first()){
            return $this->showMessage('No se puede guardar porque ya existe un registro con esta información');
        }
        $this->saveTopic($request);
        return $this->showMessage('Se ha guardado la información');
    }

    public function topicDelete(TutorTopic $topic){
        $topic->delete();
        return $this->showMessage(' Se ha eliminado el registro');
    }


    //////////// informacio de servicios ////////

    public function create_information_service(){

        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();

        return view('pre_registration.my_register.form_information_service',compact('services'));
    }

    // retorna la informacion de servicio
    public function get_info_service(Request $request){
        $infoService = TutorService::infoUser($request->id_tutor ? $request->id_tutor:Auth::user()->id);
        if (isset($request->state)) {
            $infoService->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO]);
        }
        return $this->successResponse(new TutorServiceCollection($infoService->get()));
    }

    public function serviceStore(Request $request)
    {
        if(!$request->id && TutorService::infoUser(Auth::user()->id)->infoService($request->id_service)->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO])->first()){
            return $this->showMessage('No se puede guardar porque ya existe un registro con esta información');
        }
        $this->saveService($request);
        return $this->showMessage('Se ha guardado la información');
    }

    public function serviceDelete(TutorService $service){
        $service->delete();
        return $this->showMessage(' Se ha eliminado el registro');
    }

    ////////// informacion de sistemas /////////

    public function create_information_system(){

        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();

        return view('pre_registration.my_register.form_information_system',compact('list_systems'));
    }

    // retorna la informacion de sistema
    public function get_info_system(Request $request){
        $inforSystem = TutorSystem::infoUser($request->id_tutor ? $request->id_tutor:Auth::user()->id);
        if (isset($request->state)) {
            $inforSystem->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO]);
        }
        return $this->successResponse(new TutorSystemCollection($inforSystem->get()));
    }

    public function systemStore(Request $request)
    {
        if(!$request->id && TutorSystem::infoUser(Auth::user()->id)->infoSystem($request->id_system)->infoState([Pre_registrationController::PENDIENTE, Pre_registrationController::APROBADO])->first()){
            return $this->showMessage('No se puede guardar porque ya existe un registro con esta información');
        }
        $this->saveSystem($request);
        return $this->showMessage('Se ha guardado la información');
    }

    public function systemDelete(TutorSystem $system){
        $system->delete();
        return $this->showMessage(' Se ha eliminado el registro');
    }

}
