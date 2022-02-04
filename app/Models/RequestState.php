<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestState extends Model
{
    use SoftDeletes;
    protected $table = 'request_states';

    protected $fillable = [
        'name',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    const NAME = [
        'CREADA',
        'ENVIADA AL TUTOR',
        'EN COTIZACIÓN',
        'EN DESARROLLO',
        'ENTREGABLE PDT EN APROBACIÓN',
        'ENTREGABLE APROBADO',
        'ENTREGABLE RECHAZADO',
    ];

    // scope
    function scopeHandleState($query, $state){
        return $query->where('name', $state);
    }

}
