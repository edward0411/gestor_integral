<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Areas as areas;

class AreasController extends Controller
{
    public function index(){

        $areas = areas::all();

        return view('areas.index',compact('areas'));
    }

    public function create(){

        return view('areas.create');
    }

    public function edit($id){

        $areas = areas::findOrFail($id);

        return view('areas.edit',compact('areas'));
    }

    public function store(Request $request){

        $areas = new areas;
        $areas->a_name = $request->a_name;
        $areas->a_order = $request->a_order;
        $areas->a_state = 1;
        $areas->created_by = Auth::user()->id;
        $areas->save();

        return redirect()->route('areas.index')->with('success','Registro creado con éxito');
    }

    public function update(Request $request){

        $areas = areas::where('id', '=', $request->id)->first();
        $areas->a_name = $request->a_name;
        $areas->a_order = $request->a_order;
        $areas->a_state = 1;
        $areas->updated_by = Auth::user()->id;
        $areas->save();

        return redirect()->route('areas.index')->with('success','Registro actualizado con éxito'); 
    }

    public function active($id)
    {
        $areas  = areas::where('id', $id)->firstOrFail();
        $areas ->a_state = 1;
        $areas ->update();

        return redirect()->route  ('areas.index')->with('success', trans('Registro activado con éxito'));
    }

    public function inactive($id)
    {
        $areas  = areas::where('id', $id)->firstOrFail();
        $areas ->a_state = 0;
        $areas ->update();

        return redirect()->route  ('areas.index')->with('success', trans('Registro inactivado con éxito'));

    }
}
