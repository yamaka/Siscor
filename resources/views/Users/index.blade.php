@extends('layouts.app') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-7">
        <h2>Usuarios</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Admin</a>
            </li>
            <li class="active">
                <strong>Usuarios</strong>
            </li>
        </ol>
    </div>
    <div class="col-md-5">
        <div class="title-action" id="inspinia-actions">
            <div id="options" class="control-group options">
                <button type="button" id="add-user" class="btn btn-primary btn-modal" data-toggle="modal" data-target="#myModal">
                        <span class="fa fa-plus"></span>  Agregar Usuario
                    </button>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de Usuarios</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive" style="overflow-x: hidden">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_users" style="width: 100%;"
                                role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>Id</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Teléfono</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal para crear al usuario --}}
<div class="modal inmodal in" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title" id="titleModal">Usuario</h4>
                <small class="font-bold">
                      CRUD usuarios
                    </small>
            </div>
            <div class="modal-body">
                <div class="ibox float-e-margins">
                    <form class="form-horizontal" id="form-user" onsubmit="return false">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" id="name" name="name" placeholder="Jhon" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Apellido</label>
                            <div class="col-lg-10">
                                <input type="text" id="last_name" name="last_name" placeholder="Doe" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Teléfono</label>
                            <div class="col-lg-10">
                                <input type="text" id="phone" name="phone" placeholder="Teléfono/Celular" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" id="username" name="username" placeholder="Nombre de Usuario" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" id="email" name="email" placeholder="test@example.com" class="form-control">
                            </div>
                        </div>
                        <div class="form-group" id="editPass">
                            <label class="col-lg-2 control-label newpassword">Contraseña</label>
                            <div class="col-lg-10">
                                <input type="password" id="password" name="password" placeholder="******" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Direccion</label>
                            <div class="col-lg-10">
                                <select name="direction" data-placeholder="Elige una direccion" class="chosen-select form-control" id="select-unit" style="width: 100%;"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Unidad</label>
                            <div class="col-lg-10">
                                <select name="unit" data-placeholder="Elige una unidad" class="chosen-select form-control" id="select-unit" style="width: 100%;"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Cargo</label>
                            <div class="col-lg-10">
                                <select name="position" class="js-example-basic-single form-control" id="select-position" style="width: 100%;"></select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white cancel" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary save" id="store-user">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal" id="myModalShowUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title" id="titleShowModal">jdoe</h4>
                <small class="font-bold">
                      Vista detallada del usuario
                    </small>
            </div>
            <div class="modal-body text-center">
                <p><strong>Nombre Completo: </strong> <span id="showName">Jhon Doe</span></p>
                <p><strong>Teléfono: </strong> <span id="showPhone">55577789</span></p>
                <p><strong>Email: </strong> <span id="showMail">jhon.doe@example.com</span></p>
                <p><strong>Estado: </strong> <span id="showState">active</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> {{-- <button type="button"
                    class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /*
            * datatables de usuario 
            */
            $.fn.dataTable.ext.errMode = 'throw';
            oTable = $('#DataTables_users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('User.index') }}",
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'fullName', name: 'fullName'},
                    {data: 'phone', name: 'phone'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', orderable: false, searchable: false}
                ]
            });
            /*
            * Guardar usuario
            **/
            
            $('#options').find('#add-user').on('click', function () {
                $('.modal-footer').find('.save').attr('id', 'store-user');
            });
            $(document).on('click', '.modal-footer #store-user', function () {
                var url = "{{ url('/') }}" + "/User";
                console.log(url);
                console.log($('#form-user').val());
                $.ajax({
                    url: url,
                    method: 'post',
                    data: $('#form-user').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        oTable.ajax.reload();
                        $('#myModal').modal('hide');
                    }
                });
            }); 
            
            // Reiniciando valores del modal-create-user
            $('#myModal').on('hidden.bs.modal', function () {
                $('#form-user').find('#name').val('');
                $('#form-user').find('#last_name').val('');
                $('#form-user').find('#phone').val('');
                $('#form-user').find('#username').val('');
                $('#form-user').find('#email').val('');
                $('#form-user').find('#password').val('');
            });
                      
            /**
            * Editando Usuario
            */
            $(document).on('click', '.modal-footer #update', function () {
                var id = $(".edit").attr("id");
                var url = "{{ url('/') }}" + "/User/" + id;
                $.ajax({
                    url: url,
                    method: 'put',
                    data: $('#form-user').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        oTable.ajax.reload();
                        $('#myModal').modal('hide');
                    }
                });
            }); 
            $(document).on('click', '.show', function() {
                var id = $(this).attr("id");
                $('#myModalShowUser').modal('show');
                var url = "{{ url('/') }}" + "/User/" + id;
                $.ajax({
                    url: url,
                    method: 'get',
                    data: {id: id},
                    dataType: 'json',
                    success: function(data) {
                        $('#titleShowModal').text(data.username);
                        $('#showName').text(data.name + " " + data.last_name);
                        $('#showPhone').text(data.phone);
                        $('#showMail').text(data.email)
                        $('#showState').text(data.status)
                    }
                });
                
            })
            
            $(document).on('click', '.edit', function () {
                var id = $(this).attr("id");
                $('#myModal').modal('show');
                var url = "{{ url('/') }}" + "/User/" + id + '/edit';
                $('.modal-footer').find('.save').attr('id', 'update');
                $.ajax({
                    url: url,
                    method: 'get',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#form-user').find('#id').val(data.id);
                        $('#form-user').find('#name').val(data.name);
                        $('#form-user').find('#last_name').val(data.last_name);
                        $('#form-user').find('#phone').val(data.phone);
                        $('#form-user').find('#username').val(data.username);
                        $('#form-user').find('#email').val(data.email);
                        // pendiente de revisión
                        $('#form-user').find('#editPass').remove();
                    }
                });
            });
            /*
            * Eliminando usuario
            */
            $(document).on('click', '.delete', function () {
                var id = $(this).attr("id");
                var url = "{{ url('/') }}" + "/User/" + id;
                $.ajax({
                    url: url,
                    method: 'delete',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        oTable.ajax.reload();
                        console.log(data)
                    }
                });
            });

            $.ajax({
                url: "{{ url('Units') }}",
                type: 'GET',
                dataType: 'json'
            }).then(function (response) {
                $("#select-unit").select2({
                    dropdownParent: $("#select-unit").parent(),
                    placeholder: "Seleccione una unidad",
                    data: response
                })
            });

            $(document).ready(function(){
                $('select[name="unit"]').on('change', function() {
                    var unitID = $(this).val();
                    if(unitID) {
                        $.ajax({
                            url: "{!! url('Positions') !!}",
                            type: "GET",
                            dataType: "json",
                            data:{
                                "unit_id" : unitID
                            },
                            success: function(data) {
                                $("#select-position").select2({
                                    dropdownParent: $("#select-position").parent(),
                                    placeholder: "Seleccione un cargo",
                                    data: data
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="position"]').empty();
                    }
                });
            });
            
        });
</script>
@endsection