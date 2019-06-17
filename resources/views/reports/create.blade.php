@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reporte semanal</div>

                <div class="card">
                    <div class="card-header">Lunes</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="proj_table">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Horas</th>
                                        <th class="text-center" width="130">
                                            <a href="#" class="create-modal-project btn btn-success btn-sm">
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







                {{-- Modal Form Create Project --}}
                <div id="create-project" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form">

                                    <div class="form-group row">
                                        <label for="saturday_project"
                                            class="col-md-3 col-form-label text-md-right">Proyecto</label>

                                        <div class="col-md-7">
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
                                    </div>
                                    <div class="form-group row">
                                        <label for="saturday_project"
                                            class="col-md-3 col-form-label text-md-right">Horas</label>

                                        <div class="col-md-7">
                                            <input type="number" max="24" min="0" name="saturday_hours" value="0"
                                                id="saturday_hours"
                                                class="form-control @error('saturday_hours') is-invalid @enderror"
                                                name="saturday_hours" value="{{ old('saturday_hours') }}"
                                                autocomplete="saturday_hours">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control" id="cProj_environmentId"
                                                value="{{$environment->id}}">
                                        </div>
                                    </div>

                                </form>
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











            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).on('click', '.create-modal-project', function () {
        $('#create-project').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Crear proyecto');
    });
    $("#add").click(function () {
        $.ajax({
            type: 'POST',
            url: 'addProject',
            data: {
                '_token': $('input[name=_token]').val(),
                'environment_id': $('#cProj_environmentId').val(),
                'title': $('#cProj_title').val(),
                'description': $('#cProj_description').val(),
                'code': $('#cProj_code').val(),
                'initial_date': $('#cProj_initialDate').val()
            },
            success: function (data) {
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.description);
                } else {
                    $('.error').remove();
                    $('#proj_table').append("<tr class='project" + data.project.id + "'>" +
                        "<td>" + data.project.code + "</td>" +
                        "<td><a href='" + data.url + "'>" + data.project.title +
                        "</a></td>" +
                        "<td>" + data.project.description + "</td>" +
                        "<td>" + data.project.initial_date + "</td>" +
                        "<td><button class='show-modal-project btn btn-info btn-sm' data-id='" +
                        data.project.id + "' data-code='" + data.project.code +
                        "' data-title='" + data.project.title +
                        "' data-description='" + data.project.description +
                        "' data-initialdate='" + data.project.initial_date +
                        "'><span class='fa fa-eye'></span></button> " +
                        "<button class='edit-modal-project btn btn-warning btn-sm' data-id='" +
                        data.project.id + "' data-code='" + data.project.code +
                        "' data-title='" + data.project.title +
                        "' data-description='" + data.project.description +
                        "' data-initialdate='" + data.project.initial_date +
                        "'><span class='fa fa-pencil-ruler'></span></button> " +
                        "<button class='delete-modal-project btn btn-danger btn-sm' data-id='" +
                        data.project.id + "' data-code='" + data.project.code +
                        "' data-title='" + data.project.title +
                        "' data-description='" + data.project.description +
                        "' data-initialdate='" + data.project.initial_date +
                        "'><span class='fa fa-trash'></span></button></td>" +
                        "</tr>");
                }
            },
        });
        $('#cProj_title').val('');
        $('#cProj_description').val('');
        $('#cProj_code').val('');
        $('#cProj_initialDate').val('');
    });

    // function Edit POST
    $(document).on('click', '.edit-modal-project', function () {
        $('#footer_action_button').text("Editar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').removeClass('btn-outline-primary');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Editar proyecto');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#eProj_id').val($(this).data('id'));
        $('#eProj_title').val($(this).data('title'));
        $('#eProj_description').val($(this).data('description'));
        $('#eProj_code').val($(this).data('code'));
        $('#eProj_initialdate').val($(this).data('initialdate'));
        $('#editdelete-project').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function () {
        $.ajax({
            type: 'POST',
            url: 'editProject',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#eProj_id").val(),
                'title': $('#eProj_title').val(),
                'description': $('#eProj_description').val(),
                'code': $('#eProj_code').val(),
                'initial_date': $('#eProj_initialdate').val()
            },
            success: function (data) {

                $('.project' + data.project.id).replaceWith(" " +
                    "<tr class='project" + data.project.id + "'>" +
                    "<td>" + data.project.code + "</td>" +
                    "<td><a href='" + data.url + "'>" + data.project.title + "</a></td>" +
                    "<td>" + data.project.description + "</td>" +
                    "<td>" + data.project.initial_date + "</td>" +
                    "<td><button class='show-modal-project btn btn-info btn-sm' data-id='" +
                    data.project.id + "' data-code='" + data.project.code +
                    "' data-title='" + data.project.title +
                    "' data-description='" + data.project.description +
                    "' data-initialdate='" + data.project.initial_date +
                    "'><span class='fa fa-eye'></span></button> " +
                    "<button class='edit-modal-project btn btn-warning btn-sm' data-id='" +
                    data.project.id + "' data-code='" + data.project.code +
                    "' data-title='" + data.project.title +
                    "' data-description='" + data.project.description +
                    "' data-initialdate='" + data.project.initial_date +
                    "'><span class='fa fa-pencil-ruler'></span></button> " +
                    "<button class='delete-modal-project btn btn-danger btn-sm' data-id='" +
                    data.project.id + "' data-code='" + data.project.code +
                    "' data-title='" + data.project.title +
                    "' data-description='" + data.project.description +
                    "' data-initialdate='" + data.project.initial_date +
                    "'><span class='fa fa-trash'></span></button></td>" +
                    "</tr>");
            }
        });
    });

    // form Delete function
    $(document).on('click', '.delete-modal-project', function () {
        $('#footer_action_button').text("Eliminar");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Eliminar proyecto');
        $('#eProj_id').val($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('title'));
        $('#editdelete-project').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function () {
        $.ajax({
            type: 'POST',
            url: 'deleteProject',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#eProj_id").val(),
            },
            success: function (data) {
                $('.project' + $('#eProj_id').val()).remove();
            }
        });
    });

    // Show function
    $(document).on('click', '.show-modal', function () {
        $('#show').modal('show');
        $('#s_id').text($(this).data('id'));
        $('#s_project').text($(this).data('project'));
        $('#s_hours').text($(this).data('hours'));
        $('#s_initialdate').text($(this).data('initialdate'));
        $('.modal-title').text('Información');
    });


</script>
@endsection
