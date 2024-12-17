@extends('layouts.backend')

@section('title')
    Blog
@endsection

@section('content')
    <div class="content">
        <div class="d-flex flex-row-reverse">
            <nav class="breadcrumb push bg-transparent">
                <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
                <span class="breadcrumb-item active">{{ __('List Blog') }}</span>
            </nav>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <div class="d-flex gap-4 align-items-center">
                    <h3 class="block-title"><i class="fa fa-file-lines me-3 text-muted"></i>{{ __('List of Blog') }}</h3>
                    <a href="{{ route('blog.create') }}">
                        <button type="button" class="btn btn-primary">
                            Add Blog
                        </button>
                    </a>
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Publish</th>
                            <th><i class="fa fa-cog"></i> Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('#example').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('blog.data') }}',
                },
                columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'title'},
              
                    {data: 'users.name',
                     "defaultContent": "<i>Not Set</i>",
                     "className": "text"
                    },
                    {data: 'category_blogs.name',
                     "defaultContent": "<i>Not Set</i>",
                     "className": "text"
                    },
                    {data: 'publish', "className": "text-center"},
                    {data: 'aksi', searchable: false, sortable: false, "className": "text-center"},
                ]
            });
        });

        function deleteData(url) {
            if (confirm('Are you sure you want to delete selected data?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        
                        table.ajax.reload();

                    })
                    .fail((errors) => {
                        alert('Unable to delete data');
                        return;
                    });
            }
        }
    </script>
@endpush
