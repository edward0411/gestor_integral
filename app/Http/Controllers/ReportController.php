<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Request as solicitud;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function report_home(){

        $id_rol = Auth::user()->roles()->first()->id;
        $hoy = Carbon::now()->parse()->format('Y-m-d');
        $semana = Carbon::parse($hoy)->addDay(7)->format('Y-m-d');
        $mes = Carbon::parse($hoy)->addDay(30)->format('Y-m-d');    
        
        $count_hoy = solicitud::where('date_delivery',$hoy)->get()->count();
        $count_semana = solicitud::whereBetween('date_delivery', [$hoy, $semana])->get()->count();
        $count_mes = solicitud::whereBetween('date_delivery', [$hoy, $mes])->get()->count();

        return view('home',compact('count_hoy','count_semana','count_mes','id_rol'));
    }
}
