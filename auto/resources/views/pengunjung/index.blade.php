<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto Mitsuda</title>

        @include('pengunjung.includes.style')
    </head>
    <body class="antialiased">


        <!-- Header -->
        @include('pengunjung.includes.header')
        <!-- End Header -->

        <!-- Konten -->
        @yield('konten')
        <!-- End Konten -->
        
		<!-- Header -->
        @include('pengunjung.includes.footer')
        <!-- End Header -->

        <!-- Header -->
        @include('pengunjung.includes.scripts')
        <!-- End Header -->

    </body>
</html>