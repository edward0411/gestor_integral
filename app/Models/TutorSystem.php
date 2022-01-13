<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorSystem extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_systems';


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
