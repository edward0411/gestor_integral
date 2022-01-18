<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Countries as countries;
use App\Models\Parametrics as parametrics;
use App\User as profile;
use App\Traits\Managment;

class ProfileController extends Controller
{
    use Managment;
    public function index_basic_data(){

        $id_rol = Auth::user()->roles()->first()->id;

        $countries = $this->getInfoCountries()->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        
        return view('profile.index_basic_data',compact('countries','type_docs')); 

    }

    public function index_bonds(){

        return view('profile.index_bonds');
    }

    public function create_bonds(){

        $state = 1;
        $data = $this->getInfoUsers(4,$state)->select('users.id','users.u_nickname')->get();  
        $type_bonds = $this->getDataParametrics('param_type_bonds')->orderby('p_order')->get();
        $type_value = $this->getDataParametrics('param_type_value')->orderby('p_order')->get();

        return view('profile.create_bonds',compact('type_bonds','type_value','data'));
    }

    public function edit_bonds(){

        return view('profile.edit_bonds');
    }
}
