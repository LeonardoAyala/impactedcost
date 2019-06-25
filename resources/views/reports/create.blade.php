@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">Reporte semanal</div>

                <br>

                <form method="POST" action="{{ url('environment/'.$environment->id.'/report') }}" id="report_form">
                    {{csrf_field()}}

                    <input type="hidden" id="reportId" name="report_id" value="{{$report->id}}">

                    <div class="form-group row">
                        <label for="date" class="col-md-2 col-form-label text-md-right">Semana</label>

                        <div class="col-md-6">
                            <input id="date" type="text" class="week-picker @error('date') is-invalid @enderror" name="date"
                                value="{{ old('date') }}" required autocomplete="off">

                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </form>

                <div class="card date_required card_day0">
                    <div class="card-header">Lunes</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="table_0">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="90">
                                            <a href="#" class="create-modal btn btn-success btn-sm" data-title="Lunes"
                                                data-index="0">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    {{ csrf_field() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card date_required card_day1">
                    <div class="card-header">Martes</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="table_1">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="90">
                                            <a href="#" class="create-modal btn btn-success btn-sm" data-title="Martes"
                                                data-index="1">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    {{ csrf_field() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card date_required card_day2">
                    <div class="card-header">Miércoles</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="table_2">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="90">
                                            <a href="#" class="create-modal btn btn-success btn-sm"
                                                data-title="Miércoles" data-index="2">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    {{ csrf_field() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card date_required card_day3">
                    <div class="card-header">Jueves</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="table_3">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="90">
                                            <a href="#" class="create-modal btn btn-success btn-sm" data-title="Jueves"
                                                data-index="3">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    {{ csrf_field() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card date_required card_day4">
                    <div class="card-header">Viernes</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="table_4">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="90">
                                            <a href="#" class="create-modal btn btn-success btn-sm" data-title="Viernes"
                                                data-index="4">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    {{ csrf_field() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card date_required card_day5">
                    <div class="card-header">Sábado</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="table_5">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="90">
                                            <a href="#" class="create-modal btn btn-success btn-sm" data-title="Sábado"
                                                data-index="5">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    {{ csrf_field() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card date_required card_day6">
                    <div class="card-header">Domingo</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="table_6">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="90">
                                            <a href="#" class="create-modal btn btn-success btn-sm" data-title="Domingo"
                                                data-index="6">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    {{ csrf_field() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <button type="submit" class="btn btn-primary date_required card_day7" id="submit_report">
                        Subir reporte
                </button>

                <br>

                {{-- Modal Form Create Project --}}
                <div id="create-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form">

                                    <input type="hidden" id="dayindex" class="dayindex">
                                    <input type="hidden" id="dayId" class="dayId">

                                    <div class="form-group row">
                                        <label for="saturday_project"
                                            class="col-md-3 col-form-label text-md-right">Proyecto</label>

                                        <div class="col-md-7">
                                            <select id="projectId"
                                                class=" form-control @error('saturday_project') is-invalid @enderror"
                                                name="saturday_project" value="{{ old('saturday_project') }}">
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
                                    </div>
                                    <div class="form-group row">
                                        <label for="saturday_project"
                                            class="col-md-3 col-form-label text-md-right">Horas</label>

                                        <div class="col-md-7">
                                            <input type="number" max="24" min="0" name="saturday_hours" value="0"
                                                id="hours"
                                                class=" form-control @error('saturday_hours') is-invalid @enderror"
                                                name="saturday_hours" value="{{ old('saturday_hours') }}"
                                                autocomplete="saturday_hours">

                                            </select>
                                        </div>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit" id="add">
                                    Crear
                                </button>
                                <button class="btn btn-outline-primary" type="button" data-dismiss="modal">
                                    <span class="fas fa-remove"></span>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>





                {{-- Modal Form Edit and Delete Post --}}
                <div id="edit-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="modal">

                                    <div class="form-group row">
                                        <label for="saturday_project"
                                            class="col-md-3 col-form-label text-md-right">Proyecto</label>

                                        <div class="col-md-7">
                                            <select id="projectId"
                                                class="projectId form-control @error('saturday_project') is-invalid @enderror"
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
                                    </div>
                                    <div class="form-group row">
                                        <label for="saturday_project"
                                            class="col-md-3 col-form-label text-md-right">Horas</label>

                                        <div class="col-md-7">
                                            <input type="number" max="24" min="0" name="saturday_hours" value="0"
                                                id="hours"
                                                class=" hours form-control @error('saturday_hours') is-invalid @enderror"
                                                name="saturday_hours" value="{{ old('saturday_hours') }}"
                                                autocomplete="saturday_hours">

                                            </select>
                                        </div>
                                    </div>




                                </form>
                                {{-- Form Delete Post --}}
                                <div class="deleteContent">
                                    ¿Seguro que quiere eliminar a <span class="title"></span> del ambiente?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn actionBtn" data-dismiss="modal">
                                    <span id="footer_action_button" class="glyphicon"></span>
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class="glyphicon glyphicon"></span>Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>











            </div>
            <form>

        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

$(document).on('click', '#submit_report', function () {
    $("#report_form").submit();
    });

    $(document).ready(function () {
        $('.date_required').hide();
    });

    $('#date').change(function () {

        $('.date_required').hide();

        $.ajax({
            type: 'POST',
            url: 'selectDay',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.dayId').val(),
                'project_id': $('.projectId').val(),
                'initial_date': $('#date').val(),
            },
            success: function (data) {
                if ((data.errors))
                {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.body);
                }
                else
                {
                    $('.date_required').show();
                }

            }
        });


    });

    $(document).on('click', '.create-modal', function () {
        $('#create-modal').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text($(this).data('title'));
        $('#dayindex').val($(this).data('index'));
    });
    $("#add").click(function () {
        $.ajax({
            type: 'POST',
            url: 'addDay',
            data: {
                '_token': $('input[name=_token]').val(),
                'index': $('#dayindex').val(),
                'initial_date': $('#date').val(),
                'project_id': $('#projectId').val(),
                'hours': $('#hours').val(),
                'report_id': $('#reportId').val()
            },
            success: function (data) {
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.description);
                } else {
                    $('.error').remove();
                    var index = '#table_' + data.index.toString();
                    $(index).append("<tr class='day" + data.day.id + "'>" +
                        "<td>" + data.day.date + "</td>" +
                        "<td>" + data.project.title + "</td>" +
                        "<td>" + data.day.hours + "</td>" +
                        "<td>" +
                        "<button class='edit-modal btn btn-warning btn-sm'" +
                        " data-id='" + data.day.id +
                        "' data-project='" + data.day.project_id +
                        "' data-hours='" + data.day.hours +
                        "' data-date='" + data.day.date +
                        "' data-index='" + data.index +
                        "'><span class='fa fa-pencil-ruler'></span></button> " +
                        "<button class='delete-modal btn btn-danger btn-sm'" +
                        " data-id='" + data.day.id +
                        "' data-project='" + data.day.project_id +
                        "' data-hours='" + data.day.hours +
                        "' data-date='" + data.day.date +
                        "' data-index='" + data.index +
                        "'><span class='fa fa-trash'></span></button></td>" +
                        "</tr>");
                }
            },
        });
        $('#projectId').val(0);
        $('#hours').val('');
        $('#create-modal').modal('hide');
    });

    // function Edit POST
    $(document).on('click', '.edit-modal', function () {
        $('#footer_action_button').text("Editar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').removeClass('btn-outline-primary');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Editar proyecto');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('.projectId').val($(this).data('project'));
        $('.hours').val($(this).data('hours'));
        $('.dayindex').val($(this).data('index'));
        $('.dayId').val($(this).data('id'));
        $('#edit-modal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function () {
        $.ajax({
            type: 'POST',
            url: 'editDay',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.dayId').val(),
                'project_id': $('.projectId').val(),
                'index': $('.dayindex').val(),
                'hours': $('.hours').val(),
                'initial_date': $('#date').val(),
            },
            success: function (data) {
                $('.day' + data.day.id).replaceWith(
                    "<tr class='day" + data.day.id + "'>" +
                    "<td>" + data.day.date + "</td>" +
                    "<td>" + data.project.title + "</td>" +
                    "<td>" + data.day.hours + "</td>" +
                    "<td>" +
                    "<button class='edit-modal btn btn-warning btn-sm'" +
                    " data-id='" + data.day.id +
                    "' data-project='" + data.day.project_id +
                    "' data-hours='" + data.day.hours +
                    "' data-date='" + data.day.date +
                    "' data-index='" + data.index +
                    "'><span class='fa fa-pencil-ruler'></span></button> " +
                    "<button class='delete-modal btn btn-danger btn-sm'" +
                    " data-id='" + data.day.id +
                    "' data-project='" + data.day.project_id +
                    "' data-hours='" + data.day.hours +
                    "' data-date='" + data.day.date +
                    "' data-index='" + data.index +
                    "'><span class='fa fa-trash'></span></button></td>" +
                    "</tr>");
            }
        });
    });

    // form Delete function
    $(document).on('click', '.delete-modal', function () {
        $.ajax({
            type: 'POST',
            url: 'deleteDay',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).data('id'),
            },
            success: function (data) {
                $('.day' + data.day.id).remove();
            }
        });

    });

</script>
@endsection
