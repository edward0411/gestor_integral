<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parametrics extends Model
{
    use SoftDeletes;
    protected $table = 'parametrics';

    // relaciones
    public function users() {
        return $this->hasMany(User::class, 'u_type_doc');
    }
}
