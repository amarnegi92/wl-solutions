<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Affan - PWA Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
     
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/icon-180x180.png') }}">

    <!-- Just include for Admin -->
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/auth.css')}}">


    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">

</head>
<body>
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    @yield('content')
    <script src="{{asset('js/admin/jquery3/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/bootstrap4/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/admin/fontawesome5/js/solid.min.js')}}"></script>
    <script src="{{asset('js/admin/fontawesome5/js/fontawesome.min.js')}}"></script>
</body>
</html>
