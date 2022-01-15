<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topics extends Model
{
    use SoftDeletes;

    protected $table = 'topics';


    // relaciones
    public function subject() {
        return $this->belongsTo(Subjects::class, 'id_subject');
    }

    public function tutorTopics() {
        return $this->hasMany(TutorTopic::class, 'id_topic');
    }
}
