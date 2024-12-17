@extends('layouts.backend')

@section('title')
    Change Password
@endsection

@section('content')

<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-lock me-1 text-muted"></i> Change Password
            </h3>
        </div>
        <div class="block-content">
            <form method="post" action="{{ route('account.changepwd', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('post')

                @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong> {{ session('success') }} </strong>
                </div>
                @endif

                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">

                        <div class="mb-4">
                            <label class="form-label" for="current_password">Current Password</label>
                            <input type="password" class="form-control form-control-lg @if(session('error')) is-invalid @endif" id="current_password"
                                name="current_password" autocomplete="current_password">
                            @if(session('error'))
                                <div class="text-danger mt-2">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="password">New Password</label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password"
                                autocomplete="password">
                            @error('password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="confirm_password">Confirm New
                                Password</label>
                            <input type="password" class="form-control form-control-lg" id="confirm_password"
                                name="confirm_password" autocomplete="confirm_password">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection