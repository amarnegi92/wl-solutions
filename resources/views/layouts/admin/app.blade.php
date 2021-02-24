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
        <link rel="icon" href="img/core-img/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/icons/icon-167x167.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/icon-180x180.png') }}">

        <!-- Just include for Admin -->
        <link rel="stylesheet" href="{{ asset('css/admin/bootstrap4/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.css">
        <link rel="stylesheet" href="{{ asset('css/admin/master.css') }}">
    </head>
    <body>
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="{{ asset('img/admin/logo.png') }}" alt="bootraper logo" class="app-logo" style="height:40px">
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
                                    <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span>{{ Auth::User()->name }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                        <ul class="nav-list">
                                            <div class="dropdown-divider"></div>
                                            <li><a href="{{ route('admin/logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
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
        <script src="{{ asset('js/admin/jquery3/jquery.min.js') }}"></script>
        <script src="{{ asset('js/admin/bootstrap4/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.js"></script>
        <script src="{{ asset('js/admin/fontawesome5/js/solid.min.js') }}"></script>
        <script src="{{ asset('js/admin/fontawesome5/js/fontawesome.min.js') }}"></script>
        <script src="{{ asset('js/admin/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/admin/initiate-datatables.js') }}"></script>
        <script src="{{ asset('js/admin/script.js') }}"></script>
    </body>
</html>