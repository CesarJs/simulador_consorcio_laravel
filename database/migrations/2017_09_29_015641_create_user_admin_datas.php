<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUserAdminDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         User::create([
            'name'=>env('ADMIN_DEFAULT_NAME','Admin'),
            'email'=>env('ADMIN_DEFAULT_EMAIL','admin@webmestre.com.br'),
            'password'=>bcrypt(env('ADMIN_DEFAULT_PASSWORD','secret'))

            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::where('email',env('ADMIN_DEFAULT_EMAIL','admin@webmestre.com.br'))->first();
        if($user instanceof User){
            $user->delete();
        }
    }
}
