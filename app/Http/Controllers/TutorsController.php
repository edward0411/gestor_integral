<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;
use App\User as tutors;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TutorsController extends Controller
{

    use Managment;

    public function active(){

        $state = 1;
        $data = $this->getInfoUsers(6,$state)->select('users.*','countries.c_name')
        ->get();

        return view('tutors.index',compact('data','state'));
    }

    public function inactive(){

        $state = 4;
        $data = $this->getInfoUsers(6,$state)->select('users.*','countries.c_name')
        ->get();

        return view('tutors.index',compact('data','state'));
    }

    public function create(){

        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();

        return view('tutors.create',compact('countries','type_docs','means'));
    }

    public function edit($id){

        $state = 1;
        $data = $this->getInfoUsers(6,$state)->where('users.id',$id)->select('users.*','countries.c_name','coun.c_indicative')
        ->get();
        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $means = $this->getDataParametrics('means_type')->orderby('p_order')->get();

        return view('tutors.edit',compact('data','state','countries','type_docs','means'));
    }

    public function store_tutor(Request $request){

       // dd($request);

        $this->validate($request,[
            'u_name' => ['max:50'],
            'u_nickname' => ['required', 'string', 'max:50'],
            'u_type_doc' => ['required', 'string'],
            'u_num_doc' => ['required', 'string'],
            'u_id_country' => ['required', 'numeric'],
            'u_indicativo' => ['required'],
            'u_key_number' => ['required', 'string', 'min:8', 'max:15'],
            'u_id_means' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           ]);

        try {

           $pass = $request->u_nick_name.'_'.$request->u_num_doc;

           $password = Hash::make($pass);

           $customer = new tutors();
           $customer->u_name = $request->u_name;
           $customer->u_nickname = $request->u_nickname;
           $customer->u_type_doc = $request->u_type_doc;
           $customer->u_num_doc = $request->u_num_doc;           
           $customer->u_key_number = $request->u_key_number;
           $customer->u_id_country = $request->u_id_country;
           $customer->u_indicativo = $request->u_indicativo;
           $customer->u_id_means = $request->u_id_means;
           $customer->email = $request->email;
           $customer->password = $password;
           $customer->u_state = 1;
           $customer->created_by = Auth::user()->id;
           $customer->save();

           $rol = $this->getRoles()->where('id',6)->first();
           $customer->assignRole($rol->name);

    
           return redirect()->route('tutors.index')->with('success','Registro creado con éxito');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
