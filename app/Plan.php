<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $fillable = [
        'name', 
    ];

    public function consorcios(){
        return $this->hasMany(Product::class, 'id_plan', 'id');
    }
}
