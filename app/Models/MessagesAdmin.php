<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class MessagesAdmin extends Model
{

    protected $table = 'messages_admin';
   
    protected $fillable = [
        'id_user',
        'id_admin_process',
        'ma_date_message',
        'ma_text_message',
        'ma_state',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    
}
