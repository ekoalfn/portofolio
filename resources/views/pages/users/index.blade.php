@extends('layouts.backend')

@section('title')
    User
@endsection

@section('content')
    <div class="content">
        <div class="d-flex flex-row-reverse">
            <nav class="breadcrumb push bg-transparent">
                <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
                <span class="breadcrumb-item active">{{ __('List User') }}</span>
            </nav>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <div class="d-flex gap-4 align-items-center">
                    <h3 class="block-title"><i class="fa fa-file-lines me-3 text-muted"></i>List User
                    </h3>
                    {{-- @can ('users-create') --}}
                        <a href="{{ route('users.create') }}">
                            <button type="button" class="btn btn-primary">
                                Add User
                            </button>
                        </a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="block-content block-content-full">
                
                @include('pages.helpers.message')

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

                <table id="example" class="table table-hover table-vcenter">
                    <thead>
                        <tr>
                            <th width="6%">No</th>
                            <th>Name</th>
                            <th width=15%>Email</th>
                            <th width="15%">Phone Number</th>
                            <th>Verified</th>
                            <th>Role</th>
                            <th><i class="fa fa-cog"></i> Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- @includeIf('pages.users.reset') --}}
@endsection

@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('#example').DataTable({
                responsive: true,
                processing: true,
                ajax: {
                    url: '{{ route('users.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'name',
                        "defaultContent": "<i>Not Set</i>"
                    },
                    {
                        data: 'email',
                        "defaultContent": "<i>Not Set</i>"
                    },
                    {
                        data: 'phone_number',
                        "defaultContent": "<i>Not Set</i>"
                    },
                    {
                        data: 'email_verified_at',
                        "defaultContent": "<i>Not Set</i>"
                    },
                    {
                        data: 'role'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

        });

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();

                        $('#alert').fadeIn();
                        setTimeout(() => {
                            $('#alert').fadeOut();
                        }, 3000);
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }
    
        function changePassword(url) {
            $('#modal-reset').modal('show');
            $('#modal-reset .modal-title').text('Add User');

            $('#modal-reset form')[0].reset();
            $('#modal-reset form').attr('action', url);
            $('#modal-reset [name=_method]').val('post');

            $('#modal-reset').validator().on('submit', function (e) {
                if (! e.preventDefault()) {
                    $.post($('#modal-reset form').attr('action'), $('#modal-reset form').serialize())
                        .done((response) => {
                            $('#modal-reset').modal('hide');
                            table.ajax.reload();

                            $('#alert-success').fadeIn();
                            setTimeout(() => {
                                $('#alert-success').fadeOut();
                            }, 3000);
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });
        }
    </script>
    @include('pages.users.changepassword')
@endpush
