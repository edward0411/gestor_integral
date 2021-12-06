<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('roles')){
          if(!Schema::hasColumn('roles','created_at'))
          Schema::table('roles', function (Blueprint $table){
           $table->integer('created_at')->nullable()->alter('guard_name');
          });

        }

        if(Schema::hasTable('roles')){
            if(!Schema::hasColumn('roles','updated_at'))
            Schema::table('roles', function (Blueprint $table){
             $table->integer('updated_at')->nullable()->alter('created_at');
            });
  
          }
          if(Schema::hasTable('roles')){
            if(!Schema::hasColumn('roles','deleted_at'))
            Schema::table('roles', function (Blueprint $table){
             $table->integer('deleted_at')->nullable()->alter('updated_at');
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
        //
    }
}
