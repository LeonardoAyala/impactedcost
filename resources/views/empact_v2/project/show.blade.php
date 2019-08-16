@extends('layouts.v2')

@section('content')

<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <breadcrumb-item link="{{ route('home') }}" header="Home"></breadcrumb-item>
            <breadcrumb-item header="Ambiente"></breadcrumb-item>
        <breadcrumb-item header="{{ $environment_id }}"></breadcrumb-item>
            <breadcrumb-item header="Proyecto"></breadcrumb-item>
            <breadcrumb-item header="1"></breadcrumb-item>
        </ul>
    </div>
    <ul class="nav nav-tabs justify-content-center">
        <tab-item link="#" header="Notificaciones" active="true"></tab-item>
        <tab-item link="#" header="Notificaciones"></tab-item>
    </ul>
</div>

<!-- Counts Section -->
<section-component classes="dashboard-counts section-padding">
    <!-- Count item widget-->
    <widget-count header="Colabo- radores" time="Últimos 7 días" number="05" icon="far fa-user"></widget-count>
    <widget-count header="Procesos activos" time="En total" number="10" icon="icon-padnote"></widget-count>
    <widget-count header="Nuevos Reportes" time="Últimos 7 días" number="04" icon="icon-check"></widget-count>
    <widget-count header="Horas útiles" time="Último més" number="07" icon="icon-bill"></widget-count>
    <widget-count header="Presu- puesto" time="En horas" number="92" icon="icon-list"></widget-count>
    <widget-count header="Produc- tividad" time="En total" number="70%" icon="icon-list-1"></widget-count>
</section-component>

<section-component classes="forms">
    <!-- Modal-->
    <modal-component header="Modal" description="Lorem ipsum." object_id="addEnv">
        <modal-body description="Lorem ipsum">
            <form>
                <input-item header="Nombre" type="text" placeholder="Nombre" classes="form-control"></input-item>
                <input-item header="Descripción" type="text-area" placeholder="Descripción corta"
                    classes="form-control"></input-item>

                <input-item type="submit" btn_header="Crear ambiente" classes="btn btn-primary">
                </input-item>
            </form>
        </modal-body>
        <modal-footer>
            <button-item header="Cerrar" dismiss="modal" btn_color="secondary"></button-item>
            <button-item header="Guardar cambios" dismiss="modal" btn_color="primary"></button-item>
        </modal-footer>
    </modal-component>
</section-component>

