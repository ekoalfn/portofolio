<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        @include('layouts.webs._head')
    </head>
    <body>
        <div class="content-wrapper">
            @include('layouts.webs._header')
            {{ $slot }}
        </div>

        @include('layouts.webs._footer')
        @include('layouts.webs._scripts')
      
    </body>
</html>
