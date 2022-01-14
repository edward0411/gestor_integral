<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use SoftDeletes;
    protected $table = 'subjects';


    // relaciones
    public function area() {
        return $this->belongsTo(Areas::class, 'id_area');
    }

    public function topics() {
        return $this->hasMany(Topics::class, 'id_subject');
    }
}
