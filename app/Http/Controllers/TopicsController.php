<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index(){

        return view('areas.subjects.topics.index');
    }

    public function create(){


        return view('areas.subjects.topics.create');

    }
}
