<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.webs._head')
</head>

  <body>
    <div class="content-wrapper">
      @include('layouts.webs._header')
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.webs._footer')
    @include('layouts.webs._scripts')
  </body>

</html>