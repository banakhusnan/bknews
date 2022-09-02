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