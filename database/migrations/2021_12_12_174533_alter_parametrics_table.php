<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterParametricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('parametrics'))
        {
            if (Schema::hasColumn('parametrics','p_value'))
            {
                Schema::table('parametrics', function (Blueprint $table) {
                    $table->dropColumn('p_value');
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
