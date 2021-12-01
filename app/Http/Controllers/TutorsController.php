<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorsController extends Controller
{
    public function index(){

        return view('tutors.index');
    }

    public function create(){

        return view('tutors.create');
    }

    public function edit(){

        return view('tutors.edit');
    }
}
