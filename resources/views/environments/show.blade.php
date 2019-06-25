@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>{{$environment->title}}</h2>
            <p>{{ str_limit($environment->description, 100) }}</p>

            <!--diV class="align-right">
                @if( Auth::User()->id === $environment->user_id)
                <a class="btn btn-primary" href="{{url('environment/create')}}" role="button">Manejar empleados</a>
                <a class="btn btn-outline-primary" href="#" role="button">Ver acividad</a>
                @endif
            </div-->

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

            <br>

            <div class="card">
                <div class="card-header">Reportes</div>

                <div class="card-body">




                        <div class="row">
                                <div class="table table-responsive">
                                    <table class="table table-bordered" id="rep_table">
                                        <tr>
                                            <th>Autor</th>
                                            <th>Reportado</th>
                                            <th>Horas totales</th>
                                            <th>% de Productividad</th>
                                            <th>Costo impactado</th>
                                            <th>Ver</th>
                                        </tr>
                                        {{ csrf_field() }}
                                        <?php  $no=1; ?>
                                        @foreach ($reports as $report)
                                        <tr class="report{{$report->id}}">
                                            <td>{{ $report->user->name}}</td>
                                            <td>{{ $report->created_read }}</td>
                                            <td>{{ $report->totalhours }}</td>
                                            <td>{{ $report->productivity }}%</td>
                                            <td>${{ $report->impactedcost }}</td>
                                            <td>
                                                <a href="#" class="show-modal-report btn btn-info btn-sm" data-id="{{$report->id}}"
                                                        data-name="{{$report->user->name}}" data-email="{{$report->totalhours}}">
                                                        <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>

                            </div>



                    <diV class="align-right">
                        <a class="btn btn-primary" href="{{url('environment/'.$environment->id.'/report/create')}}"
                            role="button">Crear reporte</a>
                    </div>
                </div>
            </div>






            <br>

            <div class="card">
                    <div class="card-header">Empleados</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="user_table">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Salario</th>
                                        <th>% de productividad</th>

                                        @if( Auth::User()->id === $environment->user_id)
                                        <th class="text-center" width="130">
                                            Opciones
                                        </th>
                                        @endif

                                    </tr>
                                    {{ csrf_field() }}
                                    <?php  $no=1; ?>
                                    @foreach ($coUsers as $coUser)
                                    <tr class="coUser{{$coUser->id}}">
                                        <td>{{ $coUser->name}}</td>
                                        <td>{{ $coUser->email}}</td>
                                        <td>{{ $coUser->salary }}</td>
                                        <td>{{ $coUser->productivity }}%</td>

                                        @if( Auth::User()->id === $environment->user_id)
                                        <td>
                                            <a href="#" class="show-modal-users btn btn-info btn-sm" data-id="{{$coUser->id}}"
                                                data-name="{{$coUser->name}}" data-email="{{$coUser->email}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="edit-modal-users btn btn-warning btn-sm" data-id="{{$coUser->id}}"
                                                    data-environmentid="{{$environment->id}}" data-name="{{$coUser->name}}"
                                                    data-email="{{$coUser->email}}" >
                                                <i class="fa fa-pencil-ruler"></i>
                                            </a>
                                            <a href="#" class="delete-modal-users btn btn-danger btn-sm"
                                            data-id="{{$coUser->id}}" data-environmentid="{{$environment->id}}"
                                            data-name="{{$coUser->name}}" data-email="{{$coUser->email}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            {{$coUsers->links()}}
                        </div>
                    </div>
                </div>

