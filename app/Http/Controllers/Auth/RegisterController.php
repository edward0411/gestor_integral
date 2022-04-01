<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\RegistersUsersClients;
use App\Traits\RegistersUsersTutors;
use App\Traits\Managment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use RegistersUsersClients;
    use RegistersUsersTutors;
    use Managment;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel/administrativo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validator_client(array $data)
    {
        //$this->validateCaptcha($data);
        return Validator::make($data, [
            'u_nickname' => ['required', 'string', 'max:50','unique:users'],
            'u_key_number' => ['required', 'string','min:8', 'max:15','unique:users'],
            'id_contry' => ['required', 'numeric'],
            'id_means' => ['required', 'numeric'],
            'id_money' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validator_tutor(array $data)
    {
        //$this->validateCaptcha($data);
        return Validator::make($data, [
            'u_name' => ['max:50'],
            'u_nickname' => ['required', 'string', 'max:50'],
            'u_type_doc' => ['required', 'string'],
            'u_num_doc' => ['required', 'string'],
            'u_key_number' => ['required', 'string', 'min:8', 'max:15','unique:users'],
            'id_contry' => ['required', 'numeric'],
            'id_means' => ['required', 'numeric'],
            'id_money' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function validateCaptcha($request)
    {
        if(isset($request['g-recaptcha-response']) && !empty($request['g-recaptcha-response']))
        {
            $secret = "6LeKyW8eAAAAABWWPQ0D5UPOqdhMaA_3VnvXSHPY";
            
            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$request['g-recaptcha-response']);
            
            $data = json_decode($response);
            
            if($data->success == false){
                return back();
            }
        }else{
            return back();
        }

        return true;
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function create_client(array $data,$token)
    {
        return User::create([
            'u_key_number' => $data['u_key_number'],
            'u_indicativo' => $data['u_indicativo'],
            'u_name' => $data['u_name'],
            'u_nickname' => $data['u_nickname'],
            'u_id_country' => $data['id_contry'],
            'u_id_means' => $data['id_means'],
            'u_id_money' => $data['id_money'],
            'u_state' => 5,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'u_token' => $token,
        ]);
    }

    protected function create_tutor(array $data,$token)
    {
        return User::create([
            'u_key_number' => $data['u_key_number'],
            'u_name' => $data['u_name'],
            'u_nickname' => $data['u_nickname'],
            'u_type_doc' => $data['u_type_doc'],
            'u_num_doc' => $data['u_num_doc'],
            'u_id_country' => $data['id_contry'],
            'u_indicativo' => $data['u_indicativo'],
            'u_id_means' => $data['id_means'],
            'u_id_money' => $data['id_money'],
            'u_state' => 5,
            'u_line_first' => 0,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'u_token' => $token,
        ]);
    }
}
