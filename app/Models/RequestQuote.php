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
        'value_utility',
        'private_note',
        'utility_type_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function requestQuoteTutor() {
        return $this->belongsTo(RequestQuoteTutor::class, 'request_quote_tutor_id');
    }

    public function utilityType() {
        return $this->belongsTo(Parametrics::class, 'utility_type_id');
    }

    public function bondQuotes() {
        return $this->hasMany(BondQuote::class, 'bond_id');
    }
}
