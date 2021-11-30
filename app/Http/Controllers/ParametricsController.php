<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametrics;

class ParametricsController extends Controller
{
    public function index(){

        return view('parametrics.index');
    }

    public function create(){

        return view('parametrics.create');
    }

    public function edit(){

        return view('parametrics.edit');
    }


}
