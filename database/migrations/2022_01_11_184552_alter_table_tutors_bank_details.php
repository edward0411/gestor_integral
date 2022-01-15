<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTutorsBankDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tutors_bank_details'))
        {
            if (!Schema::hasColumn('tutors_bank_details', 't_b_observations'))
            {
                Schema::table('tutors_bank_details', function (Blueprint $table) {
                    $table->longtext('t_b_observations')->nullable()->comment('campo para guardar las observaciones de el que autoriza o rechaza')->after('t_b_state');
                });
            }
        }
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