<br>

            <div class="card">
                <div class="card-header">Proyectos</div>

                <div class="card-body">

                    <div class="row">
                        <div class="table table-responsive">
                            <table class="table table-bordered" id="proj_table">
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha de inicio</th>
                                    @if( Auth::User()->id === $environment->user_id)
                                    <th class="text-center" width="130">
                                        <a href="#" class="create-modal-project btn btn-success btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </th>
                                    @endif
                                </tr>
                                {{ csrf_field() }}
                                <?php  $no=1; ?>
                                @foreach ($projects as $project)
                                <tr class="project{{$project->id}}">
                                    <td>{{ $project->code}}</td>
                                    <td><a href="{{ $project->url }}">{{ $project->title }}</a></td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->initial_date }}</td>
                                    @if( Auth::User()->id === $environment->user_id)
                                    <td>
                                        <a href="#" class="show-modal-project btn btn-info btn-sm" data-id="{{$project->id}}"
                                            data-code="{{$project->code}}" data-title="{{$project->title}}"
                                            data-description="{{$project->description}}"
                                            data-initialdate="{{$project->initial_date}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="edit-modal-project btn btn-warning btn-sm" data-id="{{$project->id}}"
                                            data-code="{{$project->code}}" data-title="{{$project->title}}"
                                            data-description="{{$project->description}}"
                                            data-initialdate="{{$project->initial_date}}">
                                            <i class="fa fa-pencil-ruler"></i>
                                        </a>
                                        <a href="#" class="delete-modal-project btn btn-danger btn-sm"
                                            data-id="{{$project->id}}" data-code="{{$project->code}}"
                                            data-title="{{$project->title}}"
                                            data-description="{{$project->description}}"
                                            data-initialdate="{{$project->initial_date}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$projects->links()}}
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
                                <div class="form-group row add">
                                    <label class="control-label col-sm-3" for="title">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="cProj_title" name="title"
                                            placeholder="Nombre" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="code">Código:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="cProj_code" name="code"
                                            placeholder="Código" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="description">Descripción:</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="cProj_description" name="description"
                                            placeholder="Descripción" required></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="description">Fecha inicial:</label>
                                    <div class="col-sm-8">
                                        <input id="cProj_initialDate" type="text" class="week-picker"
                                            name="initial_date" required>
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

        {{-- Modal Form Show POST --}}
        <div id="show-project" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="sProj_id" name="sProj_id">
                        </div>
                        <div class="form-group">
                            <label for="">Código :</label>
                            <label id="sProj_code" />
                        </div>
                        <div class="form-group">
                            <label for="">Nombre :</label>
                            <label id="sProj_title" />
                        </div>

                        <div class="form-group">
                            <label for="">Descripción :</label>
                            <label id="sProj_description" />
                        </div>

                        <div class="form-group">
                            <label for="">Fecha inicial :</label>
                            <label id="sProj_initialdate" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Form Edit and Delete Post --}}
        <div id="editdelete-project" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="modal">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="hidden" id="eProj_id" name="eProj_id">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="control-label col-sm-3" for="title">Código</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="eProj_code">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="title">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="name" class="form-control" id="eProj_title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="body">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea type="name" class="form-control" id="eProj_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="body">Fecha inicial</label>
                                <div class="col-sm-9">
                                    <input id="eProj_initialdate" type="text" class="week-picker"
                                    name="initial_date" required>
                                </div>
                            </div>
                        </form>
                        {{-- Form Delete Post --}}
                        <div class="deleteContent">
                            ¿Seguro que quiere borrar al proyecto: <span class="title"></span>?
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








        {{-- Modal Form Show POST --}}
        <div id="show-users" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="sUsers_id" name="sUsers_id">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre :</label>
                                <label id="sUsers_name" />
                            </div>
                            <div class="form-group">
                                <label for="">Email :</label>
                                <label id="sUsers_email" />
                            </div>

                            <div class="form-group">
                                <label for="">Salario :</label>
                                <label id="sUsers_salary" />
                            </div>

                            <div class="form-group">
                                <label for="">% de productividad :</label>
                                <label id="sUsers_productivity" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>

                  {{-- Modal Form Edit and Delete Post --}}
        <div id="editdelete-users" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="modal">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="hidden" id="eUsers_userId">
                                        <input type="hidden" id="eUsers_environmentId">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="">Nombre :</label>
                                        <label id="eUsers_name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email :</label>
                                        <label id="eUsers_email" />
                                    </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="body">Salario</label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0.00" step="100.00" max="50000" value="00.00" id="eUsers_salary"/>
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


   {{-- Modal Form Show POST --}}
   <div id="show-report" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="sUsers_id" name="sUsers_id">
                    </div>

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
                                Día: {{$day->dayweek}} {{$day->readdate}}
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
    $(document).on('click', '.show-modal-project', function () {
        $('#show-project').modal('show');
        $('#sProj_id').text($(this).data('id'));
        $('#sProj_title').text($(this).data('title'));
        $('#sProj_description').text($(this).data('description'));
        $('#sProj_code').text($(this).data('code'));
        $('#sProj_initialdate').text($(this).data('initialdate'));
        $('.modal-title').text('Información');
    });


    // Show function
    $(document).on('click', '.show-modal-users', function () {
        $('#show-users').modal('show');
        $('#sUsers_id').text($(this).data('id'));
        $('#sUsers_name').text($(this).data('name'));
        $('#sUsers_email').text($(this).data('email'));
        $('#sUsers_salary').text($(this).data('salary'));
        $('#sUsers_productivity').text($(this).data('productivity'));
        $('.modal-title').text('Información');
    });


    // function Edit POST
    $(document).on('click', '.edit-modal-users', function () {
        $('#footer_action_button').text("Editar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').removeClass('btn-outline-primary');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Editar Sueldo');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#eUsers_userId').val($(this).data('id'));
        $('#eUsers_name').text($(this).data('name'));
        $('#eUsers_email').text($(this).data('email'));
        $('#eUsers_salary').text($(this).data('salary'));
        $('#eUsers_productivity').val($(this).data('productivity'));
        $('#eUsers_environmentId').val($(this).data('environmentid'));
        $('#editdelete-users').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function () {
        $.ajax({
            type: 'POST',
            url: 'editJoin',
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $("#eUsers_userId").val(),
                'environment_id': $('#eUsers_environmentId').val(),
                'amount': $('#eUsers_salary').val(),
            },
            success: function (data) {

                $('.coUser' + data.coUser.id).replaceWith(" " +
                    "<tr class='coUSers" + data.coUser.id + "'>" +
                    "<td>" + data.coUser.name + "</td>" +
                    "<td>" + data.coUser.email + "</td>" +
                    "<td>" + data.salary.amount + "</td>" +
                    "<td>" + "</td>" +
                    "<td><button class='show-modal-users btn btn-info btn-sm' data-id='" +
                        data.coUser.id +
                        "' data-name='" + data.coUser.name +
                        "' data-email='" + data.coUser.email +
                        "' data-salary='" + data.salary.amount +
                        "' data-environmentid='" + data.environment.id +
                        "'><span class='fa fa-eye'></span></button> " +
                        "<button class='edit-modal-users btn btn-warning btn-sm' data-id='" +
                        data.coUser.id +
                        "' data-name='" + data.coUser.name +
                        "' data-email='" + data.coUser.email +
                        "' data-salary='" + data.salary.amount +
                        "' data-environmentid='" + data.environment.id +
                        "'><span class='fa fa-pencil-ruler'></span></button> " +
                        "<button class='delete-modal-users btn btn-danger btn-sm' data-id='" +
                        data.coUser.id +
                        "' data-name='" + data.coUser.name +
                        "' data-email='" + data.coUser.email +
                        "' data-salary='" + data.salary.amount +
                        "' data-environmentid='" + data.environment.id +
                        "'><span class='fa fa-trash'></span></button></td>" +
                        "</tr>");
            }
        });
    });

        // form Delete function
        $(document).on('click', '.delete-modal-users', function () {
        $('#footer_action_button').text("Eliminar");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Eliminar empleado');
        $('#eUsers_userId').val($(this).data('id'));
        $('#eUsers_environmentId').val($(this).data('environmentid'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('name'));
        $('#editdelete-users').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function () {
        $.ajax({
            type: 'POST',
            url: 'deleteJoin',
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $("#eUsers_userId").val(),
                'environment_id': $('#eUsers_environmentId').val()
            },
            success: function (data) {
                $('.coUser' + $('#eUsers_userId').val()).remove();
            }
        });
    });



    // Show function
    $(document).on('click', '.show-modal-report', function () {
        $('#show-report').modal('show');
        $('#sUsers_id').text($(this).data('id'));
        $('#sUsers_name').text($(this).data('name'));
        $('#sUsers_email').text($(this).data('email'));
        $('#sUsers_salary').text($(this).data('salary'));
        $('#sUsers_productivity').text($(this).data('productivity'));
        $('.modal-title').text('Información');
    });



</script>
@endsection
