<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empact - Welcome</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
        rel="stylesheet" type="text/css">



    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!-- Custom CSS -->
    <link href="{{ asset('css/stylish-portfolio.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
        <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a class="js-scroll-trigger" href="#page-top">Ayuda</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="js-scroll-trigger" href="https://docs.google.com/document/d/1_WJ0LPetPtfcq8TiddedTGLrk3EDuY6Ra9FcmCCrtlo/edit?usp=sharing" target="_blank">Guía de administrador</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="js-scroll-trigger" href="https://docs.google.com/document/d/1b6PK9Xsh_XGuTnZ7WdOPZktT-qa3RJK_i5wMaNH2WqA/edit?usp=sharing" target="_blank">Guía de usuario</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
        <div class="container text-center my-auto">
            <h1 class="mb-1 text-primary">Empact v2</h1>
            <h3 class="mb-5 text-secondary">
                <p>Plataforma web para el cálculo de costo impactado de empleados</p>
            </h3>

            @auth
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ url('/home') }}">Home</a>
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Cerrar sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('login') }}">Log In</a>
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="{{ route('register') }}">Registrarse</a>
            @endauth

            <br>
            <p class="text-muted small mb-0">Por Leonardo Ayala.</p>

        </div>
    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/stylish-portfolio.min.js') }}"></script>

</body>

</html>
