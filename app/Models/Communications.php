<?php

namespace App\Models;

use App\User;
use App\Models\Messages;
use Illuminate\Database\Eloquent\Model;

class Communications extends Model
{

    protected $fillable = [
        'id_user',
        'id_request',
        'c_status',
    ];


    public function request()
    {
        return $this->belongsTo(Request::class, 'id_request');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function messages()
    {
        return $this->hasMany(Messages::class, 'id_communication');
    }
}
