<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Managment;

class QuoteController extends Controller
{

    use Managment;

    public function index()
    {
        return view('quotes.index');
    }

    public function myQuotes()
    {
        return view('quotes.MyQuotes');
    }

    public function create_quotes(){
        
        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('quotes.create_my_quotes',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }

    public function edit_quotes(){

        $services = $this->getDataParametrics('param_list_services')->orderby('p_order')->get();
        $languages = $this->getDataParametrics('param_list_languages')->orderby('p_order')->get();
        $list_systems = $this->getDataParametrics('param_list_systems')->orderby('p_order')->get();
        $areas = $this->getInfoTable('areas')->where('a_state',1)->get();
        $subjects = $this->getInfoTable('subjects')->where('s_state',1)->get();
        $topics = $this->getInfoTable('topics')->where('t_state',1)->get();
        $question = $this->getRequest_questions('request_questions')->where('status',1)->select('request_questions.id','question','question_type','type_service_id')->get();

        return view('quotes.edit_my_quotes',compact('languages','list_systems','areas','subjects','topics','services','question'));
    }

    public function store_quotes(Request $request){
        dd($request);
    }
}
