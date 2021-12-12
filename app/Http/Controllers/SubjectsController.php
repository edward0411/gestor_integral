<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Subjects as subject;

class SubjectsController extends Controller
{
    public function index($id){

        $subjects = DB::table('subjects')
        ->leftJoin('areas','areas.id','=','subjects.id_area')
        ->where('subjects.id_area', $id)
        ->select('subjects.*')
        ->get();

        return view('areas.subjects.index');
    }

    public function create( $id){

        $subjects = DB::table('subjects')
        ->where('subjects.id_area', $id)
        ->select('subjects.*')
        ->get();

        return view('areas.subjects.create');
    }

    public function edit(){

        return view('areas.subjects.edit');
    }
}
