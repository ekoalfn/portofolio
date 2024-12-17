@extends('layouts.backend')

@section('title')
    User Profile
@endsection

@section('content')

<div class="content">
    <!-- User Profile -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-user-circle me-1 text-muted"></i> User Profile
            </h3>
        </div>
        <div class="block-content">
            <form method="post" action="{{ route('account.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Your account’s vital info. Your username will be publicly visible.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        
                        <div class="mb-4">
                            <label class="form-label" for="email"> {{ __('Name') }} </label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Enter your Name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="email"> {{ __('Email Address') }} </label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Enter your email. address" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="phone_number"> {{ __('Phone Number') }} </label>
                            <input type="text" class="form-control form-control-lg" id="phone_number" name="phone_number"
                                placeholder="Enter your Phone Number" value="{{ $user->phone_number }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="description"> {{ __('Description') }} </label>
                            <textarea  class="form-control form-control-lg" id="description" name="description" rows="6" cols="50"
                                placeholder="Enter your Description" >{{ $user->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="instagram"> {{ __('Instagram') }} </label>
                            <input type="text" class="form-control form-control-lg" id="instagram" name="instagram"
                                placeholder="Enter your Instagram" value="{{ $user->instagram }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="facebook"> {{ __('Facebook') }} </label>
                            <input type="text" class="form-control form-control-lg" id="facebook" name="facebook"
                                placeholder="Enter your facebook" value="{{ $user->facebook }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="twitter"> {{ __('Twitter') }} </label>
                            <input type="text" class="form-control form-control-lg" id="twitter" name="twitter"
                                placeholder="Enter your twitter" value="{{ $user->twitter }}">
                        </div>

                       
                        <div class="row mb-4">
                            <div class="col-md-10 col-xl-12">
                                <div class="push">
                                    @if($user->avatar != '')
                                    <img class="img-avatar"
                                        src="{{asset('avatar/'.Auth::user()->avatar)}}"
                                        alt="{{ Auth::user()->avatar }}" />
                                    @else
                                        <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar15.jpg') }}">
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <input class="form-control form-control-lg w-100 @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar">
                                    <small class="form-text">Allowed file types: png, jpg, jpeg with max 1 Mb</small>
                                    @error('avatar')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                @if (Auth::user()->avatar)
                                    <div class="mb-3">
                                        <a href="{{route('admin-account.delete',[$user->id])}}" class="btn btn-danger w-25">Hapus avatar</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection