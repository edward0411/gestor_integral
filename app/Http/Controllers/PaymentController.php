<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\RequestQuote;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){

        $quotes = RequestQuote::orderBy('created_at')->get();
        return view('payments.index',compact('quotes'));
    }

    public function show(RequestQuote $quote){
        return view('payments.show',compact('quote'));
    }
}
