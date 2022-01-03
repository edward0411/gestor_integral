<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors_bank_details', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_user')->unsigned(); 
            $table->integer('id_bank')->unsigned();
            $table->integer('id_type_account')->unsigned();
            $table->string('t_b_number_account',255);
            $table->text('t_b_namefile');
            $table->integer('t_b_state');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_bank')->references('id')->on('parametrics');
            $table->foreign('id_type_account')->references('id')->on('parametrics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutors_bank_details');
    }
}
