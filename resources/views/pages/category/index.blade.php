@extends('layouts.backend')

@section('title')
Category Blog
@endsection


@section('content')

<div class="content">
    <div class="d-flex flex-row-reverse">
        <nav class="breadcrumb push bg-transparent">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
            <span class="breadcrumb-item active">{{ __('Category Blog') }}</span>
        </nav>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <div class="d-flex gap-4 align-items-center">
                <h3 class="block-title"><i class="fa fa-file-lines me-3 text-muted"></i>{{ __('List of Category Blog') }}</h3>
                <div class="box-header with-border">
    
                    <button type="button" class="btn btn-alt-primary" onClick="create()">Add Category Blog</button>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">

            @include('pages.helpers.message')

            <table class="table table-hover table-vcenter">
                <thead>
                    <th width="5%">No</th>
                    <th>Name</th>
                    <th><i class="fa fa-cog"></i> Action</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->




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
                url: '{{ route('category-blog.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'name'},
                {data: 'aksi', searchable: false, sortable: false},
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
                    toastr.success("Data Deleted Successfully");
                    table.ajax.reload();
                })
                .fail((errors) => {
                    toastr.error(errors);
                    return;
                });
        }
    }
</script>
@include('pages.category.modal')
@endpush
