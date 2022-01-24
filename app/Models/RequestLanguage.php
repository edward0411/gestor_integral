<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestLanguage extends Model
{
    use SoftDeletes;
    protected $table = 'request_languages';

    protected $fillable = [
        'request_id',
        'language_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function tutorLanguage() {
        return $this->belongsTo(Parametrics::class, 'language_id');
    }
}
