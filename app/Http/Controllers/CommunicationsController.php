<?php

namespace App\Http\Controllers;

use App\Models\Communications;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Traits\Managment;
use Illuminate\Support\Facades\Auth;

class CommunicationsController extends Controller
{
    use Managment;

    public function index()
    {
        $communications = Communications::with(['request' => function ($query) {
            $query->with('requestState');
        }, 'user'])->get();
        return view('communications.index', compact('communications'));
    }

    public function living($id)
    {
        $communication = Communications::with(['request' => function ($query) {
            $query->with('parametric');
            $query->with('requestState');
        }, 'messages' => function($query) {
            $query->with('user');
        }, 'user'])->find($id);
        return view('communications.living', compact('communication'));
    }

    public function storeMesage(Request $request, Communications $communication)
    {
        $communication->messages()->create([
            'id_user' => Auth::user()->id,
            'm_date_message' => date('Y-m-d H:i:s'),
            'm_text_message' => $request->message,
            'm_state' => 0,
        ]);
        return back();
    }
    
}
