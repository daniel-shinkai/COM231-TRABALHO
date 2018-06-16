<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getFaixaEtariaChartData(Request $request)
    {
        // $area = $request->input('area');
        // $foiAtendida = $request->input('foiAtendida');
        // $situacao = $request->input('situacao');
        // $dataFinal = $request->input('dataFinal');

        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    }
}
