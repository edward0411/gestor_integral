<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTutorsBankDetailsNullFile extends Migration
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
            if (Schema::hasColumn('tutors_bank_details', 't_b_namefile'))
            {
                Schema::table('tutors_bank_details', function (Blueprint $table) {
                    $table->string('t_b_namefile',125)->nullable()->change();
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
