@extends('layout.master')
@section('content')
<div>

    <div class="container">
  
  <h2>Google Material Design in CSS3<small>Inputs</small></h2>
  
  <form method="post">
  
    <div class="styled-select slate">
      <select name="uf" id="ufInput">
        <option value="">Selecione Estado</option>

      </select>
    </div>

    <div class="styled-select slate">
      <select name="regiao" id="regiao">
        <option value="">Selecione Região</option>

      </select>
    </div>



    <div class="styled-select slate">
      <select name="foiSelecionado" id="foiSelecionado">
        <option value="sim">Sim</option>
        <option value="nao">Não</option>
      </select>
    </div>
    
    

    <div class="styled-select slate">
      <select name="situacao" id="situacao">
        <option value="Avaliada">Finalizada Avaliada</option>
        <option value="naoAvaliada">Finalizada Não Avaliada</option>
      </select>
    </div>

    <div class="inline-block-cl">
      <span class="date-label">Data Final<span>
      <input type="date" value="1980-08-26" id="dateInput">
    </div>

    <div class="styled-select slate">
      <select name="area" id="areaInput">
        <option value="Avaliada">Area de Reclamacao</option>
      </select>
    </div>

   <div class="field">
        <button type="submit">Send</button>
    </div>

    <div class="styled-select slate">
        <select name="regiao" id="regiao">
          <option value="">Selecione Região</option>

        </select>
      </div>


  </form>
      
 
  
<div id="chartDiv">
    <canvas id="myChart" width="400" height="400"></canvas>

</div>
@stop