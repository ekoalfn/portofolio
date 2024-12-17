<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>{{config('app.name')}}  -  @yield('title')</title>

<meta name="description" content="{{config('mail.from.app_description')}}">
<meta name="author" content="{{config('app.name')}}">
<meta name="robots" content="noindex, nofollow">

<!-- Open Graph Meta -->
<meta property="og:title" content="{{config('app.name')}}">
<meta property="og:site_name" content="{{config('app.name')}}">
<meta property="og:description" content="{{config('mail.from.app_descriptione')}}">
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:image" content="{{config('mail.from.app_logo')}}">

<!-- Icons -->
<link rel="shortcut icon" href="{{asset('favicon/'.config('mail.from.app_favicon'))}}">
<link rel="icon" sizes="192x192" type="image/png" href="{{asset('favicon/'.config('mail.from.app_favicon'))}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/'.config('mail.from.app_favicon'))}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet"  href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzone/min/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


  <!-- Fonts and Styles -->
  @yield('css_before')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
  <link rel="stylesheet" id="css-main" href="{{ asset('/css/codebase.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
      <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
  @yield('css_after')

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-7H9LS0S3L1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7H9LS0S3L1');
</script>

@section('headSection')
@show