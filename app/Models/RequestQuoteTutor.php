<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestQuoteTutor extends Model
{
    use SoftDeletes;
    protected $table = 'request_quote_tutors';

    protected $fillable = [
        'value',
        'observation',
        'request_id',
        'user_id',
        'application_date',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    // relaciones
    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requestQuote() {
        return $this->hasOne(RequestQuote::class, 'request_quote_tutor_id');
    }
}
