<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesCampsPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_quote_tutors', function (Blueprint $table) {
            $table->string('trm_assigned')->nullable()->after('status');
        });

        Schema::table('request_quotes', function (Blueprint $table) {
            $table->date('date_quote')->nullable()->after('utility_type_id');
            $table->date('date_validate')->nullable()->after('date_quote');
            $table->string('trm_assigned')->nullable()->after('status');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->string('trm_assigned')->nullable()->after('value');
        });

        Schema::table('wallet_details', function (Blueprint $table) {
            $table->string('trm_assigned')->nullable()->after('value');
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
