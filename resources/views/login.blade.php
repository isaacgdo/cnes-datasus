@extends('layouts.imports')

@section('personal-styles')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/login.css')}}">
    <!--===============================================================================================-->

    <style>
        .container-login100::before {
            background-image: url('https://images.pexels.com/photos/1282308/pexels-photo-1282308.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
            background-size: cover;
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 110%;
            z-index: -2;
            opacity: 0.6;
        }
    </style>
@endsection

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form id="loginForm" action="{{ route('api.login') }}" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        LOGIN DATASUS
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="O Email é obrigatório">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Digite o email">
                        <span class="focus-input100" data-symbol="&#x2709;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="A senha é obrigatória">
                        <span class="label-input100">Senha</span>
                        <input class="input100" type="password" name="password" placeholder="Digite a senha">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Esqueceu a senha?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Entrar
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            Não possui login? <a href="{{URL('/signup')}}"><u>Cadastre-se</u></a>. Ou entre usando
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="{{ route('login.provider', 'facebook') }}" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="{{ route('login.provider', 'google') }}" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
@endsection

@section('personal-scripts')
    <script src="{{ URL::asset('/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ URL::asset('/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('/js/login.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('/requests/requests.js')}}"></script>
    <script src="{{ URL::asset('/requests/login.js')}}"></script>
@endsection