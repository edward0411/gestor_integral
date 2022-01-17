<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;

class CustomersController extends Controller
{
    use Managment;

    public function active()
    {
        $state = 1;
        $data = $this->getInfoUsers(4,$state)->select('users.*','countries.c_name','coins.c_currency','coins.c_type_currency')
        ->get();    

        return view('customers.index',compact('data','state'));
    }

    public function inactive()
    {
        $state = 4;
        $data = $this->getInfoUsers(4,$state)->select('users.*','countries.c_name','coins.c_currency','coins.c_type_currency')
        ->get(); 

        return view('customers.index',compact('data','state'));
    }

    public function create()
    {

        return view('customers.create');
    }

    public function edit($id)
    {
        dd($id);
        return view('customers.edit');
    }

    public function processState($id)
    {
        dd($id);
    }
}
