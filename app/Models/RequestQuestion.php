<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestQuestion extends Model
{
    use SoftDeletes;
    protected $table = 'request_questions';

    protected $fillable = [
        'question',
        'question_type',
        'type_service_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function parametric() {
        return $this->belongsTo(Parametrics::class, 'type_service_id');
    }

    public function requestResponses() {
        return $this->hasMany(RequestResponse::class, 'request_question_id');
    }

}