<!--Node Section-->
<section-component classes="">
    <project-lister environment_id="{{ $environment_id }}">

    </project-lister>
    <div class="col-lg-6 col-md-6">
        <!-- Daily Feed Widget-->
        <div id="daily-feeds" class="card updates daily-feeds">
            <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box"
                        aria-expanded="true" aria-controls="feeds-box">Reportes recientes</a></h2>
                <div class="right-column">
                    <div class="badge badge-primary">10 messages</div>
                    <a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true"
                        aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                </div>
            </div>
            <div id="feeds-box" role="tabpanel" class="collapse show">
                <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                        <!-- List-->
                        <li class="clearfix">
                            <div class="feed d-flex justify-content-between">
                                <div class="feed-body d-flex justify-content-between"><a href="#"
                                        class="feed-profile"><img src="img/avatar-5.jpg" alt="person"
                                            class="img-fluid rounded-circle"></a>
                                    <div class="content">
                                        <strong>Aria Smith</strong>
                                        <small>Posted a new blog </small>
                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>

                                    </div>

                                </div>
                                <div class="date"><small>5min ago</small></div>
                            </div>
                        </li>
                        <!-- List-->
                        <li class="clearfix">
                            <div class="feed d-flex justify-content-between">
                                <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile">
                                        <img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                                    <div class="content"><strong>Frank Williams</strong>
                                        <small>Posted a new blog </small>
                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>

                                        <div class="CTAs"><a href="#" class="btn btn-xs btn-dark"><i
                                                    class="fa fa-thumbs-up"> </i>Like</a><a href="#"
                                                class="btn btn-xs btn-dark"><i class="fa fa-heart"> </i>Love</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                    <div class="date"><small>5min ago</small></div>
                                </div>
                            </div>
                        </li>
                        <!-- List-->
                        <li class="clearfix">
                            <div class="feed d-flex justify-content-between">
                                <div class="feed-body d-flex justify-content-between"><a href="#"
                                        class="feed-profile"><img src="img/avatar-3.jpg" alt="person"
                                            class="img-fluid rounded-circle"></a>
                                    <div class="content"><strong>Ashley Wood</strong><small>Posted a new blog
                                        </small>
                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                    </div>
                                </div>
                                <div class="date"><small>5min ago</small></div>
                            </div>
                        </li>
                        <!-- List-->
                        <li class="clearfix">
                            <div class="feed d-flex justify-content-between">
                                <div class="feed-body d-flex justify-content-between"><a href="#"
                                        class="feed-profile"><img src="img/avatar-1.jpg" alt="person"
                                            class="img-fluid rounded-circle"></a>
                                    <div class="content"><strong>Jason Doe</strong><small>Posted a new blog
                                        </small>
                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                    </div>
                                </div>

                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span>
                                    </div>
                                    <div class="date"><small>5min ago</small>
                                        <a data-toggle="collapse" data-target="#comment" aria-expanded="true"
                                            aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="message-card collapse" id="comment">
                                <small>Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                    the 1500s. Over the years, sometimes by accident, sometimes on purpose
                                    (injected humour and the like).</small>
                                <div class="CTAs pull-right">
                                    <a href="#" class="btn btn-xs btn-dark"><i class="fa fa-eye"> </i>Ver</a>
                                    <a href="#" class="btn btn-xs btn-dark"><i class="fa fa-cog"> </i>Op.</a>
                                </div>
                            </div>


                        </li>
                        <!-- List-->
                        <li class="clearfix">
                            <div class="feed d-flex justify-content-between">
                                <div class="feed-body d-flex justify-content-between"><a href="#"
                                        class="feed-profile"><img src="img/avatar-6.jpg" alt="person"
                                            class="img-fluid rounded-circle"></a>
                                    <div class="content"><strong>Sam Martinez</strong><small>Posted a new blog
                                        </small>
                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                    </div>
                                </div>
                                <div class="date"><small>5min ago</small></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Daily Feed Widget End-->
    </div>
</section-component>

<!-- Header Section-->
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">
            <!-- To Do List-->
            <div class="col-lg-3 col-md-6">
                <div class="card to-do">
                    <h2 class="display h4">To do List</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <ul class="check-lists list-unstyled">
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-1" name="list-1" class="form-control-custom">
                            <label for="list-1">Similique sunt in culpa qui officia</label>
                        </li>
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-2" name="list-2" class="form-control-custom">
                            <label for="list-2">Ed ut perspiciatis unde omnis iste</label>
                        </li>
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-3" name="list-3" class="form-control-custom">
                            <label for="list-3">At vero eos et accusamus et iusto </label>
                        </li>
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-4" name="list-4" class="form-control-custom">
                            <label for="list-4">Explicabo Nemo ipsam voluptatem</label>
                        </li>
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-5" name="list-5" class="form-control-custom">
                            <label for="list-5">Similique sunt in culpa qui officia</label>
                        </li>
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-6" name="list-6" class="form-control-custom">
                            <label for="list-6">At vero eos et accusamus et iusto </label>
                        </li>
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-7" name="list-7" class="form-control-custom">
                            <label for="list-7">Similique sunt in culpa qui officia</label>
                        </li>
                        <li class="d-flex align-items-center">
                            <input type="checkbox" id="list-8" name="list-8" class="form-control-custom">
                            <label for="list-8">Ed ut perspiciatis unde omnis iste</label>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Pie Chart-->
            <div class="col-lg-3 col-md-6">
                <div class="card project-progress">
                    <h2 class="display h4">Project Beta progress</h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="pie-chart">
                        <canvas id="pieChart" width="300" height="300"> </canvas>
                    </div>
                </div>
            </div>
            <!-- Line Chart -->
            <div class="col-lg-6 col-md-12 flex-lg-last flex-md-first align-self-baseline">
                <div class="card sales-report">
                    <h2 class="display h4">Sales marketing report</h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet officiis</p>
                    <div class="line-chart">
                        <canvas id="lineCahrt"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Statistics Section-->
