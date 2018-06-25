@extends('layout.master')
@section('content')
<div>

    <div class="container">
  
  <h1>Relatório de Reclamação Por Região</h1>
  
  
   
    <div class="styled-select slate">
      <select name="segmento" id="segmento">
        <option value="sim">Selecione Segmento</option>
      </select>
    </div>
    
    

    <div class="styled-select slate">
        <select name="regiao" id="regiao">
            <option value="">Selecione Região</option>

        </select>
    </div>


      <div class="inline-block-cl">
      <span class="date-label">Data Final<span>
      <input type="date" value="1980-08-26" id="dateInput">
    </div>


   

   <div class="field">
        <button class="btn-primary" id="getRegiaoChartData">Gerar Relatório</button>
    </div>

      
 
  
<div id="chartDiv">
    <canvas id="myChart" width="400" height="400"></canvas>
</div>

    <button class="btn-primary pdf-button" id="pdfBar">Gerar PDF </button>


  <script type="text/javascript" src="{{ URL::asset('js/relatorioRegiao.js') }}"></script>

@stop