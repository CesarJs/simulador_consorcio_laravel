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
}
