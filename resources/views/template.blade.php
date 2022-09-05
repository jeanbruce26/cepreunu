<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>CEPRE UNU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('assets/css/mermaid.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">

    <link href="{{ asset('https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://unpkg.com/boxicons@latest/css/boxicons.min.css') }}">
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/gridjs/theme/mermaid.min.css') }}">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">¡Bienvenido {{ Auth::user()->name }}!</h6>
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Perfil</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> {{ __('Cerrar sesión') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Light Logo-->
                <a href="/administrador" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/unu.png') }}" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/unu.png') }}" alt="" height="45">
                            <span class="fw-bold text-white fs-3 ms-2 align-self-center text-uppercase">CepreUNU</span>
                        </div>
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menú</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#" role="button" aria-expanded="false" aria-controls="sidebarDashboard">
                                <i class="mdi mdi-speedometer"></i> <span data-key="t-apps">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarInscripcion" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInscripcion">
                                <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Inscripción</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarInscripcion">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('Inscripcion.index') }}" class="nav-link" data-key="t-inscripcion"> Inscripcion </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Pago.index') }}" class="nav-link" data-key="t-pago"> Pago </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Proceso.index') }}" class="nav-link" data-key="t-proceso"> Proceso </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCruds" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCruds">
                                <i class="mdi mdi-tools"></i> <span data-key="t-cruds">CRUDS</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCruds">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('Carrera.index') }}" class="nav-link" data-key="t-carrera"> Carrera </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Egreso.index') }}" class="nav-link" data-key="t-egreso"> Egreso </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('ModalidadPago.index') }}" class="nav-link" data-key="t-modalidadPago"> Modalidad de Pago </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Persona.index') }}" class="nav-link" data-key="t-persona"> Persona </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Sede.index') }}" class="nav-link" data-key="t-sede"> Sede </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">
                            @if(\Session::has('edit'))
                                <div class="alert alert-success alert-border-left alert-dismissible fade shadow show" role="alert">
                                    <div>
                                        <i class="ri-check-double-line me-3 align-middle fs-16"></i><strong>{{ \Session::get('edit') }}</strong>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                
                            @endif
                            @if(session('new'))
                                <div class="alert alert-success alert-border-left alert-dismissible fade shadow show" role="alert">
                                    <div>
                                        {{ \Session::get('new') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @yield('content')

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <script>document.write(new Date().getFullYear())</script> © CepreUNU.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- validacon -->
    <script>
        function soloNumeros(e) {
            var key = e.keyCode || e.which,
                tecla = String.fromCharCode(key).toLowerCase(),
                letras = "1234567890.",
                especiales = [8, 37, 39, 46],
                tecla_especial = false;
        
            for (var i in especiales) {
                if (key == especiales[i]) {
                tecla_especial = true;
                break;
                }
            }
        
            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }
        }
    </script>

    <script>
        function soloLetras(e) {
            var key = e.keyCode || e.which,
                tecla = String.fromCharCode(key).toLowerCase(),
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
                especiales = [8, 37, 39, 46],
                tecla_especial = false;
        
            for (var i in especiales) {
                if (key == especiales[i]) {
                tecla_especial = true;
                break;
                }
            }
        
            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }
        }
    </script>
    <!-- end validacon -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>  

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/libs/gridjs/gridjs.umd.js') }}"></script>

    <!-- gridjs init -->
    <script src="{{ asset('assets/js/pages/gridjs.init.js') }}"></script>


    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('assets/js/pages/listjs.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
</body>

</html>