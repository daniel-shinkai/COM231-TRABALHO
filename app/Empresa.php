<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $primaryKey = 'nome_comercial';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    public function usuario()
    {
        return $this->belongsToMany('App\Usuario', 'reclamacao', 'fk_nome_comercial', 'fk_id_consumidor');
    }
}
