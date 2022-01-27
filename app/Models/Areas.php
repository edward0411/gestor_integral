<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Areas extends Model
{
    use SoftDeletes;
    protected $table = 'areas';

    protected $fillable = [
        'a_name',
        'a_order',
        'a_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    const NAME = [
        'Salud Ocupacional',
    ];

    const ACTIVO = 1;

    // relaciones
    public function subjects() {
        return $this->hasMany(Subjects::class, 'id_area');
    }
}
