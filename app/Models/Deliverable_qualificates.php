<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliverable_qualificates extends Model
{
    use SoftDeletes;
    protected $table = 'deliverable_qualificates';

    protected $fillable = [
        'id_deliverable',
        'date_qualificate',
        'state_deliverable',
        'value_qualificate',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function deliverable() {
        return $this->belongsTo(Deliverable::class, 'id_deliverable');
    }

    public function points() {
        return $this->belongsTo(PointsQualificates::class, 'value_qualificate');
    }

}