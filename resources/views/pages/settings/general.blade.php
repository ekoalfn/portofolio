<div class="block-content tab-pane active" id="btabs-vertical-info-settings" role="tabpanel"
    aria-labelledby="btabs-vertical-info-settings-tab">
    <h4 class="fw-semibold">General Settings</h4>
    <div class="col-lg-12 col-xl-12">
        <form action="{{ route('settings.general') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success-general'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('success-general') }} </strong>
            </div>
            @elseif(session('error-general'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('error-general') }} </strong>
            </div>
            @endif

            <div class="mb-4">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{config('app.name')}}"
                    placeholder="Name Your Apps">
            </div>
            <div class="mb-4">
                <label class="form-label" for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="{{config('app.url')}}"
                    placeholder="Url Your Apps">
            </div>
            <div class="mb-4">
                <label class="form-label" for="deskripsi">Description</label>
                <textarea class="form-control" name="description" id="description" cols="48"
                    rows="5">{{config('mail.from.app_description')}}</textarea>
            </div>

            <div class="form-group mb-4 ">
                <label class="form-label" for="example-textarea-input">Logo app</label>
                <div class="col-md-8">
                    <div id="logo_b_image_preview" class="d-inline-block p-3 preview">
                        <img height="50px" src="{{asset('logo/'.config('mail.from.app_logo'))}}">
                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" class="form-control" name="logo" id="logo" data-toggle="custom-file-input">
                </div>
                <small id="passwordHelpInline2" class="fs-13 mt-2">
                    Note: Upload a logo with<span class="color-dark">black text and transparent background in .png
                        format format</span> and <span class="color-dark">294x50(WxH)</span> pixels.
                    <span class="color-dark">tall</span> must be fixed,<span class="color-dark">wide</span> according to
                    you <span class="color-dark">aspect ratio.</span>
                </small>
            </div>
            <div class="form-group mb-4">
                <label class="form-label" for="example-textarea-input">Add Favicon</label>
                <div class="col-md-8">
                    <div id="logo_b_image_preview" class="d-inline-block p-3 preview">
                        <img height="50px" src="{{asset('favicon/'.config('mail.from.app_favicon'))}}">
                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" class="form-control" name="favicon" id="favicon" data-toggle="custom-file-input">
                </div>
                <small id="passwordHelpInline3" class="fs-13 mt-2">
                    Note : Upload logo with resolution <span class="color-dark">32x32</span> pixels and extension<span
                        class="color-dark">.png</b> atau <span class="color-dark">.gif</span> atau <span
                            class="color-dark">.ico</span>
                </small>
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh opacity-50 me-1"></i> Update General Settings
                </button>
            </div>
        </form>
    </div>
</div>