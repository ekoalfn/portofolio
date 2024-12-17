<div class="block-content tab-pane" id="btabs-vertical-info-reload" role="tabpanel"
    aria-labelledby="btabs-vertical-info-reload-tab">
    <h4 class="fw-semibold">Reload Configuration</h4>
    <div class="col-lg-12 col-xl-12">
        <form action="{{ route('settings.reload') }}" method="POST" enctype="multipart/form-data">
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

            @if (session('success-reload'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('success-reload') }} </strong>
            </div>
            @elseif(session('error-reload'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('error-reload') }} </strong>
            </div>
            @endif

            <div class="mb-4">
                <label class="form-label" for="name">Reload</label>
                <input type="text" class="form-control" id="reload" name="reload" value="{{config('mail.from.reload')}}"
                    placeholder="0">
                    <small class="font-14 text-muted">Write down how many seconds you want the device status page to reload.</small>
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh opacity-50 me-1"></i> Update Reload Settings
                </button>
            </div>
        </form>
    </div>
</div>