@extends('layouts.guest')

@section('content')
    <div id="page-container" class="main-content-boxed">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url({{asset('assets/media/photos/photo34@2x.jpg')}});">
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
                                <h1 class="h3 fw-bold mt-4 mb-2">Don’t worry, we’ve got your back</h1>
                                <h2 class="h5 fw-medium text-muted mb-0">Please enter your email</h2>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            @if (session('status'))
                                <div class="text-success mb-3 mx-4" role="alert">
                                    <strong>Password reset link has been sent!</strong>
                                </div>
                            @endif
                            <form class="js-validation-signin px-4" action="{{ route('password.email') }}" method="POST">
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
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                    Reset Password
                                    </button>
                                    <div class="mt-4">
                                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{route('login')}}">
                                            Login
                                        </a>
                                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('register') }}">
                                            Register
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
    {{-- <section class="row container-fluid align-items-center">
        <div class="d-none d-md-block col-sm-6 col-md-6 col-lg-6" style="height: 100vh; background-color: #FF4E3B;">
            <img class="w-100 my-5" src={{asset('assets/images/ill_login_new.png')}} alt="">
        </div>
        <div class="d-block col-12 col-sm-6 col-md-6 col-lg-6">
            <section class="card p-4 mx-auto" style="border: none; width: 24rem;">
                <section>
                    <a href="{{route('index')}}">
                        <img class="w-75" style="margin-bottom: 30px;" src="{{asset('logo/'.config('mail.from.app_logo'))}}" alt="">
                    </a>
                    <div class="d-flex flex-column">
                        <h5 style="font-weight: 600; font-size: 22px;">Lupa Password</h5>
                        <p style="font-weight: 400; font-size: 16px; color:#888888;">Atur ulang kata sandi kamu disini!</p>
                    </div>
                </section>
                @if (session('status'))
                    <div class="text-success mb-3" role="alert">
                        <strong>Tautan reset kata sandi sudah dikirim!</strong>
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <section class="d-grid gap-3" style="margin-bottom: 30px;">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label" style="font-weight: 500; font-size:16px;">Email</label>
                            <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </section>
                    <button type="submit" class="btn w-100 rounded-pill text-white border-0 h-50" style="background-color: #FF4E3B;">Atur Ulang Kata Sandi</button>
                </form>
            </section>
            <div class="d-flex justify-content-center">
                <p class="text-secondary">Kembali ke halaman &nbsp;</p>
                <a href="{{ route('login') }}" style="color: #FF4E3B;">
                    {{ __(' Login') }}
                </a>
            </div>
        </div>
    </section> --}}
@endsection