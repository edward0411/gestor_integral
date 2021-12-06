<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Countries as countries;

class CountriesController extends Controller
{
    public function index(){

        $countries = DB::table('countries')
        ->whereNull('deleted_at')
        ->select('id','c_name')
       ->get();
     
        return view('countries.index',compact('countries'));
    }

    public function create(){

        return view('countries.create');
    }

    public function store(Request $request){
     //dd($request);
        $this->validate($request,[
            'c_name' => 'required|unique:countries|min:3|max:35|alpha_num'
           ]);
    
    
           $contry = new countries;
           $contry->c_name = $request->c_name;
           $contry->created_by = Auth::user()->id;
           $contry->save();
    
           return redirect()->route('countries.index')->with('success','Registro creado con éxito');
    }

    public function edit($id){
        
        $country = countries::findOrFail($id);
    
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request){


        $this->validate($request,[
            'c_name' => 'required|min:3|max:35|alpha_num'
           ]);
           

        $country = countries::where('id', '=', $request->c_id)->first();
        $country->c_name = $request->c_name;
        $country->updated_by = Auth::user()->id;
        $country->save();
        
        return redirect()->route('countries.index')->with('success',trans('Registro actualizado con éxito'));
    }

    public function delete($id){

        $country = countries::where('id','=',$id)->firstOrFail();
        $country->deleted_by = Auth::user()->id;
        $country->delete();
        return redirect()->route('countries.index')->with('success', trans('Registro eliminado con éxito'));
    }
}
