<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',100);
            $table->string('email',150)->default(env('EMAIL_DEFAULT_CONTATO'));
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
        Schema::table('cars', function(Blueprint $table){
            //$table->dropForeign('cars_provider_id_foreign');
            $table->dropColumn('provider_id');
        });
        Schema::dropIfExists('providers');
    }
}
