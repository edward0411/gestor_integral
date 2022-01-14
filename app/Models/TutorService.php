<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorService extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_services';

    protected $fillable = [
        'id_user',
        'id_service',
        't_s_state',
        'observation'
    ];

    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function parametric() {
        return $this->belongsTo(Parametrics::class, 'id_service');
    }

    // scope
    function scopeInfoUser($query, $id){
        return $query->where('id_user', $id);
    }
}
