<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Observations_services extends Model
{

    protected $table = 'observations_services';
   
    protected $fillable = [
        'id_service',
        'text_observation',
        'order',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function service()
    {
        return $this->belongsTo(Parametrics::class, 'id_service');
    }
    
    
}