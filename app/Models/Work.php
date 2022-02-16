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

    public function deliverables() {
        return $this->hasMany(Deliverable::class, 'work_id');
    }
}
