<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topics extends Model
{
    use SoftDeletes;

    protected $table = 'topics';


    protected $fillable = [
        'id_subject',
        't_name',
        't_order',
        't_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    const NAME = [
        'Vacunción',
    ];

    const ACTIVO = 1;

    // relaciones
    public function subject() {
        return $this->belongsTo(Subjects::class, 'id_subject');
    }

    public function tutorTopics() {
        return $this->hasMany(TutorTopic::class, 'id_topic');
    }
}
