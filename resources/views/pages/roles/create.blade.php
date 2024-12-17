@extends('layouts.backend')

@section('content')

<div class="content">

    <div class="d-flex flex-row-reverse">
        <nav class="breadcrumb push bg-transparent">
            <a class="breadcrumb-item" href="{{ route('roles.index') }}">{{ __('Role List') }}</a>
            <span class="breadcrumb-item active">{{ __('Role Management') }}</span>
        </nav>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-users-gear me-1 text-muted"></i> {{ __('Role Management') }}
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

                {!! Form::open(['route' => 'roles.store', 'class' => 'form-horizontal']) !!}
                @include ('pages.roles.form', ['formMode' => 'create'])
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>

@endsection