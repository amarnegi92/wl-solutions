@extends('layouts.customer.app')
@section('content')
  <!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Back Button-->
    <div class="login-back-button"><a href="{{ route('baseurl') }}"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg></a>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            @if($errors->any())
                <span class="text-center alert alert-danger">{{$errors->first()}}</span>
            @endif
            <div class="text-center px-4"><img class="login-intro-img" src="img/core-img/logo.png" alt=""></div>
            <!-- Register Form-->
            <div class="register-form mt-4 px-4">
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group text-start mb-3">
                  <input class="form-control" name="mobile" type="text" placeholder="Mobile number">
                </div>
                <div class="form-group text-start mb-3">
                  <input class="form-control" name="password" type="password" placeholder="Enter Password">
                </div>
                <button class="btn btn-primary w-100" type="submit">Sign In</button>
              </form>
            </div>
            <!-- Login Meta-->

          </div>
        </div>
      </div>
    </div>
    @endsection