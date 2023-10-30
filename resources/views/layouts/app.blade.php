<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>GESTION DE NOTAS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    {{-- <!-- SweetAlert --> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.css') }}">
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    @guest
                        <!-- @if (Route::has('login'))
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif -->
                    @else
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <span class="d-none d-md-block dropdown-toggle ps-2">
                                {{ Auth::user()->name }}
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6> {{ Auth::user()->name }}</h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right">
                                    </i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endguest
                </li>

            </ul>
        </nav>

    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">



            @if (Auth::user()->hasRole('ADMINISTRADOR GENERAL'))

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Paginas</li>


                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('programas') }}">
                        <i class="bi bi-bookmarks-fill"></i>
                        <span>Programas</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('profesores') }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Profesores</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('cursos') }}">
                        <i class="bi bi-pen-fill"></i>
                        <span>Cursos</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('materias') }}">
                        <i class="bi bi-book-half"></i>
                        <span>Materias</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('estudiantes') }}">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>Estudiantes</span>
                    </a>
                </li>
            @elseif (Auth::user()->hasRole('PROFESOR'))

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Paginas</li>

            
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('notas')}}">
                        <i class="bi bi-stickies-fill"></i>
                        <span>Notas</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="">
                        <i class="bi bi-bar-chart-line-fill"></i>
                        <span>Ranking</span>
                    </a>
                </li>

            @elseif (Auth::user()->hasRole('ESTUDIANTE'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('notas')}}">
                    <i class="bi bi-stickies-fill"></i>
                    <span>Notas</span>
                </a>
            </li>
            @endif


        </ul>

    </aside><!-- End Sidebar-->


    <main id="main" class="main">
        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by BootstrapMade
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js ') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
