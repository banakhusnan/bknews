@include('layouts.header')

<body>
    @if (!Request::is('login') && !Request::is('register') && !Request::is('email*') && !Request::is('forgot-password')
    && !Request::is('reset-password/*'))
    <!-- Responsive navbar-->
    @include('layouts.navbar')
    @endif

    <!-- Page content-->
    @yield('container')


    @if (!Request::is('login') && !Request::is('register') && !Request::is('email*') && !Request::is('forgot-password')
    && !Request::is('reset-password/*'))
    <!-- Footer-->
    <footer class="py-3 bg-dark text-white">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="mb-5">
                        <img src="{{ asset('img/logo-lpm.png') }}" style="width: 80px">
                        <img src="img/bk-media.png" style="width: 80px">
                    </div>

                    <div class="mb-3">
                        <h5>Telusuri</h5>
                        <div class="d-inline">
                            <a href="" class="text-decoration-none link-light">Olah Raga</a>
                            <a href="" class="mx-3 text-decoration-none">Ekonomi</a>
                            <a href="" class="text-decoration-none">Teknologi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6>Tentang Kami</h6>
                        <p class="text-muted">
                            BK Aduan adalah suatu wadah bagi mahasiswa untuk menyuarakan aspirasi berdasarkan
                            permasalahan
                            yang ada dikampus dan bagian dari BK News.
                        </p>

                        <a href="" class="text-link"><i class="fa-brands fa-facebook fs-4"></i></a>
                        <a href="" class="text-link text-danger">
                            <i class="fa-brands fa-square-instagram fs-4"></i></i>
                        </a>
                    </div>

                    <div class="mb-3">

                        <h6>Kontak</h6>
                        <div class="list-group text-muted">
                            <div>
                                <i class="fa-solid fa-location-dot"></i>&ensp; Muntilan Magelang, Jawa Tengah
                            </div>
                            <div>
                                <i class="fa-solid fa-phone"></i>&ensp; 08123456789
                            </div>
                            <div>
                                <i class="fa-solid fa-envelope"></i>&ensp; aduan@bknews.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center border-top mt-4 pt-4">
                <p>Copyright &copy; 2022 Made with
                    <i class="fa-solid fa-heart text-danger"></i> By
                    <a href="https://www.instagram.com/banakhoesnan" class="text-decoration-none" target="_blank">
                        Bana Khusnan
                    </a>
                </p>
            </div>
        </div>
    </footer>
    @endif

    @include('layouts.footer')
</body>

</html>