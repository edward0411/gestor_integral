<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $id_rol = Auth::user()->roles()->first()->id;

        switch ($id_rol) {
            case '3':
                return redirect()->route('quotes.index');
                break;
            case '4':
                if (Auth::user()->u_state == 1 ) {
                    return redirect()->route('quotes.myQuotes');
                }elseif(Auth::user()->u_state == 4){
                    return redirect()->route('logouth');
                }
                break;
            case '5':
                return redirect()->route('quotes.index');
                break;
            case '6':
                if (Auth::user()->u_state == 0 || Auth::user()->u_state == 1 || Auth::user()->u_state == 3) {
                    return redirect()->route('pre_registration.index_registration');
                }elseif(Auth::user()->u_state == 2){
                    return route('quotes.myQuotes');
                }elseif(Auth::user()->u_state == 4){
                    return redirect()->route('logouth');
                }               
                break;
            default:
                return view('home');
                break;
       }
        
    }

    public function login()
    {
        return view('login');
    }
}
