@extends('layouts.v2')

@section('content')

<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <breadcrumb-item link="{{ route('home') }}" header="Home"></breadcrumb-item>
            <breadcrumb-item header="Ambiente"></breadcrumb-item>
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
    <report-lister environment_id="{{ $environment_id }}" photo="{{ asset('img/placeholder.png') }}">
    </report-lister>
</section-component>

<!-- Updates Section -->
<section-component classes=" mb-30px">
        <set-lister environment_id="{{ $environment_id }}"></set-lister>
        <role-lister environment_id="{{ $environment_id }}"></role-lister>
        <couser-lister environment_id="{{ $environment_id }}" photo="{{ asset('img/placeholder.png') }}"></couser-lister>
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

@endsection
