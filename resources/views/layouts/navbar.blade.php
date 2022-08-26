<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand position-absolute top-25 sticky-top" href="/">
            <img src="{{ url('img/logo-lpm.png') }}" title="BK News" width="70" alt="LPM Tidar 21">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <div class="input-group">
                        <input class="form-control border-0" name="search" id="search" type="text"
                            placeholder="Cari disini..." aria-describedby="button-search" />
                        <button class="btn btn-white" id="button-search" type="submit" onclick="search()">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </li>
                <li class="nav-item mx-3">
                    <a class="btn btn-outline-bkn position-relative" href="/pengaduan">
                        Adukan Suara
                        <span
                            class="position-absolute top-0 start-0 translate-middle badge rounded-circle bg-bkn p-2"><span
                                class="visually-hidden">unread messages</span></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    @if (auth()->user())
                    <a class="nav-link" title="{{ auth()->user()->name }}" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-lg-inline p-2">
                            @if(auth()->user()->image != null)
                            <img src="{{ asset('storage/'.auth()->user()->image) }}"
                                class="img-profile border rounded-circle" width="40" height="40">
                            @else
                            <img src="{{ asset('img/user.png') }}" class="img-profile border rounded-circle" width="40"
                                height="40">
                            @endif
                        </div>
                    </a>
                    @else
                    <a class="nav-link" title="Login" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="d-lg-inline p-2">
                            <img src="{{ asset('img/user.png') }}" class="img-profile border rounded-circle" width="40"
                                height="40">
                        </div>
                    </a>
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-bullhorn"></i> Pengaduan</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-book-open"></i> Laporan</a></li>
                        @if (auth()->user() && auth()->user()->role != 'mahasiswa')
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard.index') }}"><i
                                    class="fa-solid fa-gauge"></i>
                                Dashboard
                            </a>
                        </li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (auth()->user())
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    Keluar
                                </button>
                            </form>
                        </li>
                        @else
                        <li><a class="dropdown-item" href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                Masuk</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Registrasi</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="navbar navbar-expand-lg bg-secondary border-top border-secondary py-0">
    <div class="container">
        <div class="nav ms-5s">
            <a class="nav-link {{ Request::is('/') ? 'nav-tabs' : '' }}" href="/">Home</a>
            <a class="nav-link {{ Request::is('news/perkuliahan') ? 'nav-tabs' : '' }}"
                href="/news/perkuliahan">Perkuliahan</a>
            <a class="nav-link {{ Request::is('news/fasilitas') ? 'nav-tabs' : '' }}"
                href="/news/fasilitas">Fasilitas</a>
            <a class="nav-link {{ Request::is('news/kemahasiswaan') ? 'nav-tabs' : '' }}"
                href="/news/kemahasiswaan">Kemahasiswaan</a>
            <a class="nav-link {{ Request::is('news/layanan') ? 'nav-tabs' : '' }}" href="/news/layanan">Layanan</a>
            <a class="nav-link {{ Request::is('news/administrasi') ? 'nav-tabs' : '' }}"
                href="/news/administrasi">Administrasi</a>
        </div>
    </div>
</div>

{{-- Javascript --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>

<script>
    function search() {
        console.log($('#search').val());
    }
</script>