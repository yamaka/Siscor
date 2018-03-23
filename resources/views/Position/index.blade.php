@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-7">
            <h2>Cargos</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Admin</a>
                </li>
                <li class="active">
                    <strong>Cargos</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-5">
            <div class="title-action" id="inspinia-actions">
                <div id="options" class="control-group options">

                    <button type="button" id="add-direction" class="btn btn-primary btn-modal" data-toggle="modal"
                            data-target="#myModal">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="filters" class="filters">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins no-drop ">
                    <div class="ibox-title">
                        <h5>Filtros</h5>
                        <span class="label label-primary"></span>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="">
                        <form class="form-inline" name="filtroForm">
                            <div class="form-group">
                                <label class="">ID Cargo</label>
                                <br>
                                <input type="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group fg-date">
                                <label class="">Fecha de Creación</label>
                                <br>
                                <input id="" name="DateCreatedF" class="form-control daterangepickeryasta" style=""
                                       type="text" value="" placeholder="13/01/2018 - 12/02/2018"
                                       readonly=""></div>
                            <div class="form-group">
                                <label class="">Estado</label>
                                <br>
                                <select id="status" name="StatusF" class="form-control" style="width: 100%;">
                                    <option value="" selected>activo</option>
                                    <option value="">inactivo</option>

                                </select>
                            </div>
                            <div class="form-group title-action">
                                <button class="btn btn-primary" type="submit">
                                    Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lista Cargos</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a href="#">Config option 1</a>
                                </li>
                                <li>
                                    <a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive" style="overflow-x: hidden">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                       id="DataTables_direction"
                                       style="width: 100%;" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th>Id Cargo</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
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

    <div class="modal inmodal in" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="fa fa-laptop modal-icon"></i>
                    <h4 class="modal-title">Cargo</h4>
                    <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </small>
                </div>
                <div class="modal-body">
                    <div class="ibox float-e-margins">
                        <form class="form-horizontal" id="form-direction" onsubmit="return false">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nombre</label>
                                <div class="col-lg-10">
                                    <input type="text" id="name" name="name" placeholder="Nombre de Cargo"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Descripción</label>
                                <div class="col-lg-10">
                                    <textarea type="text" id="description" name="description" placeholder="Descripcion"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Direccion</label>
                                <div class="col-lg-10">
                                    <select name="" class="" id="select-direction" style="width: 100%;"></select>
                                </div>
                            </div>
                            <div id="select-unit-div" class="form-group hide">
                                <label class="col-lg-2 control-label">Unidad</label>
                                <div class="col-lg-10">
                                    <select name="" class="" id="select-unit" style="width: 100%;"></select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white cancel" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary save" id="store-direction">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        URL_ROOT= "{{ url('/') }}";
        $select = null;
        $selectize = null;
        $selectizeins = null;
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /********** datatables position *********/
            $.fn.dataTable.ext.errMode = 'throw';
            oTable = $('#DataTables_direction').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('Position.index') }}",
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'action', orderable: false, searchable: false}
                ],
                order: [[0, 'desc']]
            });

            /****************** add position *****************/
            $('#options').find('#add-direction').on('click', function () {
                $('.modal-footer').find('.save').attr('id', 'store-direction');
                var selectize = $select[0].selectize;
                selectize.on('change', function() {
                    $('#select-unit').empty();
                    var dir_select = selectize.getValue();
                    var url = "{{ url('Units') }}" + "/" + dir_select;
                    console.log("uri",url);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json'
                    }).then(function (response) {
                        if($selectizeins !== null){
                            console.log("not null");
                            $selectizeins.clearOptions();
                            for( i in response){
                                $selectizeins.addOption({value: response[i].id,text: response[i].name});
                                $selectizeins.addItem(response[i].id);
                            }
                            $selectizeins.refreshOptions();
                        }else{
                            console.log(response);
                            $.each(response, function (i, item) {
                                $('#select-unit').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                            });
                            $selectize = $('#select-unit').selectize({
                                create: true,
                                sortField: 'text'
                            });
                            $selectizeins = $selectize[0].selectize;
                            $selectizeins.refreshOptions();
                            $('#select-unit-div').removeClass('hide');
                        }
                    });
//                    var test = selectize.getValue();
//                    alert(test);
                });
            });

            $(document).on('click', '.modal-footer #store-direction', function () {
                console.log("to store direction");
                var url = "{{ url('/') }}" + "/Position";
                var dirSelect = $("#select-unit option:selected").val();
                var data = $('#form-direction').serializeArray();
                data.push({name: 'unit', value: dirSelect});
                $.ajax({
                    url: url,
                    method: 'post',
                    data: JSON.parse(JSON.stringify(data)),
                    dataType: 'json',
                    success: function (data) {
                        oTable.ajax.reload();
                        $('#myModal').modal('hide');
                    }
                });
            });

            $('#myModal').on('hidden.bs.modal', function () {
                var form = $('#form-direction');
                form.find('#name').val('');
                form.find('#description').val('');
                form.find('#id').val('');
            });

            $(document).on('click', '.modal-footer #updte', function () {
                console.log('update');
                var id = $(".edit").attr("id");
                var url = "{{ url('/') }}" + "/Position/" + id;
                var dirSelect = $("#select-unit option:selected").val();
                var data = $('#form-direction').serializeArray();
                data.push({name: 'unit', value: dirSelect});
                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: JSON.parse(JSON.stringify(data)),
                    dataType: 'json',
                    success: function (data) {
                        oTable.ajax.reload();
                        $('#myModal').modal('hide');
                    }
                });
            });


            /******************edit positiom******************/
            $(document).on('click', '.edit', function () {
                console.log('edit');
                var id = $(this).attr("id");
                console.log(id);
                $('#myModal').modal('show');
                var url = "{{ url('/') }}" + "/Position/" + id + '/edit';
                $('.modal-footer').find('.save').attr('id', 'updte');
                $.ajax({
                    url: url,
                    method: 'get',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var form = $('#form-direction');
                        form.find('#id').val(data.id);
                        form.find('#name').val(data.name);
                        form.find('#description').val(data.description)

                        var selectize = $select[0].selectize;
                        selectize.setValue(data.direction_id, false);
                        var url = "{{ url('Units') }}" + "/" + data.direction_id;
                        console.log("uri",url);
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json'
                        }).then(function (response) {
                            if($selectizeins !== null){
                                console.log("not null");
                                $selectizeins.clearOptions();
                                for( i in response){
                                    $selectizeins.addOption({value: response[i].id,text: response[i].name});
                                    $selectizeins.addItem(response[i].id);
                                }
                                $selectizeins.refreshOptions();
                            }else{
                                console.log(response);
                                $.each(response, function (i, item) {
                                    $('#select-unit').append($('<option>', {
                                        value: item.id,
                                        text: item.name
                                    }));
                                });
                                $selectize = $('#select-unit').selectize({
                                    create: true,
                                    sortField: 'text'
                                });
                                $selectizeins = $selectize[0].selectize;
                                $selectizeins.refreshOptions();
                                $('#select-unit-div').removeClass('hide');
                            }
                        });
                    }
                });
            });
            $(document).on('click', '.delete', function () {
                console.log('delete');
                var id = $(this).attr("id");
                var url = "{{ url('/') }}" + "/Position/" + id;
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
                url: "{{ url('Directions') }}",
                type: 'GET',
                dataType: 'json'
            }).then(function (response) {

                console.log(response);
                $.each(response, function (i, item) {
                    $('#select-direction').append($('<option>', {
                        value: item.id,
                        text: item.text
                    }));
                });
                $select = $('#select-direction').selectize({
                    create: true,
                    sortField: 'text',
                });
            });

        });
    </script>
@endsection
