<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Empact - home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <!--Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- Tweaks for older IEs-->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
    <div id="app">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <div class="side-navbar-wrapper">
                <!-- Sidebar Header    -->
                <div class="sidenav-header d-flex align-items-center justify-content-center">
                    <!-- User Info-->
                    <div class="sidenav-header-inner text-center"><img src="{{ asset('img/placeholder.png') }}"
                            class="img-fluid rounded-circle">
                        <h2 class="h5">
                            @if(Auth::user()) {{ Auth::user()->name }}
                            @else Usuario
                            @endif
                        </h2><span>
                            @if(Auth::user()) Colaborador
                            @else Puesto
                            @endif
                        </span>
                    </div>
                    <!-- Small Brand information, appears on minimized sidebar-->
                    <div class="sidenav-header-logo"><a href="{{ url('index_v2') }} "
                            class="brand-small text-center"><strong class="text-primary">Emp</strong></a></div>
                </div>
                <!-- Sidebar Navigation Menus-->
                <navigation-menu header="Panel de control">
                    <navigation-item url="{{ route('home') }}" icon="fa fa-home" header="Home"></navigation-item>
                    <navigation-dropdown object_id="test" icon="fa fa-layer-group" header="Ambientes">
                        <navigation-item url="{{ url('forms_v2') }}" header="Ver todas las opciones."></navigation-item>
                    </navigation-dropdown>
                    <navigation-item url="" icon="fa fa-project-diagram" header="Procesos"></navigation-item>
                    <navigation-item url="" icon="fa fa-hourglass-end" header="Reportes" notification=""
                        notification_color="info"></navigation-item>
                </navigation-menu>
                <navigation-menu header="Usuario">
                    <navigation-item url="" icon="fa fa-user" header="Perfil"></navigation-item>
                    <navigation-item url="" icon="fa fa-sign-out-alt" header="Cerrar sesión"></navigation-item>
                </navigation-menu>

            </div>
        </nav>
        <div class="page">
            <!-- navbar-->
            <header class="header">
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i
                                        class="icon-bars">
                                    </i></a><a href="{{ route('home') }}" class="navbar-brand">
                                    <div class="brand-text d-none d-md-inline-block"><strong
                                            class="text-primary">Empact</strong></div>
                                </a></div>
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                <!-- Notifications dropdown-->
                                <navbar-dropdown icon="fa fa-bell" notification="10" notification_color="success">
                                    <navbar-item icon="fa fa-layer-group" notification="Hello" time="Hace 6 minutos"></navbar-item>
                                    <navbar-action-item icon="fa fa-envelope" header="Ver todos las notificaciones"></navbar-action-item>
                                </navbar-dropdown>

                                <navbar-dropdown icon="fa fa-envelope" notification="4" notification_color="warning">
                                    <navbar-layered-item image="{{ asset('img/avatar-1.jpg') }}" header="Jason Doe" notification="Reportó horas" details="Hace 3 días a las 7:58 pm - 10.06.2019"></navbar-layered-item>
                                    <navbar-action-item icon="fa fa-envelope" header="Ver todos las notificaciones"></navbar-action-item>
                                </navbar-dropdown>

                                <!-- Languages dropdown    -->
                                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="nav-link language dropdown-toggle"><i
                                            class="fas fa-layer-group"></i><span
                                            class="d-none d-sm-inline-block">Ambientes</span></a>
                                    <ul aria-labelledby="languages" class="dropdown-menu">
                                        @if(!empty($environments))
                                        @foreach($environments as $environment)
                                        <li><a rel="nofollow" href="{{url('entironment_v2/'.$environment->id)}}"
                                                class="dropdown-item"><span>{{$environment->title}}</span></a></li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </li>
                                <!-- Log out-->
                                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link logout"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"> <span
                                            class="d-none d-sm-inline-block">Cerrar sesión</span><i
                                            class="fa fa-sign-out-alt"></i></a>
                                </li>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content');

            <footer class="main-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Empact &copy; 2019</p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard"
                                    class="external">Bootstrapious</a></p>
                            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!-- JavaScript files-->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/charts-home.js') }}"></script>

    <!-- Main File-->
    <script src="{{ asset('js/front.js') }}"></script>

</body>

</html>
