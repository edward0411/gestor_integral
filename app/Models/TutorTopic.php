<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorTopic extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_topics';


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
