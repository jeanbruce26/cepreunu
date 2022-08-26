<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>CEPRE UNU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

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
    
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body class="auth-bg-login">

    <div class="auth-page-wrapper auth-bg-cover">
    
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center align-items-center mt-4">
                        <div class="text-center text-white">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="{{asset('assets/images/unu.png')}}" alt="" height="120">
                                </a>
                            </div>
                        </div>
                        <div class="text-center text-white mx-5">
                            <p class="mt-3 fs-20 fw-bold">CENTRO PRE UNIVERSITARIO - UNU</p>
                            <p class="fs-15 fw-bold">SISTEMA DE MATRICULA</p>
                            <p class="fs-15 fw-bold">++PROCESO++</p>
                        </div>
                        <div class="text-center text-white">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="{{asset('assets/images/unu.png')}}" alt="" height="120">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="fw-bold">Formulario de validación de pago.</h5>
                                </div>
                                <div class="p-2 m-auto mt-2 col-10">
                                    <form action="">
                                        
                                        <div class="mb-3">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="d-flex me-1"><i class="uil uil-usd-circle"></i></th>
                                                        <th class="text-justify"><label class="form-label"> Recuerda que, puedes realizar tu inscripción al día siguiente de haber hecho tu pago.</label></th>
                                                    </tr>
                                                </thead>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tipo de Documento *</label>
                                            <select class="form-select mb-3" aria-label="Default select example">
                                                <option value="" selected>Seleccione</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Documento *</label>
                                            <input type="text" class="form-control" placeholder="Ingrese su documento">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Número de Operación *</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="text" class="form-control pe-5" placeholder="Ingrese su número de operación">
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> CepreUNU.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ asset('assets/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script>
</body>

</html>