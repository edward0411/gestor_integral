<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRequestQuoteTutors extends Migration
{
   
    public function up()
    {
        Schema::table('request_quote_tutors', function (Blueprint $table) {
            $table->date('application_date')->nullable();
        });
    }

    public function down()
    {
        //
    }
}
