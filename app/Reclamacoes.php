<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamacoes extends Model
{
    protected $table = 'reclamacao';
    public $timestamps = false;
    protected $primaryKey = 'id_reclamacao';

}
