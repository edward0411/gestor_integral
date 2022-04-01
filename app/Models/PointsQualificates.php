<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointsQualificates extends Model
{
    use SoftDeletes;
    protected $table = 'points_qualificates';

    protected $fillable = [
        'point_value',
        'type_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function type() {
        return $this->belongsTo(Parametrics::class, 'type_state');
    }

}