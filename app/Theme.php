<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'codigo',
        'description',
        'credito',
        'category_id',
        'provider_id',
        
    ];

    public function consorcios(){
        return $this->hasMany(Product::class, 'id_theme', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
}
