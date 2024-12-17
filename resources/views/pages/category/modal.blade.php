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
                    <label class="form-label" for="published">
                        Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="name" placeholder="Ex. History">
                </div>
                <div class="modal-body">
                    <label class="form-label" for="published">
                        Publish <span class="text-danger">*</span>
                    </label>
                    <select class="form-select" id="published" name="published"
                        aria-label="Floating label select example" required>
                        <option value=""> Select Publish </option>
                        <option value="1"> Publish </option>
                        <option value="0"> Non Publish </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-primary" id="create" onclick="store()">Save</button>
                    <button type="button" class="btn btn-alt-primary" id="update" onclick="updated()">Update</button>
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
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
        $('#title').text('Add Category Blog');
        $('#form').trigger("reset");
        $("#create").show();
        $("#update").hide();
    }
  
    function store() {
       
        var name = $('#name').val();
        var published = $('#published').val();
        createOverlay('proses..')

        $.ajax({
            type : "POST",
            url: "{!! route('category-blog.store') !!}",
            data: {
                '_token' : '{{ csrf_token() }}',
                'name' :name,
                'published' :published,
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
        $('#title').text('Edit Category Blog');
        $("#create").hide();
        $("#update").show();
        createOverlay("Proses...");
        var url = "{{route('category-blog.edit',':id')}}";
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
                $('#name').val(res.name);
                $('#published').val(res.published);
            }
        });
    }

    function updated(){
        var id = $('#id').val();
        var name = $('#name').val();
        var published = $('#published').val();
        var url = "{{route('category-blog.update',':id')}}";
        createOverlay("Proses...");
        $.ajax({
            type : "POST",
            url: url.replace(':id',id),
            dataType: 'json',
            data: {
                '_token' : '{{ csrf_token() }}',
                '_method': 'PUT',
                'id' : id,
                'name' :name,
                'published':published
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