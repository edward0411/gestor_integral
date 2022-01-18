<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;

class TutorsController extends Controller
{

    use Managment;

    public function active(){

        $state = 1;
        $data = $this->getInfoUsers(6,$state)->select('users.*','countries.c_name')
        ->get();

        return view('tutors.index',compact('data','state'));
    }

    public function inactive(){

        $state = 4;
        $data = $this->getInfoUsers(6,$state)->select('users.*','countries.c_name')
        ->get();

        return view('tutors.index',compact('data','state'));
    }

    public function create(){

        return view('tutors.create');
    }

    public function edit(){

        return view('tutors.edit');
    }
}
