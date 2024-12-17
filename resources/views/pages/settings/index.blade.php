@extends('layouts.backend')

@section('title')
  Setting
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">
        Settings <small>Configuration</small>
        </h2>
        <div class="col-12">
            <div class="block block-rounded row g-0 overflow-hidden">
                <ul class="nav nav-tabs nav-tabs-block flex-md-column col-md-4 col-xxl-2 rounded-0" role="tablist">
                    <li class="nav-item d-md-flex flex-md-column">
                        <button class="nav-link fs-sm text-md-start rounded-0 active" id="btabs-vertical-info-settings-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-info-settings" role="tab" aria-controls="btabs-vertical-info-settings" aria-selected="false">
                            <i class="fa fa-fw fa-cog opacity-50 me-1 d-none d-sm-inline-block"></i>
                            <span>Generals</span>
                            <p class="d-none d-md-block fs-xs fw-medium opacity-75 mt-md-2 mb-0">
                            General settings such as, site title, site description, address and so on.
                            </p>
                        </button>
                    </li>
                    <li class="nav-item d-md-flex flex-md-column">
                        <button class="nav-link fs-sm text-md-start rounded-0" id="btabs-vertical-info-mail-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-info-mail" role="tab" aria-controls="btabs-vertical-info-mail" aria-selected="true">
                            <i class="fa fa-fw fa-home opacity-50 me-1 d-none d-sm-inline-block"></i>
                            <span>Mail Configuration</span>
                            <p class="d-none d-md-block fs-xs fw-medium opacity-75 mt-md-2 mb-0">
                                Email SMTP settings, notifications and others related to email.
                            </p>
                        </button>
                    </li>
                    <li class="nav-item d-md-flex flex-md-column">
                        <button class="nav-link fs-sm text-md-start rounded-0" id="btabs-vertical-info-reload-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-info-reload" role="tab" aria-controls="btabs-vertical-info-reload" aria-selected="true">
                            <i class="fa fa-fw fa-refresh opacity-50 me-1 d-none d-sm-inline-block"></i>
                            <span>Reload Configuration</span>
                            <p class="d-none d-md-block fs-xs fw-medium opacity-75 mt-md-2 mb-0">
                                Reload Configuration Status Device.
                            </p>
                        </button>
                    </li>
                
                </ul>
                <div class="tab-content col-md-8 col-xxl-10">
                @include('pages.settings.general')
                @include('pages.settings.mail')
                @include('pages.settings.reload')
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection


