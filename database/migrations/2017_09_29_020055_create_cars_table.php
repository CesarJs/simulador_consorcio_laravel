<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprinteger;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('codigo',20);
            $table->string('descricao_do_bem',100);
            $table->integer('category_id')->unsigned();            
            $table->integer('provider_id')->unsigned();            
            $table->double('credito');
            $table->float('primeira_parcela_pf');
            $table->integer('condicao_um_pf')->unsigned()->nullable();
            $table->integer('condicao_dois_pf')->unsigned()->nullable();
            $table->integer('condicao_tres_pf')->unsigned()->nullable();
            $table->float('primeira_parcela_pj');
            $table->integer('condicao_um_pj')->unsigned()->nullable();
            $table->integer('condicao_dois_pj')->unsigned()->nullable();
            $table->integer('condicao_tres_pj')->unsigned()->nullable();
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
        
        Schema::dropIfExists('cars');
    }
}
