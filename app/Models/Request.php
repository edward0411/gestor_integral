<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;
    protected $table = 'requests';

    protected $fillable = [
        'date_delivery',
        'observation',
        'type_service_id',
        'request_state_id',
        'user_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parametric() {
        return $this->belongsTo(Parametrics::class, 'type_service_id');
    }

    public function requestState() {
        return $this->belongsTo(RequestState::class, 'request_state_id');
    }

    public function requestFiles() {
        return $this->hasMany(RequestFile::class, 'request_id');
    }

    public function requestHistorys() {
        return $this->hasMany(RequestHistory::class, 'request_id');
    }

    public function requestQuoteTutors() {
        return $this->hasMany(RequestQuoteTutor::class, 'request_id');
    }

    public function requestResponses() {
        return $this->hasMany(RequestResponse::class, 'request_id');
    }

    public function requestLanguages() {
        return $this->hasMany(RequestLanguage::class, 'request_id');
    }

    public function requestSystems() {
        return $this->hasMany(RequestSystem::class, 'request_id');
    }

    public function requestTopics() {
        return $this->hasMany(RequestTopic::class, 'request_id');
    }


    public function communications()
    {
        return $this->hasOne(Communications::class, 'id_request');
    }
}
