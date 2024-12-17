

@extends('layouts.backend')

@section('content')

<div class="content">
    <div class="d-flex flex-row-reverse">
        <nav class="breadcrumb push bg-transparent">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
            <a class="breadcrumb-item" href="{{ route('users.index') }}">{{ __('List Users') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit Users') }}</span>
        </nav>
    </div>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-file-lines me-3 text-muted"></i>{{ __('Edit User') }}
            </h3>
        </div>
        <div id="kt_account_profile_details">
            <div class="card-body">
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['users.update', $user->id],
                'class' => 'form-horizontal'
                ]) !!}

                @include ('pages.users.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection