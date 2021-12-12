<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('table')) {
            Schema::create('parametrics', function (Blueprint $table) {
                $table->increments('id');
                $table->string('p_category',100);
                $table->string('p_value',100);
                $table->string('p_text',255);
                $table->integer('p_order');
                $table->timestamps();
                $table->softDeletes('deleted_at');
                $table->integer('created_by')->nullable()->unsigned();
                $table->integer('updated_by')->nullable()->unsigned();
                $table->integer('deleted_by')->nullable()->unsigned();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametrics');
    }
}
