<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChangedRequest extends Model
{
    use SoftDeletes;
    protected $table = 'change_requests';

    const PENDIENTE     = 0;
    const APROBADO      = 1;
    const RECHAZADO     = 2;

    protected $fillable = [
        'id_user',
        'request_name',
        'request_value',
        'request_observation',
        'request_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    // scope
    function scopeHandleState($query, $state){
        return $query->where('request_state', $state);
    }

    function scopeHandleName($query, $name){
        return $query->where('request_name', $name);
    }

    function scopeHandleUser($query, $id){
        return $query->where('id_user', $id);
    }
}
