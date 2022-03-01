<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

    protected $fillable = [
        'id_user',
        'id_communication',
        'm_date_message',
        'm_text_message',
        'm_state',
        'm_file',
    ];
    
    public function communication()
    {
        return $this->belongsTo(Communications::class, 'id_communication');
    }

    public function user()
    {
       return $this->belongsTo(User::class, 'id_user');
    }
}
