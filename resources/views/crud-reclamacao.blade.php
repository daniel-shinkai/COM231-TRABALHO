@extends('layout.master')
@section('content')
<div>

    <div class="container">
  
        <h1>Crud de Reclamação</h1>

        <button class="btn-success" data-toggle="modal" data-target="#modalCadastrar" id="openModal">
            Adicionar Nova Reclamação
        </button> 

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
                    <th></th>

                </tr>
            </thead>
            <tbody id="tableBody">
               
            </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Reclamação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <select class="form-control"  name="uf" id="ufInput">
                                    <option value="">Selecione Estado</option>
                                </select>
                            </div>

                             <div class="form-group col-md-6">
                                <select class="form-control"  name="faixa" id="faixa">
                                    <option value="">Faixa Etária</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="area" placeholder="Area">
                            </div>

                           <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="assunto" placeholder="Assunto">
                            </div>

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="problema" placeholder="Problema">
                            </div>

                            <div class="form-group col-md-6">
                                <p >Data Finalização:</p>
                                <input type="date" class="form-control" id="dataFin" placeholder="Data Finalização">
                            </div>

                            <div class="form-group col-md-6">
                                <p >Situação:</p>

                                <select class="form-control" name="situacao" id="situacao">
                                    <option value="Finalizada avaliada">Finalizada Avaliada</option>
                                    <option value="Finalizada não avaliada">Finalizada Não Avaliada</option>
                                </select>
                            </div>

                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="empresa" placeholder="Empresa">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" id="saveReclamation">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>    

<script type="text/javascript" src="{{ URL::asset('js/crud-relatorio.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/crud-relatorio.css') }}" />


@stop


