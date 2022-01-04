<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    public function index(){

        return view('histories.index');
    }

    public function index_tutors(){

        return view('histories.index_tutors');
    }

    public function view_tutors(){

        return view('histories.view_tutors');
    }
}
