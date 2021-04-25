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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/apexcharts.css">
    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area-->

    <!-- Sidenav Black Overlay-->

    <div class="page-content-wrapper" >

      <!-- Hero Slides-->
      <div class="owl-carousel-one owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-hero-slide " style="background-image: url('img/core-img/banner1.jpg');margin-top: -25px;">

        </div>
        <!-- Single Hero Slide-->
        <div class="single-hero-slide " style="background-image: url('img/core-img/banner2.jpg')">
          <div class="slide-content h-100 d-flex align-items-center text-center">
            <!--
            <div class="container">
              <h3 class="text-white" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms">Second News</h3>
              <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="500ms">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            -->
          </div>
        </div>
        <!-- Single Hero Slide
        <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/31.jpg')">
          <div class="slide-content h-100 d-flex align-items-center text-center">
            <div class="container">
              <h3 class="text-white" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms">Third News</h3>
              <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="500ms">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div>
        </div>
        -->
      </div>
      <!-- Welcome Toast-->
      <div class="affan-features-wrap py-3">
        <div class="container">
          <div class="row g-3">
            <div class="col-6">
              <a href="@auth {{ route('profile') }} @else {{ route('login') }} @endauth">
              <div class="card text-center shadow-sm wow fadeInUp" data-wow-duration="1s">
                <div class="card-body"><img src="img/demo-img/person-male.png" alt="">
                  <h6 class="mb-0">
                    @if (Route::has('login'))

                          @auth
                              <a href="{{ route('profile') }}" class="text-sm text-gray-700 underline">{{ __('Profile') }}</a>
                          @else
                              <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{ __('Log in') }}</a>
                              @if (Route::has('register'))
                                  <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a> -->
                              @endif
                          @endauth

                    @endif
                  </h6>
                </div>
              </div>
            </a>
            </div>
            <div class="col-6">
              <a href="{{ route('news') }}">
              <div class="card text-center shadow-sm wow fadeInUp" data-wow-duration="1s">
                <div class="card-body"><img src="img/demo-img/about-us.png" alt="">
                  <h6 class="mb-0">{{ __('News') }}</h6>
                </div>
              </div>
            </a>
            </div>
            <div class="col-6">
              <a href="{{ route('about_us') }}">
              <div class="card text-center shadow-sm wow fadeInUp" data-wow-duration="1s">
                <div class="card-body"><img src="img/demo-img/services.png" alt="">
                  <h6 class="mb-0">{{ __('About Us') }} </h6>
                </div>
              </div>
            </a>
            </div>
            <div class="col-6">
              <a href="{{ route('contact_us') }}">
              <div class="card text-center shadow-sm wow fadeInUp" data-wow-duration="1s">
                <div class="card-body"><img src="img/demo-img/location.png" alt="">
                  <h6 class="mb-0">{{ __('Addresses') }}</h6>
                </div>
              </div>
            </a>
            </div>
          </div>
        </div>
      </div>

      <div style="width:100%" >

        <div class="float-center" style="width: 250px; margin: 0 auto; ">
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
            <img class="img-fluid" src="img/core-img/logo.png" style="width: 200px; height: 200px; "alt="">

        </div>

    </div>

    </div>

    <!-- Footer Nav-->

    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/default/internet-status.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/default/dark-mode-switch.js"></script>
    <script src="js/ion.rangeSlider.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/default/active.js"></script>
    <script src="js/default/clipboard.js"></script>
    <!-- PWA-->
    <script src="js/pwa.js"></script>
  </body>
</html>
