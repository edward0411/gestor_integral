<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BondQuote extends Model
{
    use SoftDeletes;
    protected $table = 'bond_quotes';

    protected $fillable = [
        'bond_id',
        'request_quote_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function bond() {
        return $this->belongsTo(Bonds::class, 'bond_id');
    }

    public function requestQuote() {
        return $this->belongsTo(RequestQuote::class, 'request_quote_id');
    }

    // scope
    function scopeHandleText($query, $text){
        return $query->where('a_name', $text);
    }
}
