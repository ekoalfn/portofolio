@extends('layouts.guest')

@section('content')
<div id="page-container" class="main-content-boxed">
    <main id="main-container">
        <div class="bg-image" style="background-image: url('assets/media/photos/photo34@2x.jpg');">
            <div class="row mx-0 bg-black-50">
                <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-4">
                        <p class="fs-3 fw-semibold text-black">Get Inspired and Create.</p>
                        <p class="text-black fw-medium">Copyright &copy; <span data-toggle="year-copy"></span></p>
                    </div>
                </div>
                <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                    <div class="content content-full">
                        <div class="px-4 py-2 mb-4">
                            <a class="link-fx fw-bold" href="index.html">
                                <img class="img-avatar img-avatar32" src="{{asset('web/img/'.config('mail.from.app_favicon'))}}" alt="">
                                <span class="fs-4 text-black">Yan </span><span class="fs-4 text-black">Afriyoko</span>
                            </a>
                            <h1 class="h3 fw-bold mt-4 mb-2">Welcome to Your Dashboard</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">Please sign in</h2>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @elseif (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <form class="js-validation-signin px-4" action="{{ route('login') }}" method="POST">
                            @csrf
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
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="login-remember-me" name="login-remember-me" checked>
                                    <label class="form-check-label" for="login-remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">Sign In</button>
                                <div class="mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{route('register')}}">Create Account</a>
                                    @endif
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('password.request') }}">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection