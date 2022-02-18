<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkDetail extends Model
{
    use SoftDeletes;
    protected $table = 'work_details';

    protected $fillable = [
        'observation',
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

    // scope

}
