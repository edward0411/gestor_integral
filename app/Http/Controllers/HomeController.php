<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Helpers\EmailHelper;

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
            
            case '4':
                if (Auth::user()->u_state == 2 ) {
                    return redirect()->route('process.request.index',$id_rol);
                }elseif(Auth::user()->u_state == 4){
                    return redirect()->route('logouth');
                }elseif(Auth::user()->u_state == 5){
                    return redirect()->route('validate_token');
                }
                break;
            
            case '6':
                if (Auth::user()->u_state == 0 || Auth::user()->u_state == 1 || Auth::user()->u_state == 3) {
                    return redirect()->route('pre_registration.index_registration');
                }elseif(Auth::user()->u_state == 2){
                    return redirect()->route('process.request.index',$id_rol);
                }elseif(Auth::user()->u_state == 4){
                    return redirect()->route('logouth');
                }elseif(Auth::user()->u_state == 5){
                    return redirect()->route('validate_token');
                }               
                break;
            default:
                return view('home');
                break;
       }
        
    }

    public function validate_token()
    {
        $user = Auth::user();
        return view('validate_token',compact('user'));
    }

    public function update_email_users(Request $request)
    {
        //dd($request);
        $user = User::find($request->id_user);

        if ($user->email != $request->email) {
           $validate = User::where('email',$request->email)->get();

           if (isset($validate[0]) || count($validate) > 0) {
            return redirect()->route('validate_token')->with('error','El correo ya se encuentra registrado en nuestra base de datos');
           }

           $token = mt_rand(1000,9999);

           $user->email = $request->email;
           $user->u_token = $token;
           $user->updated_by = Auth::user()->id;
           $user->save();

           EmailHelper::SendEmailWelcome($user,$token);

           return redirect()->route('logouth');

        }

        return redirect()->route('validate_token')->with('error','El correo es el mismo que registra en nuestra base de datos');
    }

    public function validate_token_store(Request $request)
    {
        $user = User::find($request->id_user);

        if ($user->u_token == $request->u_token) {
            $id_rol = Auth::user()->roles()->first()->id;

            if ($id_rol == 4) {
                $user->u_state = 2;
            }else{
                $user->u_state = 0;
            }
            $user->updated_by = Auth::user()->id;
            $user->save();

            return redirect()->route('home')->with('success','Usuario actualizado con éxito');
        }

        return redirect()->route('validate_token')->with('error','El codigo que se ingresó no es el correcto favor intentalo nuevamente');
    }

    public function login()
    {
        return view('login');
    }
}
