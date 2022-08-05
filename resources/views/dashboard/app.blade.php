<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">


    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/styles.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-expand-lg navbar-dark sticky-top bg-bkn shadow">
        <div class="container-fluid">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
            </button>
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">BK News</a>
            <div class="input-group w-50">
                <input class="form-control rounded-start border-0" type="text" placeholder="Cari disini..."
                    aria-describedby="button-search" />
                <button class="btn btn-white" id="button-search" type="button"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="collapse navbar-collapse" id="sidebarMenu">
                <div class="dropdown">
                    <a class="text-white text-decoration-none" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-lg-inline p-2">
                            <img src="{{ url('img/user.png') }}" class="img-profile bg-white rounded-circle p-1"
                                width="30" height="30" alt="">
                        </div>
                        {{ auth()->user()->role }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-bullhorn"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse navbar-collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('dashboard.index') }}">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('users') ? 'active' : '' }}"
                                href="{{ route('dashboard.users') }}">
                                <span data-feather="users"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('news') ? 'active' : '' }}"
                                href="{{ route('dashboard.news') }}">
                                <span data-feather="bar-chart-2"></span>
                                News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Font Awesome v6 -->
    <script src="{{ url('https://kit.fontawesome.com/eedb1855ec.js') }}" crossorigin="anonymous"></script>

    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="{{ url('js/dashboard.js') }}"></script>
</body>

</html>