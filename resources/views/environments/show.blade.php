@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{$environment->title}}</h2>
            <p>{{ str_limit($environment->description, 100) }}</p>

            <diV class="align-right">
                @if( Auth::User()->id === $environment->user_id)
                <a class="btn btn-primary" href="{{url('environment/create')}}" role="button">Manejar empleados</a>
                <a class="btn btn-outline-primary" href="#" role="button">Ver acividad</a>
                @endif
            </div>

            <br>

            @if( Auth::User()->id === $environment->user_id)
            <div class="card">
                <div class="card-header">Credenciales</div>

                <div class="card-body">
                    <div class="media">
                        <div class="d-flex flex-column counters">
                        </div>
                        <div>
                            <p class="lead">Código: {{ $environment->code }}</p>
                            <p>
                                Contraseña: {{ $environment->password }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            @endif

            <br>

            <div class="card">
                <div class="card-header">Proyectos</div>

                <div class="card-body">
                    @if(!$projects->isEmpty())
                    @foreach ($projects as $project)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                        </div>
                        <div>
                            <h3 class="mt-0"><a href="">{{ $project->title }}</a></h3>
                            <p class="lead">
                                Fecha de inicio {{ $project->date}}
                                <!--small class="text-muted">{{ $project }}</small-->
                            </p>
                            {{ str_limit($project->description, 250) }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    {{ $projects->links() }}
                    @else
                    No hay proyectos disponibles.
                    <hr>
                    @endif
                    <diV class="align-right">
                        <a class="btn btn-primary" href="{{url('environment/'.$environment->id.'/project/create')}}"
                            role="button">Crear proyecto</a>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header">Reportes</div>

                <div class="card-body">

                    @if(!$reports->isEmpty())
                    @foreach ($reports as $report)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                        </div>
                        <div>
                            <h3 class="mt-0"><a href="">{{ $report->user->name}}</a></h3>
                            <p class="lead">
                                Reportado el {{ $report->created_at }}
                            </p>

                            @foreach ($report->days as $day)
                            <p>
                                Día: {{$day->dayweek}} {{$day->date}}
                            </p>
                            <p>
                                Horas: {{$day->hours}}
                            </p>

                            @if(isset($day->project_id))
                            <p>Proyecto: {{$day->project->title}}</p>
                            @else
                            <p>Proyecto: Sin actividad</p>
                            @endif
<hr>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    @endforeach

                    @else
                    No hay reportes disponibles.
                    <hr>
                    @endif
                    <diV class="align-right">
                        <a class="btn btn-primary" href="{{url('environment/'.$environment->id.'/report/create')}}"
                            role="button">Crear reporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
