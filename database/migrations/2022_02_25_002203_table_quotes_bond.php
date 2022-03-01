<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableQuotesBond extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bond_quotes', function (Blueprint $table) {
            $table->decimal('value_bond',24,4)->after('request_quote_id');
            $table->decimal('trm_assigned',24,4)->after('value_bond');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bond_quotes');
    }
}
