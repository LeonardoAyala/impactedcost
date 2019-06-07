@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reporte semanal</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('environment/'.$environment->id.'/report') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="date" class="col-md-2 col-form-label text-md-right">Semana</label>

                            <div class="col-md-6">
                                <input id="date" type="text"
                                    class="week-picker @error('date') is-invalid @enderror" name="date"
                                    value="{{ old('date') }}" required autocomplete="date">

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <h5 class="col-md-2">Lunes</h5>
                        </div>
                        <div class="form-group row">
                            <label for="monday_project" class="col-md-2 col-form-label text-md-right">Projecto</label>

                            <div class="col-md-4">
                                <select id="monday_project"
                                    class="form-control @error('monday_project') is-invalid @enderror"
                                    name="monday_project" value="{{ old('monday_project') }}"
                                    autocomplete="monday_project">
                                    <option value="0">--Elija un proyecto--</option>

                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{ $project->title }}</option>
                                    @endforeach
                                </select>

                                @error('monday_project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="monday_hours" class="col-md-2 col-form-label text-md-right">Horas</label>
                            <div class="col-md-2">
                                <input type="number" max="24" min="0" name="monday_hours" value="0" id="monday_hours"
                                    class="form-control @error('monday_hours') is-invalid @enderror" name="monday_hours"
                                    value="{{ old('monday_hours') }}" autocomplete="monday_hours">

                                @error('monday_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <h5 class="col-md-2">Martes</h5>
                        </div>
                        <div class="form-group row">
                            <label for="tuesday_project" class="col-md-2 col-form-label text-md-right">Projecto</label>

                            <div class="col-md-4">
                                <select id="tuesday_project"
                                    class="form-control @error('tuesday_project') is-invalid @enderror"
                                    name="tuesday_project" value="{{ old('tuesday_project') }}"
                                    autocomplete="tuesday_project">
                                    <option value="0">--Elija un proyecto--</option>

                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{ $project->title }}</option>
                                    @endforeach
                                </select>

                                @error('tuesday_project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="tuesday_hours" class="col-md-2 col-form-label text-md-right">Horas</label>
                            <div class="col-md-2">
                                <input type="number" max="24" min="0" name="tuesday_hours" value="0" id="tuesday_hours"
                                    class="form-control @error('tuesday_hours') is-invalid @enderror"
                                    name="tuesday_hours" value="{{ old('tuesday_hours') }}"
                                    autocomplete="tuesday_hours">

                                @error('tuesday_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <h5 class="col-md-2">Miercoles</h5>
                        </div>
                        <div class="form-group row">
                            <label for="wednesday_project"
                                class="col-md-2 col-form-label text-md-right">Projecto</label>

                            <div class="col-md-4">
                                <select id="wednesday_project"
                                    class="form-control @error('wednesday_project') is-invalid @enderror"
                                    name="wednesday_project" value="{{ old('wednesday_project') }}"
                                    autocomplete="wednesday_project">
                                    <option value="0">--Elija un proyecto--</option>

                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{ $project->title }}</option>
                                    @endforeach
                                </select>

                                @error('wednesday_project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="wednesday_hours" class="col-md-2 col-form-label text-md-right">Horas</label>
                            <div class="col-md-2">
                                <input type="number" max="24" min="0" name="wednesday_hours" value="0"
                                    id="wednesday_hours"
                                    class="form-control @error('wednesday_hours') is-invalid @enderror"
                                    name="wednesday_hours" value="{{ old('wednesday_hours') }}"
                                    autocomplete="wednesday_hours">

                                @error('wednesday_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <h5 class="col-md-2">Jueves</h5>
                        </div>
                        <div class="form-group row">
                            <label for="thursday_project" class="col-md-2 col-form-label text-md-right">Projecto</label>

                            <div class="col-md-4">
                                <select id="thursday_project"
                                    class="form-control @error('thursday_project') is-invalid @enderror"
                                    name="thursday_project" value="{{ old('thursday_project') }}"
                                    autocomplete="thursday_project">
                                    <option value="0">--Elija un proyecto--</option>

                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{ $project->title }}</option>
                                    @endforeach
                                </select>

                                @error('thursday_project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="thursday_hours" class="col-md-2 col-form-label text-md-right">Horas</label>
                            <div class="col-md-2">
                                <input type="number" max="24" min="0" name="thursday_hours" value="0"
                                    id="thursday_hours"
                                    class="form-control @error('thursday_hours') is-invalid @enderror"
                                    name="thursday_hours" value="{{ old('thursday_hours') }}"
                                    autocomplete="thursday_hours">

                                @error('thursday_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <h5 class="col-md-2">Viernes</h5>
                        </div>
                        <div class="form-group row">
                            <label for="friday_project" class="col-md-2 col-form-label text-md-right">Projecto</label>

                            <div class="col-md-4">
                                <select id="friday_project"
                                    class="form-control @error('friday_project') is-invalid @enderror"
                                    name="friday_project" value="{{ old('friday_project') }}"
                                    autocomplete="friday_project">
                                    <option value="0">--Elija un proyecto--</option>

                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{ $project->title }}</option>
                                    @endforeach
                                </select>

                                @error('friday_project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="friday_hours" class="col-md-2 col-form-label text-md-right">Horas</label>
                            <div class="col-md-2">
                                <input type="number" max="24" min="0" name="friday_hours" value="0" id="friday_hours"
                                    class="form-control @error('friday_hours') is-invalid @enderror" name="friday_hours"
                                    value="{{ old('friday_hours') }}" autocomplete="friday_hours">

                                @error('friday_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <h5 class="col-md-2">Sábado</h5>
                        </div>
                        <div class="form-group row">
                            <label for="saturday_project" class="col-md-2 col-form-label text-md-right">Projecto</label>

                            <div class="col-md-4">
                                <select id="saturday_project"
                                    class="form-control @error('saturday_project') is-invalid @enderror"
                                    name="saturday_project" value="{{ old('saturday_project') }}"
                                    autocomplete="saturday_project">
                                    <option value="0">--Elija un proyecto--</option>

                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{ $project->title }}</option>
                                    @endforeach
                                </select>

                                @error('saturday_project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="saturday_hours" class="col-md-2 col-form-label text-md-right">Horas</label>
                            <div class="col-md-2">
                                <input type="number" max="24" min="0" name="saturday_hours" value="0"
                                    id="saturday_hours"
                                    class="form-control @error('saturday_hours') is-invalid @enderror"
                                    name="saturday_hours" value="{{ old('saturday_hours') }}"
                                    autocomplete="saturday_hours">

                                @error('saturday_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>


                        <div class="form-group row">
                            <h5 class="col-md-2">Domingo</h5>
                        </div>
                        <div class="form-group row">
                            <label for="sunday_project" class="col-md-2 col-form-label text-md-right">Projecto</label>

                            <div class="col-md-4">
                                <select id="sunday_project"
                                    class="form-control @error('sunday_project') is-invalid @enderror"
                                    name="sunday_project" value="{{ old('sunday_project') }}"
                                    autocomplete="sunday_project">
                                    <option value="0">--Elija un proyecto--</option>

                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{ $project->title }}</option>
                                    @endforeach
                                </select>

                                @error('sunday_project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="sunday_hours" class="col-md-2 col-form-label text-md-right">Horas</label>
                            <div class="col-md-2">
                                <input type="number" max="24" min="0" name="sunday_hours" value="0" id="sunday_hours"
                                    class="form-control @error('sunday_hours') is-invalid @enderror" name="sunday_hours"
                                    value="{{ old('sunday_hours') }}" autocomplete="sunday_hours">

                                @error('sunday_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>


                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection
