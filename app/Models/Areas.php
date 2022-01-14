<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Areas extends Model
{
    use SoftDeletes;
    protected $table = 'areas';


    // relaciones
    public function subjects() {
        return $this->hasMany(Subjects::class, 'id_area');
    }
}
