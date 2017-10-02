<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprinteger;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',20);
            $table->string('descricao_do_bem',100);
            $table->float('credito');
            $table->float('primeira_parcela_pf');
            $table->integer('condicao_um_pf');
            $table->integer('condicao_dois_pf');
            $table->integer('condicao_tres_pf');
            $table->float('primeira_parcela_pj');
            $table->integer('condicao_um_pj');
            $table->integer('condicao_dois_pj');
            $table->integer('condicao_tres_pj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
