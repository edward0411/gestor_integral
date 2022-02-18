<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('observation')->nullable();
            $table->string('file')->nullable();

            $table->unsignedBigInteger('work_id');
            $table->foreign('work_id')->references('id')->on('works');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('wallet_virtual', function (Blueprint $table) {
            $table->dropForeign('wallet_virtual_deliverable_id_foreign');
            $table->dropColumn('deliverable_id');

            $table->unsignedBigInteger('work_id')->after('status');
            $table->foreign('work_id')->references('id')->on('works');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_details');
    }
}
