@extends('layout.master')
@section('content')
<div>

    <div class="container">
  
  <h2>Google Material Design in CSS3<small>Inputs</small></h2>
  
  <form method="post">
    
    <div class="group">      
      <input type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Name</label>
    </div>
      
    <div class="group">      
      <input type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>

    <div class="styled-select slate">
      <select name="uf" id="ufInput">
        <option value="">Selecione Estado</option>

      </select>
    </div>

    <div class="styled-select slate">
      <select name="foiSelecionado" id="foiSelecionado">
        <option value="sim">Sim</option>
        <option value="nao">Não</option>
      </select>
    </div>
    
    <div class="field">
        <button type="submit">Send</button>
    </div>

    <div class="styled-select slate">
      <select name="situacao" id="situacao">
        <option value="Avaliada">Finalizada Avaliada</option>
        <option value="naoAvaliada">Finalizada Não Avaliada</option>
      </select>
    </div>

     <div class="styled-select slate">
      <select name="area" id="areaInput">
        <option value="Avaliada">Selecione Área</option>
      </select>
    </div>

    <div class="styled-select slate">
      <select>
        <option>Here is the first option</option>
        <option>The second option</option>
        <option>The third option</option>
      </select>
    </div>

  </form>
      
 
  
<div id="chartDiv">
    <canvas id="myChart" width="400" height="400"></canvas>

</div>
@stop


