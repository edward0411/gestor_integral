<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as users;

class UsersController extends Controller
{
    //

    public function index(){

      $users = users::all();


        return view('users.index',compact('users'));
    }

    public function create(){

        return view('users.create');
    }

    public function edit(){

        return view('users.edit');
    }
}
