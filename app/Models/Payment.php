<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $table = 'payments';

    protected $fillable = [
        'value',
        'payment_type',
        'payment_reference',
        'observation',
        'request_quote_id',
        'vaucher',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function requestQuote() {
        return $this->belongsTo(RequestQuote::class, 'request_quote_id');
    }

    // scope

}
