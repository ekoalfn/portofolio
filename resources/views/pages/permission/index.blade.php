@extends('layouts.backend')

@section('title')
Permission
@endsection


@section('content')

<div class="content">
    <div class="d-flex flex-row-reverse">
        <nav class="breadcrumb push bg-transparent">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
            <span class="breadcrumb-item active">{{ __('Permission') }}</span>
        </nav>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <div class="d-flex gap-4 align-items-center">
                <h3 class="block-title"><i class="fa fa-file-lines me-3 text-muted"></i>{{ __('List of Permission') }}
                </h3>
                <div class="box-header with-border">
                    <button onclick="addForm('{{ route('permission.store') }}')" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#modal-normal">
                        Add Permission
                    </button>
                </div>
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
            
            <table class="table table-hover table-vcenter">
                <thead>
                    <th width="5%">No</th>
                    <th>Permission Name</th>
                    <th width="15%"><i class="fa fa-cog"></i> Action</th>
                </thead>
            </table>
        </div>
    </div>
</div>

@includeIf('pages.permission.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('permission.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'name'},
                {data: 'aksi', searchable: false, sortable: false, "className": "text-center"},
            ]
        });

        $('#modal-normal').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-normal form').attr('action'), $('#modal-normal form').serialize())
                    .done((response) => {
                        $('#modal-normal').modal('hide');
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
    });

    function addForm(url) {
        $('#modal-normal').modal('show');
        $('#modal-normal .modal-title').text('Add Permission');
        
        $('#modal-normal form')[0].reset();
        $('#modal-normal form').attr('action', url);
        $('#modal-normal [name=_method]').val('post');
    }

    function editForm(url) {
        $('#modal-normal').modal('show');
        $('#modal-normal .modal-title').text('Edit Permission');

        $('#modal-normal form')[0].reset();
        $('#modal-normal form').attr('action', url);
        $('#modal-normal [name=_method]').val('put');

        $.get(url)
            .done((response) => {
                $('#modal-normal [name=name]').val(response.name);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

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
</script>
@endpush