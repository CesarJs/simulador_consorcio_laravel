<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeginConditionsInTableCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ADD FOREIGN
        //pessoa fisica
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('condicao_um_pf')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('condicao_dois_pf')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('condicao_tres_pf')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        //pessoa juridica
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('condicao_um_pj')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('condicao_dois_pj')
              ->references('id')->on('conditions')
              ->onDelete('cascade');
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('condicao_tres_pj')
              ->references('id')->on('conditions')
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
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
