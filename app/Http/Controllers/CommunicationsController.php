<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;

class CommunicationsController extends Controller
{
    use Managment;

    public function index()
    {
        return view('communications.index');
    }

    public function living($id)
    {
        return view('communications.living');
    }
}
