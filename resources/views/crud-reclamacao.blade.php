@extends('layout.master')
@section('content')
<div>

    <div class="container">
  
        <h1>Relatório Por Faixa Etária</h1>

        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                    <th>Id Usuário</th>
                    <th>UF</th>
                    <th>Faixa Etária</th>
                    <th>Area</th>
                    <th>Problema</th>
                    <th>Data Finalização</th>
                    <th>Situação</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody id="tableBody">
               
            </tbody>
            </table>
        </div>


    </div>
</div>    

<script type="text/javascript" src="{{ URL::asset('js/crud-relatorio.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/crud-relatorio.css') }}" />


@stop


