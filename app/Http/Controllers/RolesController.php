<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles as roles;
use \Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RolesController extends Controller
{
    public function index(){

        $roles = roles::all();
        
        $rol_delete = roles::onlyTrashed()->get();
       // dd($rol_delete);

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


    public function permissionindex($role){

        $role = roles::find($role);

        $permissions_role = $role->Permissions->pluck('name')->toArray();

        $permissions = Permission::all();

        return view('roles.permission',compact('role','permissions_role','permissions'));
    }

    public function permissionstore(Request $request)
    {
        set_time_limit(0);

        if(!isset($request->permisions))
          {
            return back()->with('error', trans('Debe asignar al menos un permiso al rol'));
          }

        $role = roles::find($request->roleid);
        $permissions_no_rol = $role->permissions->all();

        foreach ($permissions_no_rol  as $permission_no_rol){          
            $role->revokePermissionTo($permission_no_rol);
        }
       
        if(isset($request->permisions )){
            foreach ($request->permisions as $permision){
                $role->givePermissionTo($permision);
            }
        }

        return back()->with('success', 'Se han asignado los permisos');
    }
}
