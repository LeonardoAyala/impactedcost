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






            <br>

            <div class="card">
                <div class="card-header">Proyectos</div>

                <div class="card-body">

                    <div class="row">
                        <div class="table table-responsive">
                            <table class="table table-bordered" id="table">
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha de inicio</th>
                                    <th class="text-center">
                                        <a href="#" class="create-modal btn btn-success btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                        <a href="#" class="join-modal btn btn-outline-success btn-sm">
                                            <i class="fas fa-users"></i>
                                        </a>
                                    </th>
                                </tr>
                                {{ csrf_field() }}
                                <?php  $no=1; ?>
                                @foreach ($projects as $project)
                                <tr class="project{{$project->id}}">
                                    <td>{{ $project->code}}</td>
                                    <td><a href="{{ $environment->url }}">{{ $environment->title }}</a></td>
                                    <td>{{ $environment->description }}</td>
                                    <td>{{ $environment->user->name }}</td>
                                    <td>
                                        <a href="#" class="show-modal btn btn-info btn-sm"
                                            data-id="{{$environment->id}}" data-title="{{$environment->title}}"
                                            data-description="{{$environment->description}}"
                                            data-code="{{$environment->code}}"
                                            data-password="{{$environment->password}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="edit-modal btn btn-warning btn-sm"
                                            data-id="{{$environment->id}}" data-title="{{$environment->title}}"
                                            data-description="{{$environment->description}}"
                                            data-code="{{$environment->code}}"
                                            data-password="{{$environment->password}}">
                                            <i class="fa fa-pencil-ruler"></i>
                                        </a>
                                        <a href="#" class="delete-modal btn btn-danger btn-sm"
                                            data-id="{{$environment->id}}" data-title="{{$environment->title}}"
                                            data-description="{{$environment->description}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$environments->links()}}
                    </div>
                </div>
            </div>


            {{-- Modal Form Create Post --}}
            <div id="create" class="modal fade" role="dialog">
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
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Nombre" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="description">Descripción:</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="description" name="description"
                                            placeholder="Descripción" required></textarea>

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
        <div id="show" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="s_id" name="s_id">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre :</label>
                            <label id="s_title" />
                        </div>
                        <div class="form-group">
                            <label for="">Descripción :</label>
                            <label id="s_description" />
                        </div>
                        <div class="form-group">
                            <label for="">Código :</label>
                            <label id="s_code" />
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña :</label>
                            <label id="s_password" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Form Edit and Delete Post --}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="modal">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="hidden" id="e_id" name="e_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="e_title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="body">Descripción</label>
                                <div class="col-sm-10">
                                    <textarea type="name" class="form-control" id="e_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Código</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="e_code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="body">Contraseña</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="e_password">
                                </div>
                            </div>
                        </form>
                        {{-- Form Delete Post --}}
                        <div class="deleteContent">
                            ¿Seguro que quiere borrar al ambiente: <span class="title"></span>?
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

        {{-- Modal Form Join --}}
        <div id="join" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="modal">
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="hidden" id="j_id" name="e_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="title">Código</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="j_code" placeholder="Código">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="body">Contraseña</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="j_password" placeholder="Contraseña">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn actionBtn" data-dismiss="modal">
                                <span id="footer_action_button" class="">Unirse</span>
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon"></span>close
                            </button>
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
    $(document).on('click', '.create-modal', function () {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Crear ambiente');
    });
    $("#add").click(function () {
        $.ajax({
            type: 'POST',
            url: 'addEnvironment',
            data: {
                '_token': $('input[name=_token]').val(),
                'title': $('input[name=title]').val(),
                'description': $('textarea[name=description]').val()
            },
            success: function (data) {
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.description);
                } else {
                    $('.error').remove();
                    $('#table').append("<tr class='environment" + data.environment.id + "'>" +
                        "<td>" + data.environment.id + "</td>" +
                        "<td><a href='" + data.url + "'>" + data.environment.title + "</a></td>" +
                        "<td>" + data.environment.description + "</td>" +
                        "<td>" + data.user.name + "</td>" +
                        "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data
                        .environment.id + "' data-title='" + data.environment.title +
                        "' data-description='" + data.environment.description +
                        "' data-code='" + data.environment.code + "' data-password='" + data
                        .environment.password + "'><span class='fa fa-eye'></span></button> " +
                        "<button class='edit-modal btn btn-warning btn-sm' data-id='" + data
                        .environment.id + "' data-title='" + data.environment.title +
                        "' data-description='" + data.environment.description +
                        "' data-code='" + data.environment.code + "' data-password='" + data
                        .environment.password +
                        "'><span class='fa fa-pencil-ruler'></span></button> " +
                        "<button class='delete-modal btn btn-danger btn-sm' data-id='" + data
                        .environment.id + "' data-title='" + data.environment.title +
                        "' data-description='" + data.environment.description +
                        "' data-code='" + data.environment.code + "' data-password='" + data
                        .environment.password +
                        "'><span class='fa fa-trash'></span></button></td>" +
                        "</tr>");
                }
            },
        });
        $('#title').val('');
        $('#description').val('');
    });

    // function Edit POST
    $(document).on('click', '.edit-modal', function () {
        $('#footer_action_button').text("Editar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').removeClass('btn-outline-primary');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Editar ambiente');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#e_id').val($(this).data('id'));
        $('#e_title').val($(this).data('title'));
        $('#e_description').val($(this).data('description'));
        $('#e_code').val($(this).data('code'));
        $('#e_password').val($(this).data('password'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function () {
        $.ajax({
            type: 'POST',
            url: 'editEnvironment',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#e_id").val(),
                'title': $('#e_title').val(),
                'description': $('#e_description').val(),
                'code': $('#e_code').val(),
                'password': $('#e_password').val()
            },
            success: function (data) {

                $('.environment' + data.environment.id).replaceWith(" " +
                    "<tr class='environment" + data.environment.id + "'>" +
                    "<td>" + data.environment.id + "</td>" +
                    "<td><a href='" + data.url + "'>" + data.environment.title + "</a></td>" +
                    "<td>" + data.environment.description + "</td>" +
                    "<td>" + data.user + "</td>" +
                    "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data
                    .environment.id + "' data-title='" + data.environment.title +
                    "' data-description='" + data.environment.description + "' data-code='" +
                    data.environment.code + "' data-password='" + data.environment.password +
                    "'><span class='fa fa-eye'></span></button> " +
                    "<button class='edit-modal btn btn-warning btn-sm' data-id='" + data
                    .environment.id + "' data-title='" + data.environment.title +
                    "' data-description='" + data.environment.description + "' data-code='" +
                    data.environment.code + "' data-password='" + data.environment.password +
                    "'><span class='fa fa-pencil-ruler'></span></button> " +
                    "<button class='delete-modal btn btn-danger btn-sm' data-id='" + data
                    .environment.id + "' data-title='" + data.environment.title +
                    "' data-description='" + data.environment.description + "' data-code='" +
                    data.environment.code + "' data-password='" + data.environment.password +
                    "'><span class='fa fa-trash'></span></button></td>" +
                    "</tr>");
            }
        });
    });

       // function Join POST
       $(document).on('click', '.join-modal', function () {
        $('#footer_action_button').text("Unirse");
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').removeClass('btn-outline-primary');
        $('.actionBtn').addClass('join');
        $('.modal-title').text('Unirse a ambiente');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#join').modal('show');
    });

    $('.modal-footer').on('click', '.join', function () {
        $.ajax({
            type: 'POST',
            url: 'joinEnvironment',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#j_id").val(),
                'code': $('#j_code').val(),
                'password': $('#j_password').val()
            },
            success: function (data) {
alert(data);
                $('#table').append("<tr class='environment" + data.environment.id + "'>" +
                "<td>" + data.environment.id + "</td>" +
                "<td><a href='" + data.url + "'>" + data.environment.title + "</a></td>" +
                "<td>" + data.environment.description + "</td>" +
                "<td>" + data.user.name + "</td>" +
                "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data
                .environment.id + "' data-title='" + data.environment.title +
                "' data-description='" + data.environment.description +
                "' data-code='" + data.environment.code + "' data-password='" + data
                .environment.password + "'><span class='fa fa-eye'></span></button> " +
                "<button class='edit-modal btn btn-warning btn-sm' data-id='" + data
                .environment.id + "' data-title='" + data.environment.title +
                "' data-description='" + data.environment.description +
                "' data-code='" + data.environment.code + "' data-password='" + data
                .environment.password +
                "'><span class='fa fa-pencil-ruler'></span></button> " +
                "<button class='delete-modal btn btn-danger btn-sm' data-id='" + data
                .environment.id + "' data-title='" + data.environment.title +
                "' data-description='" + data.environment.description +
                "' data-code='" + data.environment.code + "' data-password='" + data
                .environment.password +
                "'><span class='fa fa-trash'></span></button></td>" +
                "</tr>");
            }
        });
    });

    // form Delete function
    $(document).on('click', '.delete-modal', function () {
        $('#footer_action_button').text("Eliminar");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Eliminar ambiente');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('title'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function () {
        $.ajax({
            type: 'POST',
            url: 'deleteEnvironment',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function (data) {
                $('.environment' + $('.id').text()).remove();
            }
        });
    });

    // Show function
    $(document).on('click', '.show-modal', function () {
        $('#show').modal('show');
        $('#s_id').text($(this).data('id'));
        $('#s_title').text($(this).data('title'));
        $('#s_description').text($(this).data('description'));
        $('#s_code').text($(this).data('code'));
        $('#s_password').text($(this).data('password'));
        $('.modal-title').text('Información');
    });

</script>
@endsection
