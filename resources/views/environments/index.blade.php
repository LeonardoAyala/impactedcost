@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Environments</div>

                <div class="card-body">
                    @foreach ($environments as $environment)
                        <div class="media">
                            <div>
                                <h3 class="nt-0">{{ $environment->title }}</h3>
                                {{ str_limit($environment->description, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
