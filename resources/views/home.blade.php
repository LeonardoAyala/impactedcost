@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if(!$environments->isEmpty())
                    @foreach ($environments as $environment)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                        </div>
                        <div>
                            <h3 class="mt-0"><a href="{{ $environment->url }}">{{ $environment->title }}</a></h3>
                            <p class="lead">
                                Created
                                <!--small class="text-muted">{{ $environment}}</small-->
                            </p>
                            {{ str_limit($environment->description, 250) }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    {{ $environments->links() }}
                    @else
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    No hay ambientes disponibles.
                    <hr>
                    @endif
                    <diV class="align-right">
                        <a class="btn btn-primary" href="{{url('environment/create')}}" role="button">Crear ambiente</a>
                        <a class="btn btn-outline-primary" href="{{url('join/create')}}" role="button">Unirse a ambiente</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
