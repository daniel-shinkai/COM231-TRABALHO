<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Consumidor extends Model
{
    protected $table = 'consumidor';
    protected $primaryKey = 'id_consumidor';
    public $timestamps = false;

    public function empresa()
    {
        return $this->belongsToMany('App\Empresa', 'reclamacao', 'fk_id_consumidor', 'fk_nome_comercial')
            ->withPivot('area', 'assunto')

        ;   
    }

    public function getFaixaEtariaData()
    {
        return $this->belongsToMany('App\Empresa', 'reclamacao', 'fk_id_consumidor', 'fk_nome_comercial')
            ->withPivot('area', 'assunto')
            ->wherePivot('area' , 'Telecomunicações')
        ;  
    }
}
