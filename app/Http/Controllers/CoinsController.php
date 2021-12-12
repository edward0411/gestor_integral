<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Coins as coins;


class CoinsController extends Controller
{
    public function index(){

        $coins = coins::all();

        return view('coins.index',compact('coins'));
    }

    public function create(){

        return view('coins.create');
    }
    public function edit($id){

        $coins = coins::findOrFail($id);

        return view('coins.edit',compact('coins'));
    }
    public function store(Request $request){

        $coins = new coins;
        $coins->c_currency = $request->c_currency;
        $coins->c_type_currency = $request->c_type_currency;
        $coins->c_trm_currency = $request->c_trm_currency;
        $coins->c_order = $request->c_order;
        $coins->c_state = 1;
        $coins->created_by = Auth::user()->id;
        $coins->save();

        return redirect()->route('coins.index')->with('success','Registro creado con éxito');
    }

    public function update(Request $request){

        $coins = coins::where('id', '=', $request->id)->first();
        $coins->c_currency = $request->c_currency;
        $coins->c_type_currency = $request->c_type_currency;
        $coins->c_trm_currency = $request->c_trm_currency;
        $coins->c_order = $request->c_order;
        $coins->c_state = 1;
        $coins->updated_by = Auth::user()->id;
        $coins->save();

        return redirect()->route('coins.index')->with('success','Registro creado con éxito');
    }

    public function active($id)
    {
        $coins  = coins::where('id', $id)->firstOrFail();
        $coins ->c_state = 1;
        $coins ->update();

        return redirect()->route  ('coins.index')->with('success', trans('La momeda fue activada con éxito'));
    }

    public function inactive($id)
    {
        $coins  = coins::where('id', $id)->firstOrFail();
        $coins ->c_state = 0;
        $coins ->update();

        return redirect()->route  ('coins.index')->with('success', trans('La moneda fue inactivada con éxito'));

    }
}
