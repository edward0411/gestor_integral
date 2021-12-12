<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersState extends Migration
{
    public function up()
    {
        if (Schema::hasTable('users'))
        {
            if(!Schema::hasColumn('users','u_state'))
            {
                Schema::table('users', function (Blueprint $table) {
                    $table->string('u_state')->after('u_line_first');
                });
            }
            if(!Schema::hasColumn('users','u_indicativo'))
            {
                Schema::table('users', function (Blueprint $table) {
                    $table->string('u_indicativo')->after('u_key_number');
                });   
            }   
        }
    }
    public function down()
    {
        //
    }
}
