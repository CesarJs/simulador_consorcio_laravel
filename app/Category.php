<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 
    ];


    public function category_consorcios(){
        return $this->hasMany(Car::class, 'id_category', 'id');
    }
    public function bens(){
        return $this->hasMany(Theme::class, 'id_category', 'id');
    }
}
