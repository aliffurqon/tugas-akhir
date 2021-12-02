<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto Mitsuda</title>

        @include('admin.login.includes.style')
    </head>
    <body class="antialiased">


        <!-- Header -->
        @include('admin.login.includes.header')
        <!-- End Header -->

        <!-- Konten -->
        @yield('konten')
        <!-- End Konten -->

        <!-- Header -->
        @include('admin.login.includes.scripts')
        <!-- End Header -->

    </body>
</html>