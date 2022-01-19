<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Countries as countries;
use App\Models\Parametrics as parametrics;
use App\User as profile;
use App\Models\Bonds as bonds;
use App\Traits\Managment;

class ProfileController extends Controller
{
    use Managment;
    public function index_basic_data(){

        $id_rol = Auth::user()->roles()->first()->id;

        $countries = $this->getInfoCountries()->get();
        $type_docs = $this->getDataParametrics('type_documents')->orderby('p_order')->get();

        return view('profile.index_basic_data',compact('countries','type_docs'));

    }

    public function index_bonds(){

        $bonds = DB::table('bonds')
        ->leftJoin('users','users.id','=','bonds.id_user')
        ->leftJoin('parametrics','parametrics.id','=','bonds.id_type_bond')
        ->leftJoin('parametrics as param','param.id','=','bonds.id_type_value')
        ->where('bonds.b_state', 1)
        ->whereNull('bonds.deleted_at')
        ->select('bonds.*','users.u_nickname','parametrics.p_text','param.p_text as text')
        ->get();

        return view('profile.index_bonds',compact('bonds'));
    }

    public function create_bonds(){

        $state = 2;
        $data = $this->getInfoUsers(4,$state)->select('users.id','users.u_nickname')->get();
        $type_bonds = $this->getDataParametrics('param_type_bonds')->orderby('p_order')->get();
        $type_value = $this->getDataParametrics('param_type_value')->orderby('p_order')->get();

        return view('profile.create_bonds',compact('type_bonds','type_value','data'));
    }

    public function edit_bonds($id){

        $bonds = bonds::findOrFail($id)
        ->leftJoin('users','users.id','=','bonds.id_user')
        ->leftJoin('parametrics','parametrics.id','=','bonds.id_type_bond')
        ->leftJoin('parametrics as param','param.id','=','bonds.id_type_value')
        ->select('bonds.*','users.u_nickname','parametrics.p_text','param.p_text as text')
        ->where('bonds.id',$id)
        ->get();

        $state = 2;
        $data = $this->getInfoUsers(4,$state)->select('users.id','users.u_nickname')->get();
        $type_bonds = $this->getDataParametrics('param_type_bonds')->orderby('p_order')->get();
        $type_value = $this->getDataParametrics('param_type_value')->orderby('p_order')->get();


        return view('profile.edit_bonds',compact('type_bonds','type_value','data','bonds'));
    }

    public function store(Request $request){
        try {
            if($request->type_value == 21)
            {

                if($request->b_value > 100)
                {
                    return redirect()->back()->with('error', 'Si el tipo de del bono o anticipo es porcentaje, el valor no puede ser superior a 100.');
                }
            }
            if(!isset($request->id))
            {
                $bonds = new bonds;
            }else{
                $bonds = bonds::where('id', '=', $request->id)->first();
            }

            $bonds->id_user = $request->id_user;
            $bonds->id_type_bond = $request->type_bond;
            $bonds->id_type_value = $request->type_value;
            $bonds->b_value = $request->b_value;
            $bonds->b_state = 1;
            $bonds->created_by = Auth::user()->id;
            $bonds->save();

            if(!isset($request->id))
            {
                return redirect()->route('profile.index_bonds')->with('success','Registro creado con éxito');
            }else{
                return redirect()->route('profile.index_bonds')->with('success','Registro actualizado con éxito');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function delete($id){

        try {
            $bonds = bonds::where('id','=',$id)->firstOrFail();
            $bonds->deleted_by = Auth::user()->id;
            $bonds->save();
            $bonds->delete();
            return redirect()->route('profile.index_bonds')->with('success', trans('Registro eliminado con éxito'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
