<?php

namespace App\Http\Controllers;

use App\Models\RequestQuote;
use App\Models\Work;
use Illuminate\Http\Request;

class WalletVirtualController extends Controller
{
    public function index(){
        $tutorPayments = RequestQuote::orderBy('created_at')->get();
        return view('wallet_virtual.index',compact('tutorPayments'));
    }

    public function show($quote){
        $work = Work::handlerQuote($quote)->first();
        return view('wallet_virtual.show',compact('work'));
    }
}
