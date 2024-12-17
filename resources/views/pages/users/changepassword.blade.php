<div class="modal" id="modal-normal-two" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title"></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                <form id="form" action="#">
                    <input type="hidden" class="form-control" id="id">
                    <div class="modal-body">
                        <div class="control-label mb-2">
                            <label for="">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="control-label">
                            <label for="">Confirm New Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-primary" onclick="updated()">Save</button>
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    function edit(id){

        createOverlay("Proses...");
        var url = "{{route('users.changepassword',':id')}}";
        $.ajax({
            type:"GET",
            url: url.replace(':id',id),
            dataType: 'json',
            success: function(res){
                gOverlay.hide();
                $("#modal-normal-two").modal('show');
                $('.block-title').text('Change Password');
                $("#create").hide();
                $('#id').val(res.id);
                $('#name').val(res.name);
                $('#published').val(res.published);
            }
        });
    }
    function updated(){
        var id = $('#id').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        console.log("hello");
        createOverlay("Proses...");
        $.ajax({
            type : "POST",
            url: "{!! route('users.post_changepassword') !!}",
            data: {
                '_token' : '{{ csrf_token() }}',
                'id' :id,
                'password' :password,
                'confirm_password' :confirm_password,
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