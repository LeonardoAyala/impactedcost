@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ambientes</div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
