<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumidor;
use App\Reclamacoes;
use App\Empresa;
use DB;
use DateTime;


class ChartController extends Controller
{

     const dadosPopulacao = [
        'norte' => [
            'Rondônia' => '1805788',
            'Acre' =>  '829619',
            'Amazonas' => '4063614',
            'Roraima' => '522636',
            'Pará' => '8366628',
            'Amapá' => '797722',
            'Tocantins' => '1550194'         
            
        ],
        'nordeste' => [
            'Maranhão' => 7000229,
            'Piauí'=>3219257 ,
            'Ceará'=>9020460 ,
            'Rio Grande do Norte'=>3507003,
            'Paraíba'=>4025558,
            'Pernambuco'=>9473266, 
            'Alagoas'=>3375823 ,
            'Sergipe'=>2288116,
            'Bahia'=>15344447
        ],
        'sudeste' => [
            'Minas Gerais'=> 21119536,
            'Espírito Santo' =>4016356,
            'Rio de Janeiro'=>16718956,
            'São Paulo' =>45094866,
        ],

        'sul' => [
            'Paraná' =>11320892,
            'Santa Catarina' =>7001161,
            'Rio Grande do Sul' =>11322895
        ],
        'centro-oeste' => [
            'Mato Grosso do Sul' =>  2713147,
            'Mato Grosso'=>3344544,
            'Goiás' =>6778772,
            'Distrito Federal' => 3039444
         
        ]
            
    ];

    public function getFaixaEtariaChartData(Request $request)
    {
        // $area = $request->input('area');
        // $foiAtendida = $request->input('foiAtendida');
        // $situacao = $request->input('situacao');
        // $dataFinal = $request->input('dataFinal');

        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA'
        // ]);

        //  $consu = Consumidor::where('id_consumidor', 1)->get();

         
        //var_dump($consu->empresa);

        // //var_dump($consu->reclamacoesEmEmpresa()->get()->first());

        // var_dump(Consumidor::with('empresa')->get()->first());

        $situacao = $request->input('situacao');
        $area = $request->input('area');
        $foiAtendida = $request->input('foiAtendida');
        $dataFinal = $request->input('dataFinal');
        

        $data = DB::table('consumidor')
            ->join('reclamacao' , 'id_consumidor' , '=', 'fk_id_consumidor')
            ->select('faixa_etaria', DB::raw('count(*) as totalReclamacao'))
            ->where('reclamacao.area', '=', $area)
            ->where('reclamacao.situacao', '=', $situacao)
            ->where('reclamacao.respondida', '=', $foiAtendida)
            ->where('data_finalizacao', '<=', $dataFinal)
            ->groupBy('consumidor.faixa_etaria')
            ->orderBy('totalReclamacao')
            ->get();
        
        return response()->json($data);

    }


    public function getDistinctState()
    {
        $uf = Consumidor::distinct()->select('uf')->groupBy('uf')->get();
        
        return response()->json($uf);
    }

    public function getDistinctRegion()
    {
        $regioes = Consumidor::distinct()->select('regiao')->groupBy('regiao')->get();
        
        return response()->json($regioes);
    }

    public function getDistinctArea()
    {
        $area = Reclamacoes::distinct()->select('area')->groupBy('area')->get();
        
        return response()->json($area);
    }

    public function getDistinctAreaAndCount(){
        $data = DB::table('reclamacao')
            ->select('area', DB::raw('count(*) as totalReclamacao'))
            ->groupBy('area')
            ->orderBy('totalReclamacao', 'desc')
            ->limit(7)
            ->get();

        return response()->json($data);

    }

    public function getProblemaByArea(Request $request){
        $area = $request->input('area');
        $data = DB::table('reclamacao')
        ->select('problema', DB::raw('count(*) as quantidadeReclamacao'))
        ->where('area' , $area)
        ->groupBy('problema')
        ->orderBy('quantidadeReclamacao', 'desc')
        ->limit(5)
        ->get();

        return response()->json($data);

    }

    public function getProblemaByAreaAndSegmento(Request $request)
    {
        $area = $request->input('area');
        $segmento = $request->input('segmento');

        $data = DB::table('reclamacao')
        ->join('empresa' , 'reclamacao.fk_nome_comercial' , '=', 'nome_comercial')
        ->select('reclamacao.problema', DB::raw('count(*) as quantidadeReclamacao'))
        ->where('reclamacao.area', $area)
        ->where('empresa.segmento_mercado', $segmento)
        ->groupBy('reclamacao.problema')
        ->orderBy('quantidadeReclamacao', 'desc')
        ->limit(5)
        ->get();

        return response()->json($data);
    }

    public function getProblemaByAreaAndSituation(Request $request){
        $situacao = $request->input('situacao');
        $area = $request->input('area');
        $data = DB::table('reclamacao')
        ->select('problema', DB::raw('count(*) as quantidadeReclamacao'))
        ->where('area' , $area)
        ->where('situacao', $situacao)
        ->groupBy('problema')
        ->orderBy('quantidadeReclamacao', 'desc')
        ->limit(5)
        ->get();

        return response()->json($data);

    }
    

    public function getReclamacaoPorRegiaoEProblema(Request $request){
        $problema = $request->input('problema');
        $finalizada = $request->input('finalizada');
        $regiao = $request->input('regiao');
    
        $data = DB::table('consumidor')
        ->join('reclamacao' , 'id_consumidor' , '=', 'fk_id_consumidor')
        ->select('consumidor.uf', DB::raw('count(*) as quantidadeReclamacao'))
        ->where('consumidor.regiao' , $regiao)
        ->where('reclamacao.problema', 'like',  $problema . '%')
        ->groupBy('consumidor.uf')
        ->orderBy('quantidadeReclamacao', 'desc')
        ->get();


        return response()->json($data);

    }

    public function getDistinctSegment()
    {
        $segmento = Empresa::distinct()->select('segmento_mercado')->groupBy('segmento_mercado')->get();
        
        return response()->json($segmento);
    }

    public function getAreaBySegmento(Request $request)
    {
        $segmento = $request->input('segmento');
        $situacao = $request->input('situacao');


        $data = DB::table('reclamacao')
        ->join('empresa' , 'reclamacao.fk_nome_comercial' , '=', 'nome_comercial')
        ->select('area', DB::raw('count(*) as quantidadeReclamacao'))
        ->where('empresa.segmento_mercado', 'like', $segmento)
        ->where('reclamacao.situacao' , $situacao)
        ->groupBy('area')
        ->orderBy('quantidadeReclamacao', 'desc')
        ->limit(5)
        ->get();

    return response()->json($data);

    }

    public function getReclamacaoPorRegiao(Request $request)
    {
        $segmento = $request->input('segmento');
        $dataFinal = $request->input('dataFinal');
        $regiao = $request->input('regiao');

    
        $data = DB::table('consumidor')
        ->join('reclamacao' , 'id_consumidor' , '=', 'fk_id_consumidor')
        ->join('empresa' , 'reclamacao.fk_nome_comercial' , '=', 'nome_comercial')
        ->select('consumidor.uf', DB::raw('count(*) as quantidadeReclamacao'))
        ->where('consumidor.regiao' , $regiao)
        ->where('reclamacao.data_finalizacao', '<',  $dataFinal)
        ->where('empresa.segmento_mercado', $segmento)
        ->groupBy('consumidor.uf')
        ->orderBy('quantidadeReclamacao', 'desc')
        ->get();

        return response()->json($data);

    }
}
