@extends('layout.master')
@section('content')
<div>

    <div class="container">

    <h1>Dashboard</h1>
  
    <div class="chartDiv" >
      <canvas id="chart-area" width="800" height="400" ></canvas>
    </div>

  <br><br>

    <div class="chartDiv" >
      <canvas id="bar-chart-area" width="800" height="400"></canvas>
    </div>

    <div id="lastChart">

      <div class="styled-select slate">
        <select name="situacao" id="situacao">
          <option value="Avaliada">Finalizada Avaliada</option>
          <option value="naoAvaliada">Finalizada Não Avaliada</option>
        </select>
      </div>

      
      <div class="styled-select slate">
        <select name="regiao" id="regiao">
          <option value="">Selecione Região</option>

        </select>
      </div>

    </div>
      
</div>
  </div>
  <script type="text/javascript" src="{{ URL::asset('js/dashboard.js') }}"></script>

@stop


