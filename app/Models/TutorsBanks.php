<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorsBanks extends Model
{
    use SoftDeletes;
    protected $table = 'tutors_bank_details';
}