<div class="block-content tab-pane" id="btabs-vertical-info-mail" role="tabpanel"
    aria-labelledby="btabs-vertical-info-mail-tab">
    <h4 class="fw-semibold">Mail Configuration</h4>
    <div class="col-lg-12 col-xl-12">

        <form action="{{ route('settings.mailconfig') }}" method="POST" enctype="multipart/form-data">
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

            @if (session('success-mail'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('success-mail') }} </strong>
            </div>
            @elseif(session('error-mail'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> {{ session('error-mail') }} </strong>
            </div>
            @endif

            <div class="mb-4">
                <label for="name" class="form-label">Mail From Name</label>
                <input type="text" class="form-control" id="mail_name" name="mail_name"
                    value="{{config('mail.from.name')}}" placeholder="Alex">
                <small class="font-14 text-muted">This will be display name for your sent email.</small>
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">Mail From Address</label>
                <input type="email" class="form-control" id="mail_address" name="mail_address"
                    value="{{config('mail.from.address')}}" placeholder="alex@gmail.com">
                <small class="font-14 text-muted">This email will be used for "Contact Form" correspondence.</small>
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">Mail Driver</label>
                <input type="text" class="form-control" id="mail_driver" name="mail_driver"
                    value="{{config('mail.default')}}" placeholder="smnt">
                <small class="font-14 text-muted">You can select any driver you want for your Mail setup. Ex. SMTP,
                    Mailgun, Mandrill,
                    SparkPost, Amazon SES etc. Add single driver only.
                </small>
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">Mail HOST</label>
                <input type="text" class="form-control" id="mail_host" name="mail_host"
                    value="{{config('mail.mailers.smtp.host')}}" placeholder="smnt.gmail">
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">Mail PORT</label>
                <input type="text" class="form-control" id="mail_port" name="mail_port"
                    value="{{config('mail.mailers.smtp.port')}}" placeholder="578">
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">Mail Username</label>
                <input type="email" class="form-control" id="mail_username" name="mail_username"
                    value="{{config('mail.mailers.smtp.username')}}" placeholder="alex@gmail.com">
                <small class="font-14 text-muted">Add your email id you want to configure for sending emails.</small>
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">Mail Password</label>
                <input type="password" class="form-control" id="mail_password" name="mail_password"
                    value="{{config('mail.mailers.smtp.password')}}" placeholder="****">
                <small class="font-14 text-muted">Add your email password you want to configure for sending
                    emails.</small>
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">HTTP</label>
                <input type="text" class="form-control" id="mail_encryption" name="mail_encryption"
                    value="{{config('mail.mailers.smtp.encryption')}}" placeholder="tls or ssl">
                <small class="font-14 text-muted">Use tls if your site uses HTTP protocol and ssl if you site uses HTTPS
                    protocol.</small>
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh opacity-50 me-1"></i> Update Mail Settings
                </button>
            </div>
        </form>
    </div>
</div>