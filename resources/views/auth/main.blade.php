@extends('layouts.main')

@section('title', $title)

@section('container')
<section class="min-vh-100 bg-secondary bg-gradient">
    <div class="container py-5 h-100">
        @if (Request::is('login'))
        <div class="row justify-content-center mb-3">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <a href="/" class="btn bg-white w-100 py-3 text-start fw-bold">
                    <i class="fa-solid fa-arrow-left-long"></i> Kembali Ke BK News
                </a>
            </div>
        </div>
        @endif
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">

                    @include('includes.flash')

                    <div class="card-body pt-5 px-5 text-center">
                        @yield('card-body')
                    </div>

                    <footer class="p-3">
                        <p class="text-center text-muted">
                            Copyright &copy; 2022 Made with <i class="fa-solid fa-heart text-danger"></i> By
                            <a href="https://www.instagram.com/banakhoesnan" class="text-decoration-none"
                                target="_blank">Bana Khusnan</a>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection