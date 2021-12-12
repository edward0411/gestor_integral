<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Subjects as subject;

class SubjectsController extends Controller
{
    public function index(){

        return view('areas.subjects.index');
    }

    public function create(){

        return view('areas.subjects.create');
    }

    public function edit(){

        return view('areas.subjects.edit');
    }
}
