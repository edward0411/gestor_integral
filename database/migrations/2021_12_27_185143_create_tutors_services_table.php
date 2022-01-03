<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors_services', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_user')->unsigned(); 
            $table->integer('id_service')->unsigned();
            $table->integer('t_s_state');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('tutors_services');
    }
}
