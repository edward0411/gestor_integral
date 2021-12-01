<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    public function index(){

        return view('roles.index');
    }

    public function create(){

        return view('roles.create');
    }

    public function edit(){

        return view('roles.edit');
    }

    public function permission(){

        return view('roles.permission');
    }
}
