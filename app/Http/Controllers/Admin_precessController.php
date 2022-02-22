<?php

namespace App\Http\Controllers;

use App\Models\AdminProcess;
use App\Models\MessagesAdmin;
use Illuminate\Http\Request;
use App\Traits\Managment;
use Illuminate\Support\Facades\Auth;

class Admin_precessController extends Controller
{
    public function index(){

        $user = Auth::user();
        $admin_process = AdminProcess::with(['messages_admin' => function ($query) use ($user) {
            $query->where([
                ['ma_state', '=', 0],
                ['id_user', '<>', $user->id],
            ]);
        }, 'user']);
       
        if (\Auth::user()->roles()->first()->id == 6) {
            $admin_process = $admin_process->where('id_user', $user->id);
        }
        $admin_process = $admin_process->get();

        
        return view('admin_process.index',compact('admin_process'));
    }
    
    public function messages($id)
    {
        
        $user = Auth::user();
        $admin_process = AdminProcess::with(['messages_admin' => function ($query){
            $query->orderBy('ma_date_message', 'desc');
            $query->with(['user' => function ($query){
                $query->with('roles');
            }]);
        }, 'user'])->find($id);
        
        # mark as reading messages
        $admin_process->messages_admin()->where([
            ['ma_state', '=', 0],
            ['id_user', '<>', Auth::user()->id],
            ])->update(['ma_state' => 1]);
            
            
            
            return view('admin_process.messages',compact('admin_process'));
        }
        
        public function store_messages(Request $request, AdminProcess $admin_process)
        {
          // dd($request);

        $admin_process->messages_admin()->create([
            'id_user' => Auth::user()->id,
            'ma_date_message' => date('Y-m-d H:i:s'),
            'ma_text_message' => $request->message,
            'ma_state' => 0,
            'ma_state' => 0,
            'created_by' => 0,
        ]);
        return back();
    }
    
}
