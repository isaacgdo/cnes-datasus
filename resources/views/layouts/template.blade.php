<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Seleção LAIS') }}</title>

        <!-- Bootstrap core CSS     -->
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="{{ URL::asset('assets/css/animate.min.css')}}" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="{{ URL::asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>

        <!--  Extra CSS -->
        <link href="{{ URL::asset('assets/css/demo.css')}}" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="{{ URL::asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

        <!-- Personal Styles -->
        @yield('p-styles')
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="white">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a class="simple-text">
                            CNES DATASUS
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="{{ route('professionals.list') }}">
                                <i class="pe-7s-note2"></i>
                                <p>Lista de Profissionais</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('professionals.add') }}">
                                <i class="pe-7s-user"></i>
                                <p>Cadastrar</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('charts') }}">
                                <i class="pe-7s-graph"></i>
                                <p>Indicadores</p>
                            </a>
                        </li>
                        <li class="active-pro" style="cursor: pointer;">
                            <a>
                                <i class="pe-7s-download"></i>
                                <p>Carregar dados</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <p class="navbar-brand">Profissionais CNES</p>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a class="dropdown-toggle">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </li>
                            </ul>

                            <ul id="user" class="nav navbar-nav navbar-right">
                                <li>
                                    <a id="profilePic" style="padding:0px; margin: 14px 0px;" >
                                        <img class="avatar-style" src="https://i.ytimg.com/vi/F0Eqrg1qL3g/hqdefault.jpg" alt="perfil do usuário"/>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p>
                                            <b class="caret"></b>
                                        </p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a id="logout" href="#">Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('main-content')
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right">
                            Template por &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>
                        </p>
                    </div>
                </footer>

            </div>
        </div>
    </body>
    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ URL::asset('assets/js/bootstrap-notify.js')}}"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{ URL::asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

    <!-- Extra CSS -->
    <script src="{{ URL::asset('assets/js/demo.js')}}"></script>

    <!--Manage Tokens and alerts-->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ URL::asset('/js/bootbox/bootbox.all.min.js')}}"></script>
    <script src="{{ URL::asset('/js/bootbox/bootbox.min.js')}}"></script>
    <script src="{{ URL::asset('/js/bootbox/bootbox.locales.min.js')}}"></script>

    <!-- Personal scripts -->
    <!--===============================================================================================-->
    <script src="{{ URL::asset('/requests/requests.js')}}"></script>
    <script src="{{ URL::asset('/requests/template.js')}}"></script>

    @yield('p-scripts')
</html>
