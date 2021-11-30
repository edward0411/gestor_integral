<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;

class CountriesController extends Controller
{
    public function index(){

        return view('countries.index');
    }

    public function create(){

        return view('countries.create');
    }

    public function edit(){

        return view('countries.edit');
    }
}
