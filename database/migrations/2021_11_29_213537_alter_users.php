<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class AlterUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users'))
        {
            Schema::table('users', function (Blueprint $table) {
                $table->string('u_key_number')->integer()->unique()->after('id');
            });

            if (Schema::hasColumn('users','name'))
            {
                Schema::table('users', function (Blueprint $table) {
                    $table->dropColumn('name');
                });
            }
            Schema::table('users', function (Blueprint $table) {
                $table->string('u_name')->nullable()->after('u_key_number');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->string('u_nickname')->unique()->after('u_name');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->string('u_type_doc')->nullable()->after('u_nickname');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->integer('u_num_doc')->nullable()->after('u_type_doc');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->integer('u_id_country')->after('u_num_doc');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->integer('u_id_means')->nullable()->after('u_id_country');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->integer('u_id_money')->nullable()->after('u_id_means');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->integer('u_line_first')->nullable()->after('u_id_money');
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
      
    }
}
