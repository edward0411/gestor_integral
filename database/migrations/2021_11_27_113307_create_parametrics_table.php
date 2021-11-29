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
        Schema::create('parametrics', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_category',100);
            $table->string('p_value',100);
            $table->string('p_text',255);
            $table->integer('p_order');
            $table->timestamp('p_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('p_updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes('p_deleted_at');
            $table->integer('p_created_by')->unsigned();
            $table->integer('p_updated_by')->nullable()->unsigned();
            $table->integer('p_deleted_by')->nullable()->unsigned();
            $table->timestamps();
        });
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
