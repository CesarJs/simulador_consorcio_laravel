<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $fillable = [
        'name', 
        'email'
    ];


    public function providers_consorcios(){
        return $this->hasMany(Car::class, 'id_providers', 'id');
    }

    public function bens(){
        return $this->hasMany(Theme::class, 'id_providers', 'id');
    }
}
