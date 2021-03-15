@extends('layouts.admin.login')
@section('content')
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                    @if (session()->has('error.msg'))
                        <span class="text-center alert alert-danger">{{ session()->get('error.msg')  }}</span>
                    @endif
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="{{ asset('img/admin/logo.png') }}" alt="bootstraper logo" style="height:80px;">
                    </div>
                    <h6 class="mb-4 text-muted">Sign in to your account</h6>
                   
                    <form action="{{ route('admin/post/login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input maxlength="10" type="number" name="mobile" class="form-control" placeholder="Mobile number" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection