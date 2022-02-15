<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_date')->comment('fecha de inicio');
            $table->date('end_date')->comment('fecha de fin');

            $table->unsignedBigInteger('request_quote_id');
            $table->foreign('request_quote_id')->references('id')->on('request_quotes');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('deliverables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_delivery')->comment('fecha de entrega');
            $table->integer('status')->comment('1 = subido; 2 = descargable');
            $table->integer('status_deliverable')->default(1)->comment('1 = ENTREGABLE PTE APROBACIÓN; 2 = ENTREGABLE APROBADO; 3= ENTREGABLE RECHAZADO');
            $table->string('file')->nullable();

            $table->unsignedBigInteger('work_id');
            $table->foreign('work_id')->references('id')->on('works');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('wallet_virtual', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->default(1)->comment('1 = Pte_pago; 2 = paagda;');

            $table->unsignedBigInteger('deliverable_id');
            $table->foreign('deliverable_id')->references('id')->on('deliverables');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('wallet_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('value')->comment('valor de pago');
            $table->string('reference')->comment('referencia');
            $table->string('vaucher')->nullable()->comment('factura');
            $table->text('observation')->nullable();

            $table->unsignedBigInteger('wallet_virtual_id');
            $table->foreign('wallet_virtual_id')->references('id')->on('wallet_virtual');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_tables');
    }
}
