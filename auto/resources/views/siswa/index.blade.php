<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto Mitsuda</title>

        @include('siswa.includes.style')
    </head>
    <body class="antialiased">

        <!-- Header -->
        @include('siswa.includes.headerlogin')
        <!-- End Header -->

        <!-- Konten -->
        @yield('konten')
        <!-- End Konten -->
        
		<!-- Header -->
        @include('siswa.includes.footer')
        <!-- End Header -->

        <!-- Header -->
        @include('siswa.includes.scripts')
        <!-- End Header -->

    </body>
</html>