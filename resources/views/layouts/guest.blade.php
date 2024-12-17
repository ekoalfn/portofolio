<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{config('app.name')}}  -  @yield('title')</title>

    <meta name="description" content="{{config('mail.from.app_description')}}">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{config('app.name')}}">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta property="og:description" content="{{config('mail.from.app_description')}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="{{config('mail.from.app_logo')}}">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('favicon/'.config('mail.from.app_favicon'))}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/codebase.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
  </head>
  <body>
    @yield('content')
    <script src="{{asset('assets/js/codebase.app.min.js')}}"></script>

    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/op_auth_signin.min.js')}}"></script>
  </body>
</html>