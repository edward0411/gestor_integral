<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Countries as countries;

class CountriesController extends Controller
{
    public function index(){
        
        try {
            $countries = DB::table('countries')
            ->whereNull('deleted_at')
            ->select('*')
           ->get();
         
            return view('countries.index',compact('countries'));
        } catch (\Throwable $th) {
            dd($th);
        }
      
    }

    public function create(){

        return view('countries.create');
    }

    public function store(Request $request){
     //dd($request);
        $this->validate($request,[
            'c_indicative' => 'required|numeric',
            'c_name' => 'required|unique:countries|min:3|max:35|string',
           ]);

           try {
            $country = new countries;
            $country->c_name = $request->c_name;
            $country->c_indicative = $request->c_indicative;
            $country->created_by = Auth::user()->id;
            $country->save();
     
            return redirect()->route('countries.index')->with('success','Registro creado con éxito');
           } catch (\Throwable $th) {
               dd($th);
           }
    
    
          
    }

    public function edit($id){
        
        $country = countries::findOrFail($id);
    
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request){


        $this->validate($request,[
            'c_indicative' => 'required|numeric',
            'c_name' => 'required|min:3|max:35|string',
           ]);

           try {
            $country = countries::where('id', '=', $request->c_id)->first();
            $country->c_name = $request->c_name;
            $country->c_indicative = $request->c_indicative;
            $country->updated_by = Auth::user()->id;
            $country->save();
            
            return redirect()->route('countries.index')->with('success',trans('Registro actualizado con éxito'));
           } catch (\Throwable $th) {
            dd($th);
           }  
    }

    public function delete($id){

        $country = countries::where('id','=',$id)->firstOrFail();
        $country->deleted_by = Auth::user()->id;
        $country->delete();
        return redirect()->route('countries.index')->with('success', trans('Registro eliminado con éxito'));
    }
}
