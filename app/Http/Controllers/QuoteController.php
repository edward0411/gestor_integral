<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return view('quotes.index');
    }

    public function myQuotes()
    {
        return view('quotes.MyQuotes');
    }

    public function create_quotes(){

        return view('quotes.create_my_quotes');
    }

    public function edit_quotes(){

        return view('quotes.edit_my_quotes');
    }
}
