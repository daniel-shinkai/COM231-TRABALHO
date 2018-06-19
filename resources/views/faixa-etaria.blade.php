@extends('layout.master')
@section('content')
<div>

    <div class="container">
  
  <h1>Relatório Por Faixa Etária</h1>
  
    
    <div class="styled-select slate">
      <select name="area" id="areaInput">
        <option value="Avaliada">Area de Reclamacao</option>
      </select>
    </div>
    
    <div class="styled-select slate">
      <select name="foiSelecionado" id="foiSelecionado">
        <option value="sim">Reclamacao Foi atendida?</option>
        <option value="s">Sim</option>
        <option value="n">Não</option>
      </select>
    </div>

     <div class="styled-select slate">
      <select name="situacao" id="situacao">
        <option value="">Situação da Reclamação</option>
        <option value="Finalizada avaliada">Finalizada Avaliada</option>
        <option value="Finalizada não avaliada ">Finalizada Não Avaliada</option>
      </select>
    </div>
   
    <div class="inline-block-cl">
      <span class="date-label">Data Final<span>
      <input type="date" value="1980-08-26" id="dateInput">
    </div>
    
    <br>

     <div class="btn-div">
        <button class="btn-primary" type="" id="getChartData">
          Gerar Relatório
        </button>
    </div>


      
 
  
<div id="chartDiv">
    <canvas id="myChart" width="400" height="400"></canvas>
</div>

<script type="text/javascript" src="{{ URL::asset('js/faixaEtaria.js') }}"></script>

@stop


