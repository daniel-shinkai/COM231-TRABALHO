<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumidor;
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

    public function saveReclamation(Request $request){
        $uf = $request->input('uf');
        $faixa = $request->input('faixa');
        $cidade = $request->input('cidade');
        $area = $request->input('area');
        $assunto = $request->input('assunto');
        $problema = $request->input('problema');
        $dataFin = $request->input('dataFin');
        $situacao = $request->input('situacao');
        $empresa = $request->input('empresa');

        $idConsumidor = DB::table('consumidor')->insertGetId(
            ['id_consumidor' => null, 'faixa_etaria' => $faixa, 'sexo' => 'M', 'uf' => $uf, 'regiao' => 'SE', 'cidade' => $cidade]
        );

        $nomeEmpresa = DB::table('empresa')->insertGetId(
            ['nome_comercial' => $empresa, 'segmento_mercado' => 'M']
        );

        DB::table('reclamacao')->insert(
            ['id_reclamacao' => null, 'fk_id_consumidor' => $idConsumidor, 'fk_nome_comercial' => $empresa, 'assunto' => $assunto, 
             'problema' => $problema, 'area' => $area, 'modo_compra' => 'Telefone', 'procurou_empresa' => 'S', 'respondida' => 'S',
             'situacao' => $situacao, 'tempo_resposta' => 10, 'data_finalizacao' => $dataFin, 'avaliacao' => 'Não avaliada', 'grupo_problema' => 'Contrato / Oferta',
             'nota_consumidor' => 0]
        );
        
        return response()->json([
            'id_consumidor' => $idConsumidor,
            'uf' => $uf,
            'faixa_etaria' => $faixa,
            'area' => $area,
            'problema' => $problema,
            'data_finalizacao' => $dataFin,
            'situacao' => $situacao,
            'nome_comercial' => $empresa
        ]);

    }

    public function getFaixaEtaria()
    {
        $faixa = Consumidor::distinct()->select('faixa_etaria')->groupBy('faixa_etaria')->get();
        
        return response()->json($faixa);
    }
}
