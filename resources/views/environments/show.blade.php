@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{$environment->title}}</h2>
            <p>{{ str_limit($environment->description, 100) }}</p>

            <diV class="align-right">
                    <a class="btn btn-primary" href="{{url('environment/create')}}" role="button">Manejar empleados</a>
                    <a class="btn btn-outline-primary" href="#" role="button">Ver acividad</a>
            </div>

            <br>

            <div class="card">
                    <div class="card-header">Credenciales</div>

                    <div class="card-body">
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                </div>
                                <div>
                                    <p class="lead">Código: {{ $environment->code }}</p>
                                    <p >
                                            Contraseña: {{ $environment->password }}
                                    </p>

                                </div>
                            </div>
                    </div>
                </div>

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
Created
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
                    <a class="btn btn-primary" href="{{url('project/create')}}" role="button">Crear proyecto</a>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                    <div class="card-header">Reportes</div>

                    <div class="card-body">
                        @foreach ($projects as $project)
                            @foreach ($project->reports as $report)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                </div>
                                <div>
                                <h3 class="mt-0"><a href="">{{ $report->user->name}}</a></h3>
                                    <p class="lead">
    Created
                                    <!--small class="text-muted">{{ $report}}</small-->
                                    </p>
                                    {{ str_limit($report->created_at, 250) }}
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        @endforeach

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
