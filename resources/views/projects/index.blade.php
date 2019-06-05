@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ambientes</div>

                <div class="card-body">
                    @foreach ($reports as $report)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                <strong>{{$report->url}}</strong>
                                </div>
                            </div>
                            <div>
                                <h3 class="mt-0"><a href="{{ $report->url }}">{{ $report->title }}</a></h3>
                                <p class="lead">
Created
                                <!--small class="text-muted">{{ $report}}</small-->
                                </p>
                                {{ str_limit($report->description, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                        {{ $reports->links() }}
                </div>
            </div>

            <div class="card">
                    <div class="card-header">Projectos</div>

                    <div class="card-body">
                        @foreach ($projects as $project)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                </div>
                                <div>
                                    <h3 class="mt-0"><a href="{{ $project->url }}">{{ $project->title }}</a></h3>
                                    <p class="lead">
    Created
                                    <!--small class="text-muted">{{ $project}}</small-->
                                    </p>
                                    {{ str_limit($project->description, 250) }}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                            {{ $projects->links() }}
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
