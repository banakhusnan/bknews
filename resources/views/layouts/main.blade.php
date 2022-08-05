<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    @if (Request::is('/'))
    <title>BK News | Berita Terbaru, Aduan Suara Mahasiswa</title>
    @elseif(Request::is('login') || Request::is('register') || Request::is('email*'))
    <title>@yield('title') - BK Media</title>
    @else
    <title>@yield('title') - BK News</title>
    @endif

    <!-- Font Awesome v6 -->
    <script src="{{ url('https://kit.fontawesome.com/eedb1855ec.js') }}" crossorigin="anonymous"></script>
    <!-- Favicon-->
    @if(Request::is('login') || Request::is('register') || Request::is('email*'))
    <link rel="icon" type="image/x-icon" href="{{ url('img/bk-media.ico') }}" />
    @else
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}" />
    @endif
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ url('css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    @if (!Request::is('login') && !Request::is('register') && !Request::is('email*'))
    <!-- Responsive navbar-->
    @include('layouts.navbar')
    @endif

    <!-- Page content-->
    @yield('container')


    @if (!Request::is('login') && !Request::is('register') && !Request::is('email*'))
    <!-- Footer-->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; 2022 Made with <i
                    class="fa-solid fa-heart text-danger"></i> By <a href="https://www.instagram.com/banakhoesnan"
                    class="text-decoration-none" target="_blank">Bana
                    Khusnan</a></p>
        </div>
    </footer>
    @endif

    <!-- Bootstrap core JS-->
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ url('js/scripts.js') }}"></script>
</body>

</html>