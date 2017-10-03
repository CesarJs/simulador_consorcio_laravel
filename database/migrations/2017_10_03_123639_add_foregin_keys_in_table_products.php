<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeginKeysInTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('condicao_um_pf')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('condicao_dois_pf')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        
        //pessoa juridica
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('condicao_um_pj')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('condicao_dois_pj')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });


        // theme = bem 
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('theme_id')
              ->references('id')->on('themes')
              ->onDelete('cascade');
        });
        //plano

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('plan_id')
              ->references('id')->on('plans')
              ->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
