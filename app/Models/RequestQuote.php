<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestQuote extends Model
{
    use SoftDeletes;
    protected $table = 'request_quotes';

    protected $fillable = [
        'value',
        'observation',
        'request_quote_tutor_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function requestQuoteTutor() {
        return $this->belongsTo(RequestQuoteTutor::class, 'request_quote_tutor_id');
    }
}
