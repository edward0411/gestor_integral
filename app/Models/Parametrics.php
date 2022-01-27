<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parametrics extends Model
{
    use SoftDeletes;
    protected $table = 'parametrics';

    protected $fillable = [
        'p_category',
        'p_text',
        'p_order',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // relaciones
    public function users() {
        return $this->hasMany(User::class, 'u_type_doc');
    }

    public function tutorLanguages() {
        return $this->hasMany(TutorLanguage::class, 'id_language');
    }

    public function tutorSystems() {
        return $this->hasMany(TutorSystem::class, 'id_system');
    }

    public function tutorServices() {
        return $this->hasMany(TutorService::class, 'id_service');
    }

    // scope
    function scopeHandleText($query, $text){
        return $query->where('p_text', $text);
    }

}
