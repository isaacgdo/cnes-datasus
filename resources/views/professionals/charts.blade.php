@extends('layouts.template')

@section('main-content')
    <div class="content">
        <div class="container-fluid">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Indicadores</h4>
                            <p class="category">HUOL - HOSPITAL UNIVERSITARIO ONOFRE LOPES</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="width:500px; height:500px;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="width:500px; height:500px;">
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection

@section('p-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>>
    <script src="{{ URL::asset('/requests/requests.js')}}"></script>
    <script src="{{ URL::asset('/requests/charts.js')}}"></script>
@endsection