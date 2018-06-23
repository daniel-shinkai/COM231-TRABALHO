@extends('layout.master')
@section('content')

  <div class="container">

    <h1>Dashboard</h1>

    <div class="row">

      <div class="col-md-12">
        <div class="chartDiv" >
          <canvas id="chart-area" width="800" height="500" ></canvas>
        </div>
        <button class="btn-primary pdf-button" id="pdfDoghnut">Gerar PDF </button>

      </div>
     
    </div>

    <div class="row d-none" id="barChartDiv">

      <div class="col-md-11">

        <div class="chartDiv" >
          <canvas id="bar-chart-area" width="800" height="600"></canvas>
        </div>

         <div class="styled-select slate">
          <select name="situacao" id="situacao">
            <option value="Finalizada avaliada">Finalizada Avaliada</option>
            <option value="Finalizada não avaliada">Finalizada Não Avaliada</option>
          </select>
        </div>

        <div class="styled-select slate">
          <select name="regiao" id="regiao">
            <option value="">Selecione Região</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row d-none" id="lineChartDiv">
      <div class="col-md-12">
        <div class="chartDiv">
          <canvas id="line-chart-area" width="800" height="400" ></canvas>
        </div>
      </div>
    </div>
    
      
  </div>
<script type="text/javascript" src="{{ URL::asset('js/dashboard.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}" />

@stop


