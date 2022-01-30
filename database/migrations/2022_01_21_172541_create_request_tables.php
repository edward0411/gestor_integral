<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date_delivery')->comment('fecha de entrega');
            $table->text('observation')->nullable();

            $table->unsignedInteger('type_service_id')->comment('tipo de servicio');
            $table->foreign('type_service_id')->references('id')->on('parametrics');

            $table->unsignedBigInteger('request_state_id')->comment('estado de solicitud');
            $table->foreign('request_state_id')->references('id')->on('request_states');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('start_date')->comment('fecha de inicio');
            $table->dateTime('end_date')->comment('fecha fin');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->unsignedBigInteger('request_state_id');
            $table->foreign('request_state_id')->references('id')->on('request_states');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->enum('question_type',['ABIERTA','CERRADA'])->comment('tipo de pregunta');

            $table->unsignedInteger('type_service_id')->comment('tipo de servicio');
            $table->foreign('type_service_id')->references('id')->on('parametrics');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('response')->comment('respuesta');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->unsignedBigInteger('request_question_id');
            $table->foreign('request_question_id')->references('id')->on('request_questions');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_topics', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->unsignedInteger('tutor_topic_id');
            $table->foreign('tutor_topic_id')->references('id')->on('tutors_topics');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_systems', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->unsignedInteger('tutor_system_id');
            $table->foreign('tutor_system_id')->references('id')->on('tutors_systems');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_languages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->unsignedInteger('language_tutor_id');
            $table->foreign('language_tutor_id')->references('id')->on('language_tutors');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_quote_tutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('value')->comment('valor de la cotización del tutor');
            $table->text('observation')->nullable();

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('request_quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('value')->comment('valor de la cotización');
            $table->text('observation')->nullable();

            $table->unsignedBigInteger('request_quote_tutor_id');
            $table->foreign('request_quote_tutor_id')->references('id')->on('request_quote_tutors');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
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
        Schema::dropIfExists('request_states');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('request_files');
        Schema::dropIfExists('request_history');
        Schema::dropIfExists('request_questions');
        Schema::dropIfExists('request_responses');
        Schema::dropIfExists('request_themes');
        Schema::dropIfExists('request_quote_tutors');
        Schema::dropIfExists('request_quotes');
    }
}
