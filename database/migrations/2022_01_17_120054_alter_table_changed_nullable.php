<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableChangedNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('language_tutors', function (Blueprint $table) {
            $table->string('l_t_namefile')->nullable()->change();
        });

        Schema::table('tutors_topics', function (Blueprint $table) {
            $table->string('t_t_namefile')->nullable()->change();
        });

        Schema::table('tutors_systems', function (Blueprint $table) {
            $table->string('t_s_namefile')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
