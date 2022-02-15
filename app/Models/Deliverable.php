<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliverable extends Model
{
    use SoftDeletes;
    protected $table = 'deliverables';

    protected $fillable = [
        'date_delivery',
        'status',
        'status_deliverable',
        'file',
        'work_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // relaciones
    public function work() {
        return $this->belongsTo(Work::class, 'work_id');
    }
}
