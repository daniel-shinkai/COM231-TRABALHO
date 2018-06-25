@extends('layout.master')
@section('content')
<div>

    <div class="container">
  
    <h1>Relatório Adhoc</h1>
    
    
    <div class="styled-select slate">
        <select name="segmento" id="segmento">
            <option value="sim">Selecione Segmento</option>
        </select>
    </div>
    
    

    <div class="styled-select slate">
      <select name="area" id="area">
        <option value="">Area de Reclamacao</option>
      </select>
    </div>

    <div class="styled-select slate">
      <select name="situacao" id="situacao">
        <option value="Finalizada avaliada">Finalizada Avaliada</option>
        <option value="Finalizada não avaliada">Finalizada Não Avaliada</option>
      </select>
    </div>


    <div class="inline-block-cl">
        <span class="date-label">Data Final<span>
        <input type="date" value="1980-08-26" id="dateInput">
    </div>

    <div id="chartDiv">
        <canvas id="relatorioChart" width="400" height="400"></canvas>
    </div>

    <button class="btn-primary pdf-button" id="pdfBar">Gerar PDF </button>



  <script type="text/javascript" src="{{ URL::asset('js/adhoc.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('css/adhoc.css') }}" />

@stop