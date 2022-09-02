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
                    <form class="input-group" method="GET" action="{{ url()->current() }}">
                        @if (request('subcategory'))
                        <input type="hidden" value="{{ request('subcategory') }}" name="subcategory">
                        @endif
                        <input class="form-control border-0" name="search" id="search" type="text"
                            placeholder="Cari disini..." aria-describedby="button-search"
                            value="{{ request('search') }}" />
                        <button class="btn btn-white" id="button-search" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
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
                        @if (auth()->user())
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-bullhorn"></i> Pengaduan</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-book-open"></i> Laporan</a></li>
                        @elseif (auth()->user() && auth()->user()->role != 'mahasiswa')
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard.index') }}"><i
                                    class="fa-solid fa-gauge"></i>
                                Dashboard
                            </a>
                        </li>
                        @endif
                        @if (! auth()->user())
                        <li><a class="dropdown-item" href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                Masuk</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Registrasi</a></li>
                        @endif
                        @if (auth()->user())
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    Keluar
                                </button>
                            </form>
                        </li>
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
            <a class="nav-link {{ Request::is('news/olah-raga') ? 'nav-tabs' : '' }}" href="/news/olah-raga">Olah
                Raga</a>
            <a class="nav-link {{ Request::is('news/ekonomi') ? 'nav-tabs' : '' }}" href="/news/ekonomi">Ekonomi</a>
            <a class="nav-link {{ Request::is('news/teknologi') ? 'nav-tabs' : '' }}"
                href="/news/teknologi">Teknologi</a>
        </div>
    </div>
</div>