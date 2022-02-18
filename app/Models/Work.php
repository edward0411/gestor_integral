<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;
    protected $table = 'works';

    protected $fillable = [
        'start_date',
        'end_date',
        'request_quote_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // relaciones
    public function requestQuote() {
        return $this->belongsTo(RequestQuote::class, 'request_quote_id');
    }

    public function deliverable() {
        return $this->hasOne(Deliverable::class, 'work_id');
    }

    public function walletVirtual() {
        return $this->hasOne(WalletVirtual::class, 'work_id');
    }

    public function workDetails() {
        return $this->hasMany(WorkDetail::class, 'work_id');
    }

    // scope
    function scopeHandlerQuote($query, $id){
        return $query->where('request_quote_id', $id);
    }
}
