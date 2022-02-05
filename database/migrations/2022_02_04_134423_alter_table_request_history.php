<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRequestHistory extends Migration
{

    public function up()
    {
        if (Schema::hasTable('request_history'))
        {
            if (Schema::hasColumn('request_history', 'end_date'))
            {
                Schema::table('request_history', function (Blueprint $table) {
                    $table->date('end_date')->nullable()->change();
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
       
    }
}
