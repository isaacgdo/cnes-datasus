<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Seleção LAIS') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/iconic/css/material-design-iconic-font.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->

        @yield('personal-styles')

    </head>
    <body>
        <div>
            @yield('content')
        </div>

        <!--===============================================================================================-->
        <script src="{{ URL::asset('/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{ URL::asset('/vendor/animsition/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{ URL::asset('/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{ URL::asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <!--Manage Tokens and alerts-->
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        <script src="{{ URL::asset('/js/bootbox/bootbox.all.min.js')}}"></script>
        <script src="{{ URL::asset('/js/bootbox/bootbox.min.js')}}"></script>
        <script src="{{ URL::asset('/js/bootbox/bootbox.locales.min.js')}}"></script>

        @yield('personal-scripts')

    </body>
</html>