<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use SoftDeletes;
    protected $table = 'subjects';

    protected $fillable = [
        'id_area',
        's_name',
        's_order',
        's_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    const NAME = [
        'Enfermeria basica',
    ];

    const ACTIVO = 1;

    // relaciones
    public function area() {
        return $this->belongsTo(Areas::class, 'id_area');
    }

    public function topics() {
        return $this->hasMany(Topics::class, 'id_subject');
    }
}
