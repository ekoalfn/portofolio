@extends('layouts.guest')

@section('content')
    <div id="page-container" class="main-content-boxed">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('assets/media/photos/photo34@2x.jpg');">
                <div class="row mx-0 bg-black-50">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-4">
                            <p class="fs-3 fw-semibold text-white">
                                Get Inspired and Create.
                            </p>
                            <p class="text-white-75 fw-medium">
                                Copyright &copy; <span data-toggle="year-copy"></span>
                            </p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-4 py-2 mb-4">
                                <a class="link-fx fw-bold" href="index.html">
                                    <img class="img-avatar img-avatar32" src="{{asset('favicon/'.config('mail.from.app_favicon'))}}" alt="">
                                    <span class="fs-4 text-black">Black</span><span class="fs-4 text-black">box</span>
                                </a>
                                <h1 class="h3 fw-bold mt-4 mb-2">Create New Account</h1>
                                <h2 class="h5 fw-medium text-muted mb-0">Please add your details</h2>
                            </div>
                            <!-- END Header -->
    
                            <!-- Sign In Form -->
                            <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @elseif (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{session()->get('error')}}
                                </div>
                            @endif
                            <form class="js-validation-signin px-4" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                                    <label class="form-label" for="name">Name</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                                    <label class="form-label" for="email">Email</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="****" required>
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="****" required>
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="login-remember-me" name="login-remember-me" checked required>
                                        <label class="form-check-label" for="login-remember-me">I agree to Terms</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                    Create Account
                                    </button>
                                    <div class="mt-4">
                                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{route('login')}}">
                                            Login
                                        </a>
                                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('password.request') }}">
                                            Forgot Password
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
@endsection