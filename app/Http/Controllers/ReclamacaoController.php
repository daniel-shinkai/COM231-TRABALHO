<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReclamacaoController extends Controller
{
    public function getReclamations()
    {
        $data = DB::table('consumidor')
        ->join('reclamacao' , 'id_consumidor' , '=', 'fk_id_consumidor')
        ->join('empresa' , 'reclamacao.fk_nome_comercial' , '=', 'nome_comercial')
        ->select('consumidor.id_consumidor', 'consumidor.uf', 'consumidor.faixa_etaria', 'reclamacao.area',
            'reclamacao.problema', 'reclamacao.data_finalizacao', 'reclamacao.situacao',  'empresa.nome_comercial' )
        ->orderBy('reclamacao.id_reclamacao', 'desc')
        ->limit(10)
        ->get();

        return response()->json($data);
    }
}
