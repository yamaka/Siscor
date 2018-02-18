@extends('layouts.app') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-7">
        <h2>Direccion</h2>
        <ol class="breadcrumb">
            <li>
                <a href="https://www.ultracasas.com/web/app/main/home/dashboard">Admin</a>
            </li>
            <li class="active">
                <strong>Direccion</strong>
            </li>
        </ol>
    </div>
    <div class="col-md-5">
        <div class="title-action" id="inspinia-actions">
            <div id="options" class="control-group options">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
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
                            <label class="">ID Direccion</label>
                            <br>
                            <input type="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group fg-date">
                            <label class="">Fecha de Creación</label>
                            <br>
                            <input id="" name="DateCreatedF" class="form-control daterangepickeryasta" style="" type="text" value="" placeholder="13/01/2018 - 12/02/2018"
                                readonly=""> </div>
                        <div class="form-group">
                            <label class="">Estado</label>
                            <br>
                            <select id="" name="StatusF" class="form-control select2 select2-offscreen" tabindex="-1" title="">
                                <option value="">Todos</option>
                                <option value="ENABLED" selected="">Activo</option>
                                <option value="DISABLED">Inactivo</option>
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
                    <h5>Lista Direcciones</h5>
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
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="html5buttons">
                                <div class="dt-buttons btn-group">
                                    <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#">
                                        <span>Copy</span>
                                    </a>
                                    <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#">
                                        <span>CSV</span>
                                    </a>
                                    <a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#">
                                        <span>Excel</span>
                                    </a>
                                    <a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#">
                                        <span>PDF</span>
                                    </a>
                                    <a class="btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#">
                                        <span>Print</span>
                                    </a>
                                </div>
                            </div>
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>Show
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>entries
                                </label>
                            </div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>&nbsp;Search:
                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 158px;">Id Direccion</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 197px;">Nombre</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 177px;">Dependencia</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                            style="width: 134px;">Engine version</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                            style="width: 93px;">Accion</th>
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
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Modal title</h4>
                <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
                <div class="form-group">
                    <label>Sample Input</label>
                    <input type="email" placeholder="Enter your email" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection