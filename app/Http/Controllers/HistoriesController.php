<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    public function index(){

        return view('histories.index');
    }
}
