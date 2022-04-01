<?php

namespace App\Http\Helpers;

use App\Mail\EmailWelcome;
use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    static function SendEmailWelcome($user,$token){
        Mail::to($user->email)->send(new EmailWelcome($user,$token));
    }
}
