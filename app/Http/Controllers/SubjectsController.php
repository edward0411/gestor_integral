<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Subjects as subject;

class SubjectsController extends Controller
{
    public function index($id){
        

        $area = DB::table('areas')
        ->where('id',$id)
        ->select('id','a_name')
        ->first();

        $subjects = DB::table('subjects')
        ->leftJoin('areas','areas.id','=','subjects.id_area')
        ->where('subjects.id_area', $id)
        ->select('subjects.*')
        ->get();

        return view('areas.subjects.index',compact('id','area','subjects'));
    }

    public function create($id){

        $area = DB::table('areas')
        ->where('id',$id)
        ->select('id','a_name')
        ->first();

        $subjects = DB::table('subjects')
        ->where('subjects.id_area', $id)
        ->max('s_order');
        $max =  $subjects + 100;

        return view('areas.subjects.create',compact('max','area'));
    }

    public function edit($id){

        $subjects = DB::table('subjects')
        ->leftJoin('areas','areas.id','=','subjects.id_area')
        ->where('subjects.id',$id)
        ->select('subjects.s_name','subjects.s_order','areas.id','subjects.id_area')
        ->first();

        $value = DB::table('subjects')->max('s_order');
        $max  = $value + 100;

        return view('areas.subjects.edit',compact('subjects','max','id'));
    }

    public function store(Request $request){

        //dd($request);

        $order = $request->s_order * 100;

        $subject = DB::table('subjects')
        ->where('id_area',$request->id_area)
        ->where('s_order',$order)
        ->first();

        if(!empty($subject)){

            $value = DB::table('subjects')
            ->where('id_area',$request->id_area)
            ->max('s_order');
            $number = $value / 100;
   
             for ($i=$number; $i >= $request->s_order; $i--)
              {
                $value = $i * 100;
   
                $subjects = subject::where('s_order', $value)
                ->where('id_area',$request->id_area)
                ->firstOrFail();
                $subjects->s_order = $value + 100;
                $subjects->update();
   
              }
   
           }

           $subjects = new subject;
           $subjects->id_area = $request->id_area;
           $subjects->s_name = $request->s_name;
           $subjects->s_order = $request->s_order;
           $subjects->s_state = 1;
           $subjects->created_by = Auth::user()->id;
           $subjects->save();

        return redirect()->route('areas.subjects.index',$request->id_area)->with('success','Registro creado con éxito');
    }

    public function update(Request $request){

        //dd($request);
        $subject = subject::find($request->id);
        $subject->s_name = $request->s_name;
        $subject->s_order = $request->s_order;
        $subject->updated_by  = Auth::user()->id;
        $subject->save();

        return redirect()->route('areas.subjects.index',$request->id_area)->with('success','Registro actualizado con éxito');
    }

    public function active($id,$id_area)
    {
        $subject  = subject::where('id', $id)->firstOrFail();
        $subject ->s_state = 1;
        $subject ->update();

        return redirect()->route  ('areas.subjects.index',$id_area)->with('success', trans('Registro activado con éxito'));
    }

    public function inactive($id,$id_area)
    {
        $subject  = subject::where('id', $id)->firstOrFail();
        $subject ->s_state = 0;
        $subject ->update();

        return redirect()->route  ('areas.subjects.index',$id_area)->with('success', trans('Registro inactivado con éxito'));

    }
}
