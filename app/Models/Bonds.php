<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Coins;
use App\Models\Parametrics;
use App\User;

class Bonds extends Model
{
    use SoftDeletes;
    protected $table = 'bonds';

    protected $fillable = [
        'id_user',
        'id_type_bond',
        'id_type_value',
        'b_value',
        'b_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function coins() {
        return $this->belongsTo(Coins::class, 'id_coin');
    }

    public function type_bond() {
        return $this->belongsTo(Parametrics::class, 'id_type_bond');
    }

    public function value_bond() {
        return $this->belongsTo(Parametrics::class, 'id_type_value');
    }
    

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
