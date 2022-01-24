<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestSystem extends Model
{
    use SoftDeletes;
    protected $table = 'request_systems';

    protected $fillable = [
        'request_id',
        'system_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function tutorSystem() {
        return $this->belongsTo(Parametrics::class, 'system_id');
    }
}
