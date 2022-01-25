<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRequestRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_topics', function (Blueprint $table) {
            $table->dropForeign('request_topics_tutor_topic_id_foreign');
            $table->dropColumn('tutor_topic_id');

            $table->unsignedInteger('topic_id')->comment('tipo de tema')->after('request_id');
            $table->foreign('topic_id')->references('id')->on('parametrics');
        });

        Schema::table('request_systems', function (Blueprint $table) {
            $table->dropForeign('request_systems_tutor_system_id_foreign');
            $table->dropColumn('tutor_system_id');


            $table->unsignedInteger('system_id')->comment('tipo de sistema')->after('request_id');
            $table->foreign('system_id')->references('id')->on('parametrics');
        });

        Schema::table('request_languages', function (Blueprint $table) {
            $table->dropForeign('request_languages_language_tutor_id_foreign');
            $table->dropColumn('language_tutor_id');


            $table->unsignedInteger('language_id')->comment('tipo de lenguaje')->after('request_id');
            $table->foreign('language_id')->references('id')->on('parametrics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
