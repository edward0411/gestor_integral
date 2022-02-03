<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
