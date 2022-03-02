<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Topics as topics;

use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index($id){

        $subject = DB::table('subjects')
        ->where('id',$id)
        ->select('id','s_name')
        ->first();

        $topics = DB::table('topics')
        ->leftJoin('subjects','subjects.id','=','topics.id_subject')
        ->where('topics.id_subject', $id)
        ->select('topics.*')
        ->get();

        return view('areas.subjects.topics.index',compact('id','subject','topics'));
    }

    public function create($id){
        
        $subject = DB::table('subjects')
        ->where('id',$id)
        ->select('id','s_name')
        ->first();

        $topic = DB::table('topics')
        ->where('topics.id_subject', $id)
        ->max('t_order');
        $max =  $topic + 100;

        return view('areas.subjects.topics.create',compact('subject','max'));

    }

    public function edit($id){

        $topics = DB::table('topics')
        ->leftJoin('subjects','subjects.id','=','topics.id_subject')
        ->where('topics.id',$id)
        ->select('topics.t_name','topics.t_order','topics.id_subject')
        ->first();

        //dd($topics);

        $value = DB::table('topics')->max('t_order');
        $max  = $value + 100;

        return view('areas.subjects.topics.edit',compact('topics','max','id'));
    }

    public function store(Request $request){

        //dd($request);

        $order = $request->s_order * 100;

        $topic = DB::table('topics')
        ->where('id_subject',$request->id_subject)
        ->where('t_order',$order)
        ->first();

        if(!empty($topic)){

            $value = DB::table('topics')
            ->where('id_subject',$request->id_subject)
            ->max('t_order');
            $number = $value / 100;
   
             for ($i=$number; $i >= $request->t_order; $i--)
              {
                $value = $i * 100;
   
                $topics = topics::where('t_order', $value)
                ->where('id_subject',$request->id_subject)
                ->firstOrFail();
                $topics->t_order = $value + 100;
                $topics->update();
   
              }
   
           }

           $topics = new topics;
           $topics->id_subject = $request->id_subject;
           $topics->t_name = $request->t_name;
           $topics->t_order = $request->t_order;
           $topics->t_state = 1;
           $topics->created_by = Auth::user()->id;
           $topics->save();

        return redirect()->route('areas.subjects.topics.index',$request->id_subject)->with('success','Registro creado con éxito');
    }

    public function update(Request $request){

       // dd($request);

        $topics = topics::find($request->id);
        $topics->t_name = $request->t_name;
        $topics->t_order = $request->t_order;
        $topics->updated_by = Auth::user()->id;
        $topics->save();



        return redirect()->route('areas.subjects.topics.index',$request->id_subject)->with('success','Registro actualizado con éxito');
    }

    public function active($id,$id_subject)
    {
        $topics  = topics::where('id', $id)->firstOrFail();
        $topics ->t_state = 1;
        $topics ->update();

        return redirect()->route  ('areas.subjects.topics.index',$id_subject)->with('success', trans('Registro activado con éxito'));
    }

    public function inactive($id,$id_subject)
    {
        $topics  = topics::where('id', $id)->firstOrFail();
        $topics ->t_state = 0;
        $topics ->update();

        return redirect()->route  ('areas.subjects.topics.index',$id_subject)->with('success', trans('Registro inactivado con éxito'));

    }
}
