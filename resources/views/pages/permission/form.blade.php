<!-- Normal Modal -->
<div class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" id="my-form" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Permission</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-12">
                        <div class="form-floating px-4 mt-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Worksheets"
                                required>
                            <label class="form-label" for="example-text-input-floating" style="padding-left: 2.5rem;">
                                Name <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button class="btn btn-sm btn-flat btn-primary">Save</button>
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END Extra Large Modal -->
