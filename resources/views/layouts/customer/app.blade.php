<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Affan - PWA Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Zebra - Customer App</title>

    <!-- Favicon-->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/icon-180x180.png') }}">

    <!-- Include for Normal Users -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100;200;300;400;500;600;700;800;900&display=swap" >
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/apexcharts.css')}}">

    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
   
</head>
<body>
    <div class="float-right position-fixed" style="z-index: 9999">
        <button class="btn btn-secondary disabled" type="button" >
            {{ Config::get('languages')[App::getLocale()] }}
        </button>
        @foreach (Config::get('languages') as $lang => $language)
           @if ($lang != App::getLocale())
           <button class="btn btn-secondary" type="button" >
               <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
           </button>
           @endif
        @endforeach    
    </div>      
    @yield('content')
 <!-- Just include for Normal Users --> 
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/default/internet-status.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/default/dark-mode-switch.js')}}"></script>
    <script src="{{asset('js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/default/active.js')}}"></script>
    <script src="{{asset('js/default/clipboard.js')}}"></script>
 
    <!-- PWA-->   
    <script src="{{asset('js/pwa.js')}}"></script>
   
</body>
</html>