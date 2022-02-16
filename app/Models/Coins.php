<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Coins extends Model
{
    use SoftDeletes;
    protected $table = 'coins';


    public function users() {
        return $this->hasMany(User::class, 'u_id_money');
    }
}
