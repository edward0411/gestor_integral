<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Preregister;
use App\Traits\Managment;
use App\User;

class Pre_registrationController extends Controller
{
    use Preregister;
    use Managment;

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
        ->get();

        return response()->json($cuentas);
    }

    public function index_turors_list(){
        $users = User::RolUser('tutor')->get();
        return view('pre_registration.index_turors_list', compact('users'));
    }

    public function view_tutors(User $user){
        return view('pre_registration.view_tutors', compact('user'));
    }

    public function processRequest(Request $request)
    {
        dd($request);
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

    ////////informacion de idiomas ///////

    public function create_information_language(){

        return view('pre_registration.my_register.form_information_language');
    }


    ////////// informacion temas trabajables /////

    public function create_information_topics_work(){

        $areas = $this->getInfoAreas()->get();
       // $subjects = $this->getInfoSubjects()->get();

        return view('pre_registration.my_register.form_information_topics_work',compact('areas'));
    }


    //////////// informacio de servicios ////////

    public function create_information_service(){

        return view('pre_registration.my_register.form_information_service');
    }


    ////////// informacion de sistemas /////////

    public function create_information_system(){

        return view('pre_registration.my_register.form_information_system');
    }

}
