<div class="block-content tab-pane" id="btabs-vertical-info-frontend" role="tabpanel"
    aria-labelledby="btabs-vertical-info-frontend-tab">
    <h4 class="fw-semibold">FrontEnd Configuration</h4>
    <div class="col-lg-12 col-xl-12">
        <form action="{{ route('settings.frontend') }}" method="POST" enctype="multipart/form-data">
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

            @if (session('success-frontend'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('success-frontend') }} </strong>
            </div>
            @elseif(session('error-frontend'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('error-frontend') }} </strong>
            </div>
            @endif

            <div class="mb-4">
                <label for="name" class="form-label">Frontend URL</label>
                <input type="text" class="form-control" id="frontend_url" name="frontend_url"
                    value="{{config('settings.frontend.url')}}" placeholder="https://example.id/">
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh opacity-50 me-1"></i> Update Frontend Settings
                </button>
            </div>
        </form>
    </div>
</div>