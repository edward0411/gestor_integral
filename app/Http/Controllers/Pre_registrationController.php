<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;

class Pre_registrationController extends Controller
{
    use Managment;

    public function index_registration(){

        return view('pre_registration.index_registration');
    }

    public function index_turors_list(){

        return view('pre_registration.index_turors_list');
    }

    public function view_tutors(){

        return view('pre_registration.view_tutors');
    }

    ///////////informacion bancaria /////

    public function create_information_bank(){

        return view('pre_registration.my_register.form_information_bank');
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
