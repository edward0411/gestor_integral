<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestTopic extends Model
{
    use SoftDeletes;
    protected $table = 'request_topics';

    protected $fillable = [
        'request_id',
        'topic_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function tutorTopic() {
        return $this->belongsTo(Parametrics::class, 'topic_id');
    }
}
