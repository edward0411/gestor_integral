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

        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();

        return view('tutors.create',compact('countries','type_docs','means'));
    }

    public function edit($id){

        $state = 1;
        $data = $this->getInfoUsers(6,$state)->where('users.id',$id)->select('users.*','countries.c_name','coun.c_indicative')
        ->get();
        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();

        return view('tutors.edit',compact('data','state','countries','type_docs','means'));
    }

    public function store_tutor(Request $request){

        dd($request);

        return view('tutors.index',compact('data','state'));
    }
}
