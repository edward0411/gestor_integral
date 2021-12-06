<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Parametrics as parametrics;

class ParametricsController extends Controller
{
    public function index(){

        $parametrics = DB::table('parametrics')
        ->whereNull('deleted_at')
        ->select('*')
       ->get();

        return view('parametrics.index',compact('parametrics'));
    }

    public function create(){

        return view('parametrics.create');
    }

    public function edit($id){

        $parametrics = parametrics::findOrFail($id);

        return view('parametrics.edit',compact('parametrics'));
    }

    public function store(Request $request){

        $request->validate([
            'p_category' => 'required',
            'p_value' => 'required',
            'p_text' => 'required',
            'p_order' => 'numeric',
           ] );

           $parametrics = new parametrics();
           $parametrics->p_category = $request->p_category;
           $parametrics->p_value = $request->p_value;
           $parametrics->p_text = $request->p_text;
           $parametrics->p_order = $request->p_order;
           $parametrics->created_by = Auth::user()->id;
           $parametrics->save();

           return redirect()->route('parametrics.index')->with('success','Registro creado con éxito');
    }

    public function update(Request $request){
        
        $request->validate([
            'p_category' => 'required',
            'p_value' => 'required',
            'p_text' => 'required',
            'p_order' => 'numeric',
           ] );

        $parametrics = parametrics::where('id', '=', $request->id)->first();
        $parametrics->p_category = $request->p_category;
        $parametrics->p_value = $request->p_value;
        $parametrics->p_text = $request->p_text;
        $parametrics->p_order = $request->p_order;
        $parametrics->updated_by = Auth::user()->id;
        $parametrics->save();
        
        return redirect()->route('parametrics.index')->with('success',trans('Registro actualizado con éxito'));
    }
    
    public function delete($id){

        $parametrics = parametrics::where('id','=',$id)->firstOrFail();
        $parametrics->deleted_by = Auth::user()->id;
        $parametrics->delete();
        return redirect()->route('parametrics.index')->with('success', trans('Registro eliminado con éxito'));
    }

}
