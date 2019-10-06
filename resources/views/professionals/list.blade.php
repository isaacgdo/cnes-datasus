@extends('layouts.template')

@section('p-styles')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style rel="stylesheet">
        #professionals-list_wrapper .col-sm-12 {
            overflow-y: auto;
            overflow-x: hidden;
            height: 500px;
        }
        #professionals-list_wrapper .col-sm-12 table th {
            position: sticky;
            top: 0;
            background-color: #fff;
        }
        #professionals-list_wrapper .col-sm-12 table {
            width: 100%;
        }
        .edit-professional,
        .remove-professional {
            cursor: pointer;
        }
        .edit-professional {
            float: left;
        }
        .remove-professional {
            float: right;
        }
        table.dataTable thead .sorting:after {
            content: none;
        }
    </style>
@endsection

@section('main-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Lista de Profissionais</h4>
                            <p class="category">HUOL - HOSPITAL UNIVERSITARIO ONOFRE LOPES</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button style="float:right;margin:10px" type="button" class="btn btn-danger delete-professionals">DELETAR TODOS</button>
                            </div>
                        </div>
                        <div>
                            <table id="professionals-list" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CNS</th>
                                        <th>Data de Atribuição</th>
                                        <th>CBO</th>
                                        <th>Carga Horária</th>
                                        <th>SUS</th>
                                        <th>Vinculação</th>
                                        <th>Tipo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="professionals-tbody">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CNS</th>
                                        <th>Data de Atribuição</th>
                                        <th>CBO</th>
                                        <th>Carga Horária</th>
                                        <th>SUS</th>
                                        <th>Vinculação</th>
                                        <th>Tipo</th>
                                        <th>Ações</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('p-scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ URL::asset('/requests/requests.js')}}"></script>
    <script src="{{ URL::asset('/requests/list.js')}}"></script>
@endsection