<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorLanguage extends Model
{
    use SoftDeletes;
    protected $table = 'language_tutors';

    protected $fillable = [
        'id_user',
        'id_language',
        'l_t_namefile',
        'l_t_state',
        'observation'
    ];

    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function parametric() {
        return $this->belongsTo(Parametrics::class, 'id_language');
    }

    // scope
    function scopeInfoUser($query, $id){
        return $query->where('id_user', $id);
    }

    function scopeInfoLanguage($query, $id){
        return $query->where('id_language', $id);
    }

    function scopeInfoState($query, array $state){
        return $query->whereIn('l_t_state', $state);
    }
}
