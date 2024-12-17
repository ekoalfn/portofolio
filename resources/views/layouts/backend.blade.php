<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
      
      @include('layouts.partials._head')
</head>

<body>

  <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
    <!-- Side Overlay-->
    <aside id="side-overlay">
      <!-- Side Header -->
      <div class="content-header">  
        <!-- User Avatar -->
        <a class="img-link me-2" href="javascript:void(0)">
          <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
        </a>
        <!-- END User Avatar -->

        <!-- User Info -->
        <a class="link-fx text-body-color-dark fw-semibold fs-sm" href="javascript:void(0)">
          John Smith
        </a>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout" data-action="side_overlay_close">
          <i class="fa fa-fw fa-times"></i>
        </button>
        <!-- END Close Side Overlay -->
      </div>
      <!-- END Side Header -->

      <!-- Side Content -->
      <div class="content-side">
        <p>
          Content..
        </p>
      </div>
      <!-- END Side Content -->
    </aside>
  
    <!-- Sidebar -->
    @include('layouts.partials._sidebar')
    <!-- END Sidebar -->

     <!-- Header -->
    @include('layouts.partials._header')
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    @include('layouts.partials._footer')
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->
 
    @include('layouts.partials._script')
    @include('layouts.partials._toast')
    @include('layouts.partials._loading')
    
</body>

</html>
