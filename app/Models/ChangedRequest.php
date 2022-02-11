<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChangedRequest extends Model
{
    use SoftDeletes;
    protected $table = 'change_requests';

    const PENDIENTE     = 0;
    const APROBADO      = 1;
    const RECHAZADO     = 2;

    protected $fillable = [
        'id_user',
        'request_name',
        'request_value',
        'request_observation',
        'request_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    // scope
    function scopeHandleState($query, $state){
        return $query->where('request_state', $state);
    }

    function scopeHandleName($query, $name){
        return $query->where('request_name', $name);
    }

    function scopeHandleUser($query, $id){
        return $query->where('id_user', $id);
    }

    // Accessor
    public function getStateAttribute()
    {
        $name = null;
        switch ($this->request_state) {
            case 0:
               $name = 'PENDIENTE';
                break;
            case 1:
               $name = 'APROBADO';
                break;
            case 2:
               $name = 'RECHAZADO';
        }
        return $name;
    }

    public function getValueAttribute()
    {
        $name = null;
        switch ($this->request_name) {
            case 'u_type_doc':
               $name = Parametrics::find($this->request_value)['p_text'];
                break;
            case 'u_id_means':
                $name = Parametrics::find($this->request_value)['p_text'];
                break;
            case 'u_id_country':
                $name = Countries::find($this->request_value)['c_name'];
                break;
            default:
                $name = $this->request_value;
            break;
        }
        return $name;
    }

    public function getNameAttribute()
    {
        $name = null;
        switch ($this->request_name) {
            case 'u_name':
               $name = 'Nombre completo';
                break;
            case 'u_nickname':
               $name = 'Nombre de usuario';
                break;
            case 'u_key_number':
               $name = 'Numero de telefono ';
                break;
            case 'u_indicativo':
               $name = 'Indicativo de telefono ';
                break;
            case 'u_type_doc':
               $name = 'Tipo de documento ';
                break;
            case 'u_num_doc':
               $name = 'Numero de documento ';
                break;
            case 'u_id_country':
               $name = 'Pais de origen ';
                break;
            case 'u_id_means':
               $name = 'Medio de contacto ';
                break;
            default:
                $name = $this->request_name;
                break;
        }
        return $name;
    }


}
