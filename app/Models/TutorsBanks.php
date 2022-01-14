<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorsBanks extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_bank_details';

    protected $fillable = [
        'id_user',
        'id_bank',
        'id_type_account',
        't_b_number_account',
        't_b_namefile',
        't_b_state',
        't_b_observations',
    ];


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

}
