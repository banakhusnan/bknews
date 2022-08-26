<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Pengaduan Suara Mahasiswa</title>

    <!-- Font Awesome v6 -->
    <script src="{{ url('https://kit.fontawesome.com/eedb1855ec.js') }}" crossorigin="anonymous"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/stylesPengaduan.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    @include('pengaduan.layouts.navbar')


    @include('pengaduan.layouts.jumbotron')

    @yield('container')

    <!-- Footer-->
    @include('pengaduan.layouts.footer')

    <!-- Bootstrap core JS-->
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}">
    </script>

    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>