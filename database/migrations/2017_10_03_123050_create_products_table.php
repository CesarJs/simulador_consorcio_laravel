<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('theme_id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->float('primeira_parcela_pf');
            $table->integer('condicao_um_pf')->unsigned()->nullable();
            $table->integer('condicao_dois_pf')->unsigned()->nullable();
            $table->float('primeira_parcela_pj');
            $table->integer('condicao_um_pj')->unsigned()->nullable();
            $table->integer('condicao_dois_pj')->unsigned()->nullable();
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
        Schema::dropIfExists('products');
    }
}
