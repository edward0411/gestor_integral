<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorSystem extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_systems';

    protected $fillable = [
        'id_user',
        'id_system',
        't_s_namefile',
        't_s_state',
    ];

    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function parametric() {
        return $this->belongsTo(Parametrics::class, 'id_system');
    }

    // scope
    function scopeInfoUser($query, $id){
        return $query->where('id_user', $id);
    }
}
