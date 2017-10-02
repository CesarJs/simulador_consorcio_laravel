<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;

class CreateCategoriesDefaultData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {       
        $categorias = ['Imóveis','Veiculos','Serviços','Eletro']; 
        foreach ($categorias as $value) {
            Category::create([
            'name'=>$value,         

            ]);
        }       
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $categorias = ['Imóveis','Veiculos','Imóveis','Eletro'];
        foreach ($categorias as $value) {
            $user = Category::where('name',$value)->first();
            if($user instanceof Category){
                $user->delete();
            }
        }
    }
}
