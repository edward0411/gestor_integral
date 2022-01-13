<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorLanguage extends Model
{
    use SoftDeletes;
    protected $table = 'language_tutors';


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
