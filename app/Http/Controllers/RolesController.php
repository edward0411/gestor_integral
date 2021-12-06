<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles as roles;
use \Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(){

        $roles = roles::all();
        
        $rol_delete = roles::onlyTrashed()->get();
        dd($rol_delete);

        return view('roles.index',compact('roles'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:roles|max:100',
            ]);
        
            if ($request->id_rol == 0) {
                $role = roles::create(['name' => $request->name]);
                $request->session()->flash('success', 'Rol creado con éxito');


            }else {
                $role = roles::find($request->id_rol);
                $role->name = $request->name;
                $role->save();
                $request->session()->flash('success', 'Rol actualizado con éxito');

                 
            }

            if(isset($errors)){
                return back()->withInput();; //->with('msg', 'The Message');
            }else{
                return back(); //->withSuccess('Registro guardado');
            }

    }

    public function edit(){

        return view('roles.edit');
    }

    public function permission(){

        return view('roles.permission');
    }
}
