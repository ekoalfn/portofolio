
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Auth::user()->email_verified_at == null && Auth::user()->password != null)
                <div class="card mx-auto border-0 bg-white shadow-lg p-4 rounded-4 mt-4" style="width: 24rem;">
                    <h5 class="text-center fw-semibold" style="font-size: 20px;">Verifikasi email anda</h5>
                    <p class="text-center text-secondary mb-2" style="font-size: 14px;">Lihat kotak masuk di email anda</p>
                    <hr style="color: #c0c0c0;">
                    <p class="text-center text-secondary mb-2" style="font-size: 14px;">Tidak dapat email? silahkan kirim ulang disini</p>
                    {{-- <a href="{{Auth::user()->sendEmailVerificationNotification()}}" class="btn w-100 rounded-pill text-white border-0 h-50 mt-2" style="background-color: #F29100;">Kirim Ulang</a> --}}
                    @if (session('success'))
                        <div class="text-success mb-3" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <a href="{{route('verification.resend')}}" class="btn w-100 rounded-pill text-white border-0 h-50 mt-2" style="background-color: #F29100;">Kirim Ulang</a>
                </div>
            @else
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Kamu Login Sebagai User!') }}
                        {{-- <div>
                            @if (Auth::user()->email_verified_at == null && Auth::user()->password != null)
                                <div class="alert alert-info" role="alert">
                                    Silahkan lihat email kamu untuk melakukan verifikasi email
                                </div>
                            @endif
                        </div> --}}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

