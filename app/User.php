<?php

namespace App;

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
    public function userActions() {
        return $this->hasMany(UserAction::class);
    }

    // scope
    function scopeRolUser($query, $rolName){
        return $query->whereHas("roles", function($q) use($rolName){
                                            $q->where("name", $rolName);
                                        });
    }
}
