<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/panel/administrativo';

    public function reset()
    {
        $id_rol = Auth::user()->roles()->first()->id;

        switch ($id_rol) {
            case '3':
                return redirect()->route('process.request.index',$id_rol);
                break;
            case '4':
                if (Auth::user()->u_state == 1 ) {
                    return redirect()->route('process.request.index',$id_rol);
                }elseif(Auth::user()->u_state == 4){
                    return redirect()->route('logouth');
                }
                break;
            case '5':
                return redirect()->route('process.quotes.index');
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
}
