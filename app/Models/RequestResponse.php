<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestResponse extends Model
{
    use SoftDeletes;
    protected $table = 'request_responses';

    protected $fillable = [
        'response',
        'request_id',
        'request_question_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function requestQuestion() {
        return $this->belongsTo(RequestQuestion::class, 'request_question_id');
    }
}
