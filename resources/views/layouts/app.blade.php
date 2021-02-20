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
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries-->

    <!-- Include for Normal Users -->
    <!--    
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/apexcharts.css')}}">
    -->
    <!-- Core Stylesheet-->
    <!-- 
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    -->
    <!-- Just include for Admin -->
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/master.css')}}">

    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
</head>

<body>
    <!-- Preloader-->
    <!--
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
        <div class="spinner-grow text-primary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Internet Connection Status-->
    <!--
        <div class="internet-connection-status" id="internetStatus"></div>
    <div id="app">
        @yield('content')
    </div>
    <!-- All JavaScript Files-->

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="/img/admin/logo.png" alt="bootraper logo" class="app-logo" style="height:40px">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="/admin/dashboard"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="/admin/customers"><i class="fas fa-user-friends"></i> Customers</a>
                </li>
                <li>
                    <a href="/admin/arrived"><i class="fas fa-boxes"></i> Arrived</a>
                </li>
                <li>
                    <a href="/admin/sea-transport"><i class="fas fa-ship"></i> Sea Transport</a>
                </li>
                <li>
                    <a href="/admin/air-transport"><i class="fas fa-plane-departure"></i> Air Transport</a>
                </li>
                <li>
                    <a href="/admin/news"><i class="fas fa-newspaper"></i> News</a>
                </li>

            </ul>
        </nav>
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary default-secondary-menu"><i class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span>John Doe</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    <!-- Just include for Normal Users -->
    <!-- 
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
    <!-- 
    <script src="{{asset('js/pwa.js')}}"></script>
    -->
    <!-- Just include for Admin -->
    <script src="{{asset('js/admin/jquery3/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/bootstrap4/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/admin/fontawesome5/js/solid.min.js')}}"></script>
    <script src="{{asset('js/admin/fontawesome5/js/fontawesome.min.js')}}"></script>
    <script src="{{asset('js/admin/script.js')}}"></script>
</body>

</html>