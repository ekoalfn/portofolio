@extends('layouts.backend')

@section('title')
Roles
@endsection

@section('content')

<div class="content">

    <div class="d-flex flex-row-reverse">
        <nav class="breadcrumb push bg-transparent">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
            <span class="breadcrumb-item active">{{ __('List Role') }}</span>
        </nav>
    </div>

    <!-- Hover Table -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <div class="d-flex gap-4 align-items-center">
                <h3 class="block-title"><i class="fa fa-file-lines me-1 text-muted"></i>{{ __('List Role') }}</h3>
                <div class="d-flex justify-content-left" data-kt-user-table-toolbar="base">
                    {{-- @can ('setting-create') --}}
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">
                        Add Role</button></a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="block-options">
                <form action="{{ route('roles.index') }}" method="GET">
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-14" placeholder="Search" name="search"
                        value="{{ request('search') }}" type="search" id="userName" />
                </form>
            </div>
        </div>
        <div class="block-content">

            @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('success') }} </strong>
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('error') }} </strong>
            </div>
            @endif

            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;"></th>
                        <th style="width: 11%"> Role </th>
                        <th> Permissions </th>
                        <th class="d-none d-sm-table-cell text-center" style="width: 8%;">Number of Users</th>
                        {{-- @can('setting-create')  --}}
                        <th class="text-center" style="width: 100px;">Actions</th>
                        {{-- @endcan --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ ucwords($item->name) }}</td>
                        <td>
                            @if($item->id == 1)
                            All
                            @elseif ($item->permissions->count())
                            @foreach ($item->permissions as $permission)
                            {{ ucwords($permission->name) }},
                            @endforeach
                            @else
                            None
                            @endif
                        </td>
                        <td class="text-center">{{ $item->users->count() }}</td>
                        <td class="text-end">
                            {{-- @can('setting-create') --}}
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                
                                    <div class="btn-group">

                                        {{-- @can ('setting-create') --}}
                                        <a href="{{ route('roles.edit', [$item->id]) }}" button type="button"
                                            class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        {{-- @endcan --}}

                                        {{-- @can ('setting-create') --}}
                                        <a href="{{ route('roles.show',[$item->id]) }}" button type="button"
                                            class="btn btn-sm btn-primary" title="Show">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        {{-- @endcan --}}

                                        {{-- @can ('setting-create') --}}
                                        @if($item->id > 1)
                                            <div style="margin-left: -2px">
                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['roles.destroy', $item->id],
                                                ]) !!}
                                                {!! Form::button('<i class="fa fa-times"></i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-sm btn-primary',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        @endif
                                {{-- @endcan --}}
                                    </div>
                            </div>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Hover Table -->
</div>
@endsection