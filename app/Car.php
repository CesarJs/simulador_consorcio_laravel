<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'codigo',
        'descricao_do_bem',
        'credito',
        'category_id',
        'provider_id',
        'primeira_parcela_pf',
        'condicao_um_pf',
        'condicao_dois_pf',
        'condicao_tres_pf',
        'primeira_parcela_pj',
        'condicao_um_pj',
        'condicao_dois_pj',
        'condicao_tres_pj'
    ];
    protected $table = 'cars';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
    public function um_pf(){
        return $this->hasOne(Condition::class, 'id', 'condicao_um_pf');
    }
    public function dois_pf(){
        return $this->hasOne(Condition::class, 'id', 'condicao_dois_pf');
    }
    public function tres_pf(){
        return $this->hasOne(Condition::class, 'id', 'condicao_tres_pf');
    }

    public function um_pj(){
        return $this->hasOne(Condition::class, 'id', 'condicao_um_pj');
    }

    public function dois_pj(){
        return $this->hasOne(Condition::class, 'id', 'condicao_dois_pj');
    }

    public function tres_pj(){
        return $this->hasOne(Condition::class, 'id', 'condicao_tres_pj');
    }
}
