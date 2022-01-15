<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddObservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutors_services', function (Blueprint $table) {
            $table->string('observation')->nullable()->after('id_service');
        });

        Schema::table('language_tutors', function (Blueprint $table) {
            $table->string('observation')->nullable()->after('l_t_namefile');
        });

        Schema::table('tutors_topics', function (Blueprint $table) {
            $table->string('observation')->nullable()->after('t_t_namefile');
        });

        Schema::table('tutors_systems', function (Blueprint $table) {
            $table->string('observation')->nullable()->after('t_s_namefile');
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
