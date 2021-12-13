<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as clients;

class CustomersController extends Controller
{
    public function index(){

        $data = clients::leftJoin('countries','countries.id','=','users.u_id_country')
        ->leftJoin('model_has_roles as roles','roles.model_id','=','users.id')
        ->leftJoin('coins','coins.id','=','users.u_id_money')
        ->where('roles.role_id',4)
        ->select('users.*','countries.c_name','coins.c_currency','coins.c_type_currency')
        ->get();

        return view('customers.index',compact('data'));
    }

    public function inactive(){

        return view('customers.index');
    }

    public function create(){

        return view('customers.create');
    }

    public function edit(){

        return view('customers.edit');
    }
}
