@extends('layouts.backend')

@section('content')

<div class="content">
    <div class="d-flex flex-row-reverse">
        <nav class="breadcrumb push bg-transparent">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
            <a class="breadcrumb-item" href="{{ route('roles.index') }}">{{ __('List Role') }}</a>
            <span class="breadcrumb-item active">{{ __('Detail Role') }}</span>
        </nav>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <div class="d-flex gap-4 align-items-center">
                <h3 class="block-title"></i>{{ ucfirst($role->name) }}
                </h3>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-hover table-vcenter">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>:</td>
                        <td>{{$role->id}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$role->name}}</td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td>:</td>
                        <td>@foreach($rolePermissions as $item){{$item->name}},@endforeach</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection