<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorService extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_services';


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
