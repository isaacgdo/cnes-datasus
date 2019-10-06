@extends('layouts.template')

@section('p-styles')
@endsection

@section('main-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Cadastrar Profissional</h4>
                        </div>
                        <div class="content">
                            <form id="addoreditProfessionalForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" required class="form-control" name="name" placeholder="Digite o nome" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CNS</label>
                                            <input type="number" required class="form-control" name="cns" placeholder="Digite o CNS" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Data de Atribuição</label>
                                            <input id="assignment_dateSelect" type="date" required class="form-control" name="assignment_date" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Carga-horária</label>
                                            <input type="text" required class="form-control" name="workload" placeholder="Informe a carga-horária" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="susControlSelect">Sus</label>
                                                <select required class="form-control" name="sus" id="susControlSelect">
                                                    <option value="" selected disabled="true">Selecione...</option>
                                                    <option value="SIM">SIM</option>
                                                    <option value="NÃO">NÃO</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cboControlSelect">CBO</label>
                                            <select required class="form-control" name="cbo_id" id="cboControlSelect">
                                                <option value="" selected disabled>Selecione...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bondControlSelect">Vinculação</label>
                                            <select required class="form-control" name="bond_id" id="bondControlSelect">
                                                <option value="" selected disabled>Selecione...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="typeControlSelect">Tipo</label>
                                            <select required class="form-control" name="type_id" id="typeControlSelect">
                                                <option value="" selected disabled>Selecione...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Cadastrar</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('p-scripts')
    <script src="{{ URL::asset('/requests/requests.js')}}"></script>
    <script src="{{ URL::asset('/requests/form.js')}}"></script>
@endsection
