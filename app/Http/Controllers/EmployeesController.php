<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Countries as countries;
use App\Models\Parametrics as parametrics;
use App\User as employees;

class EmployeesController extends Controller
{
    public function index(){

        $employee = employees::all();

        return view('employees.index',compact('employee'));
    }

    public function create(){

        $countries = DB::table('countries')->whereNull('deleted_at')->select('id','c_name')->get();
        $type_docs = parametrics::where('p_category','=','type_documents')->orderby('p_order')->get();

        return view('employees.create',compact('countries','type_docs')); 
    }

    public function edit($id){

        $employee = employees::findOrFail($id)
        ->leftJoin('parametrics','parametrics.id','=','users.u_type_doc')
        ->leftJoin('countries','countries.id','=','users.u_id_country')
        ->select('users.*','parametrics.p_text','countries.c_name')
        ->where('users.id',$id)
        ->get();

        $countries = DB::table('countries')->whereNull('deleted_at')->select('id','c_name')->get();
        $type_docs = parametrics::where('p_category','=','type_documents')->orderby('p_order')->get();
        

        return view('employees.edit',compact('employee','countries','type_docs')); 
    }

    public function store(Request $request){

        $this->validate($request,[
            'u_name' => ['max:50'],
            'u_nick_name' => ['required', 'string', 'max:50'],
            'u_type_doc' => ['required', 'string'],
            'u_num_doc' => ['required', 'string'],
            'u_key_number' => ['required', 'string', 'min:8', 'max:15','unique:users'],
            'id_contry' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           ]);

       $password = Hash::make($request->password);

       $employee = new employees();
       $employee->u_name = $request->u_name;
       $employee->u_nickname = $request->u_nick_name;
       $employee->u_indicativo = '+57';
       $employee->u_type_doc = $request->u_type_doc;
       $employee->u_num_doc = $request->u_num_doc;
       $employee->u_key_number = $request->u_key_number;
       $employee->u_id_country = $request->id_contry;
       $employee->email = $request->email;
       $employee->password = $password;
       $employee->u_state = 1;
       $employee->created_by = Auth::user()->id;
       $employee->save();

       return redirect()->route('employees.index')->with('success','Registro creado con éxito');
    }

    public function update(Request $request){
       
        $this->validate($request,[
            'u_name' => ['max:50'],
            'u_nickname' => ['required', 'string', 'max:50'],
            'u_type_doc' => ['required', 'string'],
            'u_num_doc' => ['required', 'string'],
            'u_key_number' => ['required', 'string', 'min:8', 'max:15'],
            'u_id_country' => ['required'],
           ]);

        $employee=employees::where('id','=',$request->id)->firstOrFail();
        $employee->u_name = $request->u_name;
        $employee->u_nickname = $request->u_nickname;
        $employee->u_indicativo = '+57';
        $employee->u_type_doc = $request->u_type_doc;
        $employee->u_num_doc = $request->u_num_doc;
        $employee->u_key_number = $request->u_key_number;
        $employee->u_id_country = $request->u_id_country;
        $employee->email = $request->email;
        if(strlen($request->password)>0){
            $password = Hash::make($request->password);
            $employee->password = $password;
        }
        $employee->u_state = 1;
        $employee->created_by = Auth::user()->id;
        $employee->update();
       
        return redirect()->route('employees.index')->with('success','Registro actualizado con éxito');

    }

    public function delete($id){

        $employee = employees::where('id','=',$id)->firstOrFail();
        $employee->deleted_by = Auth::user()->id;
        $employee->delete();
        return redirect()->route('employees.index')->with('success', trans('Registro eliminado con éxito'));
    }
}
