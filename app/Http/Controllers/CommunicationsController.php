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
        $user = Auth::user();
        $communications = Communications::with(['request' => function ($query) {
            $query->with('requestState');
        }, 'messages' => function ($query) {
            $query->where('m_state', 0);
        }, 'user']);
        if (!$user->hasRole('Administrador')) {
            $communications = $communications->where('id_user', $user->id);
        }
        $communications = $communications->get();
        return view('communications.index', compact('communications'));
    }

    public function living($id)
    {
        $communication = Communications::with(['request' => function ($query) {
            $query->with('parametric');
            $query->with('requestState');
        }, 'messages' => function($query) {
            $query->with(['user' => function ($query){
                $query->with('roles');
            }]);
        }, 'user'])->find($id);
        # mark as reading messages
        $communication->messages()->where('m_state', 0)->update(['m_state' => 1]);
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
