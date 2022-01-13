<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorsBanks extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_bank_details';


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
