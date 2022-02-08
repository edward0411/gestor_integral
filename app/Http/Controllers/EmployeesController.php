<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Countries as countries;
use App\Models\Parametrics as parametrics;
use App\User as employees;
use App\Traits\Managment;

class EmployeesController extends Controller
{
    use Managment;

    public function index(){

        $employee = DB::table('users')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')
        ->orWhereNotIn('roles.id',[1,4,6])
        ->where(function ($query) {
            $query->where('users.u_state',1)
                  ->orWhere('users.u_state',0);
        })
        ->whereNull('users.deleted_at')
        ->select('users.*','roles.name')
        ->get();
        return view('employees.index',compact('employee'));
    }

    public function create(){

        $countries = $this->getInfoCountries()->orderBy('c_name')->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $roles = $this->getRoles()->orWhereNotIn('id',[1,4,6])->orderby('name')->get();
        return view('employees.create',compact('countries','type_docs','roles')); 
    }

    public function edit($id){

        $employee = employees::findOrFail($id)
        ->leftJoin('parametrics','parametrics.id','=','users.u_type_doc')
        ->leftJoin('countries','countries.id','=','users.u_id_country')
        ->leftJoin('model_has_roles','model_has_roles.model_id','=','users.id')
        ->leftJoin('roles','roles.id','=','model_has_roles.role_id')
        ->select('users.*','parametrics.p_text','countries.c_name','roles.name')
        ->where('users.id',$id)
        ->first();

        $countries = $this->getInfoCountries()->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();
        $roles = $this->getRoles()->orWhereNotIn('id',[1,4,6])->orderby('name')->get();
        return view('employees.edit',compact('employee','countries','type_docs','roles')); 
    }

    public function store(Request $request){

        $this->validate($request,[
            'u_name' => ['required','max:50'],
            'u_nick_name' => ['required', 'string', 'max:50'],
            'u_type_doc' => ['required', 'string'],
            'u_num_doc' => ['required', 'string'],
            'u_key_number' => ['required', 'string', 'min:8', 'max:15','unique:users'],
            'id_contry' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
           ]);

        try {

           $pass = $request->u_nick_name.'_'.$request->u_num_doc;   
           $password = Hash::make($pass);
    
           $employee = new employees();
           $employee->u_name = $request->u_name;
           $employee->u_nickname = $request->u_nick_name;
           $employee->u_type_doc = $request->u_type_doc;
           $employee->u_num_doc = $request->u_num_doc;
           $employee->u_key_number = $request->u_key_number;
           $employee->u_id_country = $request->id_contry;
           $employee->u_indicativo = $request->u_indicativo;
           $employee->email = $request->email;
           $employee->password = $password;
           $employee->u_state = 1;
           $employee->created_by = Auth::user()->id;
           $employee->save();

           $rol = $this->getRoles()->where('id',$request->role)->first();
           $employee->assignRole($rol->name);


    
           return redirect()->route('employees.index')->with('success','Registro creado con éxito');
        } catch (\Throwable $th) {
            //throw $th;
           // dd($th);
        }

       
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

           try {
            $employee=employees::where('id','=',$request->id)->firstOrFail();
            $employee->u_name = $request->u_name;
            $employee->u_nickname = $request->u_nickname;
            $employee->u_indicativo = '+57';
            $employee->u_type_doc = $request->u_type_doc;
            $employee->u_num_doc = $request->u_num_doc;
            $employee->u_key_number = $request->u_key_number;
            $employee->u_id_country = $request->u_id_country;
            $employee->email = $request->email;
            $employee->u_state = 1;
            $employee->updated_at = Auth::user()->id;
            $employee->update();

           
            return redirect()->route('employees.index')->with('success','Registro actualizado con éxito');
           } catch (\Throwable $th) {
            dd($th);
           }

        

    }

    public function delete($id){
        
        try {
            $employee = employees::where('id','=',$id)->firstOrFail();
            $employee->deleted_by = Auth::user()->id;
            $employee->delete();
            return redirect()->route('employees.index')->with('success', trans('Registro eliminado con éxito'));
        } catch (\Throwable $th) {
            dd($th);
        }

       
    }
}
