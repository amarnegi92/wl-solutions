@extends('layouts.customer.app')
@section('content')<!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container">
        <!-- Header Content-->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
          <!-- Back Button-->
          <div class="back-button"><a href="{{ route('baseurl') }}"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
</svg></a></div>
          <!-- Page Title-->

          <div class="page-heading">
            <h6 class="mb-0">About Us</h6>
          </div>
          <!-- Navbar Toggler-->
        </div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="sidenav-wrapper" id="sidenavWrapper">
      <!-- Go Back Button-->
      <div class="go-back-btn" id="goBack">
        <svg class="bi bi-x" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"></path>
          <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"></path>
        </svg>
      </div>
    </div>
    <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card image-gallery-card">
          <div class="card-body"><img class="mb-3 rounded" src="img/bg-img/13.jpg" alt="">
            <h5>About Us</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
            <!-- Gallery Wrapper-->

            <h5>Services</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
            <!-- Single Skill Progress Bar-->
            <div class="mb-4 gallery-wrapper row g-3">
              <!-- Single Image Gallery-->
              <div class="col-6 single-image-gallery marketing">
                <!-- Gallery Image--><a class="gallery-img" href="img/bg-img/4.jpg" data-effect="mfp-zoom-in"><img src="img/bg-img/4.jpg" alt=""></a>
                <!-- Fav Icon--><a class="fav-icon shadow" href="#"><svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg></a>
              </div>
              <!-- Single Image Gallery-->
              <div class="col-6 single-image-gallery top">
                <!-- Gallery Image--><a class="gallery-img" href="img/bg-img/5.jpg" data-effect="mfp-zoom-in"><img src="img/bg-img/5.jpg" alt=""></a>
                <!-- Fav Icon--><a class="fav-icon shadow" href="#"><svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg></a>
              </div>
              <!-- Single Image Gallery-->
              <div class="col-6 single-image-gallery design">
                <!-- Gallery Image--><a class="gallery-img" href="img/bg-img/6.jpg" data-effect="mfp-zoom-in"><img src="img/bg-img/6.jpg" alt=""></a>
                <!-- Fav Icon--><a class="fav-icon shadow" href="#"><svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg></a>
              </div>
              <!-- Single Image Gallery-->
              <div class="col-6 single-image-gallery marketing">
                <!-- Gallery Image--><a class="gallery-img" href="img/bg-img/7.jpg" data-effect="mfp-zoom-in"><img src="img/bg-img/7.jpg" alt=""></a>
                <!-- Fav Icon--><a class="fav-icon shadow" href="#"><svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg></a>
              </div>
            </div>
            <!-- Single Skill Progress Bar-->

            <!-- Single Skill Progress Bar-->



          </div>
        </div>
      </div>
    </div>
@endsection