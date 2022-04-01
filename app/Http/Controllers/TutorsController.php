<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;
use App\User as tutors;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\EmailHelper;
use App\Models\Coins as coins;

class TutorsController extends Controller
{

    use Managment;

    public function active(){

        $state = 2;
        $data = $this->getInfoUsers(6,$state)->select('users.*','countries.c_name')->get();

        return view('tutors.index',compact('data','state'));
    }

    public function inactive(){

        $state = 4;
        $data = $this->getInfoUsers(6,$state)->select('users.*','countries.c_name')->get();

        return view('tutors.index',compact('data','state'));
    }

    public function create(){

        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();
        $coins = coins::all();

        return view('tutors.create',compact('countries','type_docs','means','coins'));
    }

    public function edit($id){

        $state = 1;
        $data = $this->getInfoUsers(6,$state)->where('users.id',$id)->select('users.*','countries.c_name','coun.c_indicative')->get();
        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();
        $coins = coins::all();

        return view('tutors.edit',compact('data','state','countries','type_docs','means','coins'));
    }

    public function store_tutor(Request $request)
    {
        if (!isset($request->id)) {
            $this->validate($request, [
                'u_name' => ['max:50'],
                'u_nickname' => ['required', 'string', 'max:50', 'unique:users'],
                'u_type_doc' => ['required', 'string'],
                'u_num_doc' => ['required', 'string'],
                'u_id_country' => ['required', 'numeric'],
                'u_indicativo' => ['required'],
                'u_key_number' => ['required', 'string', 'min:8', 'max:15', 'unique:users'],
                'u_id_means' => ['required', 'numeric'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        } else {
            $user = User::find($request->id);
            if ($user->id != $request->email) {
                $validate =  DB::table('users')->where("email", $request->email)->whereNotIn("u_state", [4])->get();
                if (!isset($validate[0])) {
                    if ($request->email > 0) {
                        return back()->with('error', trans('El correo ya se encuentra registrado a un usuario'));
                    }
                }
            }
        }

        try {

           $pass = $request->u_num_doc;
           $password = Hash::make($pass);
           $token = mt_rand(1000,9999);

            if (!isset($request->id)) {
                $tutor = new tutors;
            } else {
                $tutor = tutors::where('id', '=', $request->id)->first();
            }
           $tutor->u_name = $request->u_name;
           $tutor->u_nickname = $request->u_nickname;
           $tutor->u_type_doc = $request->u_type_doc;
           $tutor->u_num_doc = $request->u_num_doc;           
           $tutor->u_key_number = $request->u_key_number;
           $tutor->u_id_country = $request->u_id_country;
           $tutor->u_indicativo = $request->u_indicativo;
           $tutor->u_id_means = $request->u_id_means;
           $tutor->u_id_money = $request->id_money;
           $tutor->email = $request->email;
           $tutor->password = $password;
            
            if (!isset($request->id)) {
                $tutor->u_state = 5;
                $tutor->created_by = Auth::user()->id;
                $tutor->u_token = $token;
                $rol = $this->getRoles()->where('id',6)->first();
                $tutor->assignRole($rol->name);
            } else {
                $tutor->updated_by = Auth::user()->id;
            }
            $tutor->save();

            if (!isset($request->id)) {
                EmailHelper::SendEmailWelcome($tutor,$token);
            }

            return redirect()->route('tutors.index')->with('success','Registro creado con éxito');
           
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
