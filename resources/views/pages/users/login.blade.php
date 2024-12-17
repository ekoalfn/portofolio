<div class="modal" id="modal-normal-login" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                    <p>
                        Are you sure you want to login as this user
                    </p>
                    <input type="hidden" class="form-control" id="id-login">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-primary" onclick="loginAs()">Login AS</button>
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    function login(id){
        $("#modal-normal-login").modal('show');
        $('.block-title').text('Login As');
        $('#id-login').val(id);
    }

    function loginAs(){
        var id =$('#id-login').val();
        var url = "{{ route('user.login-as',":id") }}";
        url = url.replace(':id', id);

        var form_data = new FormData();
            form_data.append('_token', '{{ csrf_token() }}');
            form_data.append('id', id);

        createOverlay("process...");
        $.ajax({
            type: 'GET',
            url: url,
            contentType : false,
            processData : false,
            data: form_data,

            success: function(data){
                gOverlay.hide();

                if(data["status"] == "success") {            
                    toastr.success(data["message"]);
                    setTimeout(function(){ 
                        window.location = "{{ route('home') }}";
                    }, 500);            
                }else {
                    toastr.error(data["message"]);
                }
            },
            error: function(error) {
                alert("Server/network error\r\n" + error);
            }
        });
    }
</script>