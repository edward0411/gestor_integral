<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('value')->comment('valor del pago');
            $table->enum('payment_type',['PARCIAL','TOTAL']);
            $table->string('payment_reference')->unique()->comment('refrencia de pago');
            $table->text('observation')->nullable();
            $table->string('vaucher')->nullable();

            $table->unsignedBigInteger('request_quote_id');
            $table->foreign('request_quote_id')->references('id')->on('request_quotes');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('bond_quotes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('bond_id');
            $table->foreign('bond_id')->references('id')->on('bonds');

            $table->unsignedBigInteger('request_quote_id');
            $table->foreign('request_quote_id')->references('id')->on('request_quotes');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('request_quotes', function (Blueprint $table) {
            $table->float('value')->change();
            $table->float('value_utility',10)->after('value');
            $table->text('private_note')->nullable()->after('observation');

            $table->unsignedInteger('utility_type_id')->comment('tipo de utilidad')->after('request_quote_tutor_id');
            $table->foreign('utility_type_id')->references('id')->on('parametrics');
        });

        Schema::table('request_quote_tutors', function (Blueprint $table) {
            $table->float('value')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
