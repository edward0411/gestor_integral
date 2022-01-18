<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorTopic extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_topics';


    protected $fillable = [
        'id_user',
        'id_topic',
        't_t_namefile',
        't_t_state',
        'observation'
    ];

    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function topic() {
        return $this->belongsTo(Topics::class, 'id_topic');
    }

    // scope
    function scopeInfoUser($query, $id){
        return $query->where('id_user', $id);
    }

    function scopeInfoTopic($query, $id){
        return $query->where('id_topic', $id);
    }

    function scopeInfoState($query, array $state){
        return $query->whereIn('t_t_state', $state);
    }
}
