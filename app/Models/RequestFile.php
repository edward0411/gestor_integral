<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestFile extends Model
{
    use SoftDeletes;
    protected $table = 'request_files';

    protected $fillable = [
        'file',
        'request_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

}
