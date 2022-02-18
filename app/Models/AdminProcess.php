<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\MessagesAdmin;

class AdminProcess extends Model
{
     
    protected $table = 'admin_process';

    protected $fillable = [
        'id_user',
        'ap_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function messages_admin()
    {
        return $this->hasMany(MessagesAdmin::class, 'id_admin_process');
    }
}