<section class="statistics">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-4">
                <!-- Income-->
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number">126,418</div><strong class="text-primary">All Income</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Monthly Usage-->
                <div class="card data-usage">
                    <h2 class="display h4">Monthly Usage</h2>
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-6">
                            <div id="progress-circle" class="d-flex align-items-center justify-content-center"></div>
                        </div>
                        <div class="col-sm-6"><strong class="text-primary">80.56 Gb</strong><small>Current
                                Plan</small><span>100 Gb Monthly</span></div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- User Actibity-->
                <div class="card user-activity">
                    <h2 class="display h4">User Activity</h2>
                    <div class="number">210</div>
                    <h3 class="h4 display">Social Users</h3>
                    <div class="progress">
                        <div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>
                    </div>
                    <div class="page-statistics d-flex justify-content-between">
                        <div class="page-statistics-left"><span>Pages Visits</span><strong>230</strong></div>
                        <div class="page-statistics-right"><span>New Visits</span><strong>73.4%</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Updates Section -->
<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <!-- Recent Updates Widget          -->
                <div id="new-updates" class="card updates recent-updated">
                    <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 display"><a data-toggle="collapse" data-parent="#new-updates" href="#updates-box"
                                aria-expanded="true" aria-controls="updates-box">News Updates</a></h2><a
                            data-toggle="collapse" data-parent="#new-updates" href="#updates-box" aria-expanded="true"
                            aria-controls="updates-box"><i class="fa fa-angle-down"></i></a>
                    </div>
                    <div id="updates-box" role="tabpanel" class="collapse show">
                        <ul class="news list-unstyled">
                            <!-- Item-->
                            <li class="d-flex justify-content-between">
                                <div class="left-col d-flex">
                                    <div class="icon"><i class="icon-rss-feed"></i></div>
                                    <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor.</p>
                                    </div>
                                </div>
                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li class="d-flex justify-content-between">
                                <div class="left-col d-flex">
                                    <div class="icon"><i class="icon-rss-feed"></i></div>
                                    <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor.</p>
                                    </div>
                                </div>
                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li class="d-flex justify-content-between">
                                <div class="left-col d-flex">
                                    <div class="icon"><i class="icon-rss-feed"></i></div>
                                    <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor.</p>
                                    </div>
                                </div>
                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li class="d-flex justify-content-between">
                                <div class="left-col d-flex">
                                    <div class="icon"><i class="icon-rss-feed"></i></div>
                                    <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor.</p>
                                    </div>
                                </div>
                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li class="d-flex justify-content-between">
                                <div class="left-col d-flex">
                                    <div class="icon"><i class="icon-rss-feed"></i></div>
                                    <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor.</p>
                                    </div>
                                </div>
                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li class="d-flex justify-content-between">
                                <div class="left-col d-flex">
                                    <div class="icon"><i class="icon-rss-feed"></i></div>
                                    <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor.</p>
                                    </div>
                                </div>
                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Recent Updates Widget End-->
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Daily Feed Widget-->
                <div id="daily-feeds" class="card updates daily-feeds">
                    <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box"
                                aria-expanded="true" aria-controls="feeds-box">Your daily Feeds </a></h2>
                        <div class="right-column">
                            <div class="badge badge-primary">10 messages</div><a data-toggle="collapse"
                                data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true"
                                aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="feeds-box" role="tabpanel" class="collapse show">
                        <div class="feed-box">
                            <ul class="feed-elements list-unstyled">
                                <!-- List-->
                                <li class="clearfix">
                                    <div class="feed d-flex justify-content-between">
                                        <div class="feed-body d-flex justify-content-between"><a href="#"
                                                class="feed-profile"><img src="img/avatar-5.jpg" alt="person"
                                                    class="img-fluid rounded-circle"></a>
                                            <div class="content"><strong>Aria Smith</strong><small>Posted a new blog
                                                </small>
                                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                            </div>
                                        </div>
                                        <div class="date"><small>5min ago</small></div>
                                    </div>
                                </li>
                                <!-- List-->
                                <li class="clearfix">
                                    <div class="feed d-flex justify-content-between">
                                        <div class="feed-body d-flex justify-content-between"><a href="#"
                                                class="feed-profile"><img src="img/avatar-2.jpg" alt="person"
                                                    class="img-fluid rounded-circle"></a>
                                            <div class="content"><strong>Frank Williams</strong><small>Posted a new blog
                                                </small>
                                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                                <div class="CTAs"><a href="#" class="btn btn-xs btn-dark"><i
                                                            class="fa fa-thumbs-up"> </i>Like</a><a href="#"
                                                        class="btn btn-xs btn-dark"><i class="fa fa-heart"> </i>Love</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date"><small>5min ago</small></div>
                                    </div>
                                </li>
                                <!-- List-->
                                <li class="clearfix">
                                    <div class="feed d-flex justify-content-between">
                                        <div class="feed-body d-flex justify-content-between"><a href="#"
                                                class="feed-profile"><img src="img/avatar-3.jpg" alt="person"
                                                    class="img-fluid rounded-circle"></a>
                                            <div class="content"><strong>Ashley Wood</strong><small>Posted a new blog
                                                </small>
                                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                            </div>
                                        </div>
                                        <div class="date"><small>5min ago</small></div>
                                    </div>
                                </li>
                                <!-- List-->
                                <li class="clearfix">
                                    <div class="feed d-flex justify-content-between">
                                        <div class="feed-body d-flex justify-content-between"><a href="#"
                                                class="feed-profile"><img src="img/avatar-1.jpg" alt="person"
                                                    class="img-fluid rounded-circle"></a>
                                            <div class="content"><strong>Jason Doe</strong><small>Posted a new blog
                                                </small>
                                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                            </div>
                                        </div>
                                        <div class="date"><small>5min ago</small></div>
                                    </div>
                                    <div class="message-card"> <small>Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the 1500s. Over the years, sometimes by accident, sometimes
                                            on purpose (injected humour and the like).</small></div>
                                    <div class="CTAs pull-right"><a href="#" class="btn btn-xs btn-dark"><i
                                                class="fa fa-thumbs-up"> </i>Like</a></div>
                                </li>
                                <!-- List-->
                                <li class="clearfix">
                                    <div class="feed d-flex justify-content-between">
                                        <div class="feed-body d-flex justify-content-between"><a href="#"
                                                class="feed-profile"><img src="img/avatar-6.jpg" alt="person"
                                                    class="img-fluid rounded-circle"></a>
                                            <div class="content"><strong>Sam Martinez</strong><small>Posted a new blog
                                                </small>
                                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                            </div>
                                        </div>
                                        <div class="date"><small>5min ago</small></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Daily Feed Widget End-->
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Recent Activities Widget      -->
                <div id="recent-activities-wrapper" class="card updates activities">
                    <div id="activites-header" class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 display"><a data-toggle="collapse" data-parent="#recent-activities-wrapper"
                                href="#activities-box" aria-expanded="true" aria-controls="activities-box">Recent
                                Activities</a></h2><a data-toggle="collapse" data-parent="#recent-activities-wrapper"
                            href="#activities-box" aria-expanded="true" aria-controls="activities-box"><i
                                class="fa fa-angle-down"></i></a>
                    </div>
                    <div id="activities-box" role="tabpanel" class="collapse show">
                        <ul class="activities list-unstyled">
                            <!-- Item-->
                            <li>
                                <div class="row">
                                    <div class="col-4 date-holder text-right">
                                        <div class="icon"><i class="icon-clock"></i></div>
                                        <div class="date"> <span>6:00 am</span><span class="text-info">6 hours
                                                ago</span></div>
                                    </div>
                                    <div class="col-8 content"><strong>Meeting</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud. </p>
                                    </div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li>
                                <div class="row">
                                    <div class="col-4 date-holder text-right">
                                        <div class="icon"><i class="icon-clock"></i></div>
                                        <div class="date"> <span>6:00 am</span><span class="text-info">6 hours
                                                ago</span></div>
                                    </div>
                                    <div class="col-8 content"><strong>Meeting</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud. </p>
                                    </div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li>
                                <div class="row">
                                    <div class="col-4 date-holder text-right">
                                        <div class="icon"><i class="icon-clock"></i></div>
                                        <div class="date"> <span>6:00 am</span><span class="text-info">6 hours
                                                ago</span></div>
                                    </div>
                                    <div class="col-8 content"><strong>Meeting</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud. </p>
                                    </div>
                                </div>
                            </li>
                            <!-- Item-->
                            <li>
                                <div class="row">
                                    <div class="col-4 date-holder text-right">
                                        <div class="icon"><i class="icon-clock"></i></div>
                                        <div class="date"> <span>6:00 am</span><span class="text-info">6 hours
                                                ago</span></div>
                                    </div>
                                    <div class="col-8 content"><strong>Meeting</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud. </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
