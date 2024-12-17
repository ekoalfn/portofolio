<div class="modal" id="modal-normal-two" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="block block-rounded shadow-none mb-0">
            <div class="block-header block-header-default">
            <h3 class="block-title" id="title"></h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-times"></i>
                </button>
            </div>
            </div>
            <div class="block-content fs-sm">
            <form class="form-horizontal" id="form" action="#">
                <input type="hidden" class="form-control" id="id">
                <div class="modal-body">
                    <div class="control-label">Key:</div>
                    <input type="text" class="form-control" id="key" placeholder="Ex. app.name">
                </div>
                <div class="modal-body">
                    <div class="control-label">Value:</div>
                    <input type="text" class="form-control" id="value" placeholder="Ex. Triz Academi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="create" onclick="store()">Save</button>
                    <button type="button" class="btn btn-primary" id="update" onclick="updated()">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
            
        </div>
        </div>
    </div>
    </div>
  
<script>
    function create() {
        $("#modal-normal-two").modal('show');
        $('#title').text('Add Config');
        $('#form').trigger("reset");
        $("#create").show();
        $("#update").hide();
    }

    function store() {
        console.log
        var key = $('#key').val();
        var value = $('#value').val();
        createOverlay('proses..')

        $.ajax({
            type : "POST",
            url: "{!! route('config.store') !!}",
            data: {
                '_token' : '{{ csrf_token() }}',
                'key' :key,
                'value' :value,
            },
            success: function(res){
                gOverlay.hide();
                if(res["status"] == "success") {            
                    toastr.success(res["message"]);
                    $("#modal-normal-two").modal('hide');
                    $('.table').DataTable().ajax.reload();              
                }else {
                    toastr.error(res["message"]);
                }
            },
            error: function(error) {
                alert("Server/network error\r\n" + error);
            }
        });
    }

    function edit(id){
        $('#title').text('Edit Config');
        $("#create").hide();
        $("#update").show();
        createOverlay("Proses...");
        var url = "{{route('config.edit',':id')}}";
        $.ajax({
            type:"GET",
            url: url.replace(':id',id),
            dataType: 'json',
            success: function(res){
                gOverlay.hide();
                $("#modal-normal-two").modal('show');
                $('.block-title').text('Edit Category Blog');
                $("#create").hide();
                $('#id').val(res.id);
                $('#key').val(res.key);
                $('#value').val(res.value);
            }
        });
    }

    function updated(){
        var id = $('#id').val();
        var key = $('#key').val();
        var value = $('#value').val();
        var url = "{{route('config.update',':id')}}";
        createOverlay("Proses...");
        $.ajax({
            type : "POST",
            url: url.replace(':id',id),
            dataType: 'json',
            data: {
                '_token' : '{{ csrf_token() }}',
                '_method': 'PUT',
                'id' : id,
                'key' :key,
                'value' :value,
            },
            success: function(res){
                gOverlay.hide();
                if(res["status"] == "success") {            
                    toastr.success(res["message"]);
                    $("#modal-normal-two").modal('hide');
                    $('.table').DataTable().ajax.reload();          
                }else {
                    toastr.error(res["message"]);
                }
            },
            error: function(error) {
                alert("Server/network error\r\n" + error);
            }
        });
    }
</script>