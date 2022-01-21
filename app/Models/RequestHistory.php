<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestHistory extends Model
{
    use SoftDeletes;
    protected $table = 'request_history';

    protected $fillable = [
        'start_date',
        'end_date',
        'request_id',
        'request_state_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function requestState() {
        return $this->belongsTo(RequestState::class, 'request_state_id');
    }

}
