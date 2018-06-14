<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{

    protected $table = 'usuario';
    public $timestamps = false;

    public function checkLogin($email, $password)
    {
            
    }
}
