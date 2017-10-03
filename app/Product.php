<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [       
        'plan_id',
        'theme_id',
        'credito',
        'primeira_parcela_pf',
        'condicao_um_pf',
        'condicao_dois_pf',
        'primeira_parcela_pj',
        'condicao_um_pj',
        'condicao_dois_pj',
    ];


    public function plano(){
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function bem(){
        return $this->belongsTo(Theme::class, 'theme_id', 'id');
    }

    public function um_pf(){
        return $this->hasOne(Condition::class, 'id', 'condicao_um_pf');
    }
    public function dois_pf(){
        return $this->hasOne(Condition::class, 'id', 'condicao_dois_pf');
    }
    
    public function um_pj(){
        return $this->hasOne(Condition::class, 'id', 'condicao_um_pj');
    }

    public function dois_pj(){
        return $this->hasOne(Condition::class, 'id', 'condicao_dois_pj');
    }

}
