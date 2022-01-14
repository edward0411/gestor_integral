<?php

namespace App;

use App\Models\Parametrics;
use App\Models\TutorLanguage;
use App\Models\TutorsBanks;
use App\Models\TutorService;
use App\Models\TutorSystem;
use App\Models\TutorTopic;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    const REGISTRADO    = 1;
    const APROBADO      = 2;
    const RECHAZADO     = 3;
    const NO_ACEPTADO   = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'u_key_number',
        'u_indicativo',
        'u_name',
        'u_nickname',
        'u_type_doc',
        'u_num_doc',
        'u_id_country',
        'u_id_means',
        'u_id_money',
        'u_line_first',
        'u_state',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relaciones
    public function tutorsBanks() {
        return $this->hasMany(TutorsBanks::class, 'id_user');
    }

    public function tutorSystems() {
        return $this->hasMany(TutorSystem::class, 'id_user');
    }

    public function tutorServices() {
        return $this->hasMany(TutorService::class, 'id_user');
    }

    public function tutorLanguages() {
        return $this->hasMany(TutorLanguage::class, 'id_user');
    }

    public function tutorTopics() {
        return $this->hasMany(TutorTopic::class, 'id_user');
    }

    public function parametric() {
        return $this->belongsTo(Parametrics::class, 'u_type_doc');
    }

    // scope
    function scopeRolUser($query, $rolName){
        return $query->whereHas("roles", function($q) use($rolName){
                                            $q->where("name", $rolName);
                                        });
    }

    function scopeStateUser($query, $state){
        return $query->where('u_state', $state);
    }

    // Accessor
    public function getStateAttribute()
    {
        $sate = null;
        if ($this->u_state == User::REGISTRADO) {
            $state = 'REGISTRADO';
        }
        if ($this->u_state == User::APROBADO) {
            $state = 'APROBADO';
        }
        if ($this->u_state == User::RECHAZADO) {
            $state = 'RECHAZADO';
        }
        if ($this->u_state == User::NO_ACEPTADO) {
            $state = 'NO_ACEPTADO';
        }
        return $state;
    }
}
