<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableObservationsServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_service')->unsigned();
            $table->text('text_observation');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->foreign('id_service')->references('id')->on('parametrics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_observations_services');
    }
}
