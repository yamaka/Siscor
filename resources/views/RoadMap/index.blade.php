@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-7">
            <h2>Hojas De Ruta</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Hojas De Ruta</a>
                </li>
            </ol>
        </div>
        <div class="col-md-5">
            <div class="title-action" id="inspinia-actions">
                <div id="options" class="control-group options">
                    <a class="btn btn-primary" href="{{ url('/RoadMap/create') }}" role="button">Nueva Hoja</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-sm-8">
                <div class="ibox">
                    <div class="ibox-content">
                        {{--  <span class="text-muted small pull-right">última modificacion: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>  --}}
                        {{--  <h2>Hojas de ruta</h2>  --}}
                        <div class="input-group">
                            <input type="text" placeholder="Hoja de Ruta" class="input form-control">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
                            </span>
                        </div>
                        <div class="clients-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-received" aria-expanded="true"><i
                                                class="fa fa-server"></i> Recibidos</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-send" aria-expanded="false"><i
                                                class="fa fa-send"></i> Enviados</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-received" class="tab-pane active">
                                    <table class="table table-bordered table-hover" id="roadmaps-table">
                                        <thead style="display:table-row-group;">
                                            <tr class="success">
                                                <th>ID</th>                                                
                                                <th>Razón</th>
                                                <th>Descripción</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tfoot  style="display: table-header-group;">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div id="tab-send" class="tab-pane">
                                    {{--  <div class="slimScrollDiv"
                                         style=" overflow-y: auto; position: relative;  width: auto; height: 100%;">
                                        <div class="full-height-scroll"
                                             style=" width: auto; height: 100%;">
                                            <div class="table-responsive">
                                                <span>Contenido del tab Recibidos</span>
                                                <table class="table table-striped table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <td><a data-toggle="tab" href="#company-1" class="client-link"
                                                               aria-expanded="false">Tellus Institute</a></td>
                                                        <td>Rexton</td>
                                                        <td><i class="fa fa-flag"></i> Angola</td>
                                                        <td class="client-status"><span class="label label-primary">Active</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a data-toggle="tab" href="#company-2" class="client-link"
                                                               aria-expanded="false">Et Arcu Inc.</a></td>
                                                        <td>Sioux City</td>
                                                        <td><i class="fa fa-flag"></i> Burundi</td>
                                                        <td class="client-status"><span class="label label-primary">Active</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="slimScrollBar"
                                             style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;"></div>
                                        <div class="slimScrollRail"
                                             style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div class="tab-content">
                            <div id="contact-1" class="tab-pane active">
                                <div class="row m-b-lg">
                                    <div class="col-lg-4 text-center">
                                        <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" class="img-circle" alt="user-image">
                                        <div class="m-b-sm">
                                            <span>Web Developer</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <h2><strong>{{ Auth::user()->getFullName() }}</strong></h2>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </div>
                                {{--  <div class="client-detail">
                                    <div class="slimScrollDiv"
                                         style=" overflow-y:scroll; position: relative;  width: auto; height: 100%;">
                                        <div class="full-height-scroll"
                                             style=" width: auto; height: 100%;">

                                            <strong>Last activity</strong>

                                            <ul class="list-group clear-list">
                                                <li class="list-group-item fist-item">
                                                    <span class="pull-right"> 09:00 pm </span>
                                                    Please contact me
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> 10:16 am </span>
                                                    Sign a contract
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> 08:22 pm </span>
                                                    Open new shop
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> 11:06 pm </span>
                                                    Call back to Sylvia
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> 12:00 am </span>
                                                    Write a letter to Sandra
                                                </li>
                                            </ul>
                                            <strong>Notes</strong>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <hr>
                                            <strong>Timeline activity</strong>
                                            <div id="vertical-timeline" class="vertical-container dark-timeline">
                                                <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon gray-bg">
                                                        <i class="fa fa-coffee"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p>Conference on the sales results for the previous year.
                                                        </p>
                                                        <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon gray-bg">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p>Many desktop publishing packages and web page editors now useLorem.
                                                        </p>
                                                        <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon gray-bg">
                                                        <i class="fa fa-bolt"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                                                        <span class="vertical-date small text-muted"> 06:10 pm - 11.03.2014 </span>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon navy-bg">
                                                        <i class="fa fa-warning"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p>The generated Lorem Ipsum is therefore.
                                                        </p>
                                                        <span class="vertical-date small text-muted"> 02:50 pm - 03.10.2014 </span>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon gray-bg">
                                                        <i class="fa fa-coffee"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p>Conference on the sales results for the previous year.
                                                        </p>
                                                        <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon gray-bg">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p>Many desktop publishing packages and web page editors now useLorem.
                                                        </p>
                                                        <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slimScrollBar"
                                             style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 267px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 353.634px;"></div>
                                        <div class="slimScrollRail"
                                             style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                    </div>
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script>
        var oTable = $('#roadmaps-table').DataTable({        
            dom: "<'row'<'col-xs-12'>t>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
            processing: true,
            serverSide: true,
            pageLength: 4,
            autoWidth: false,
            ajax: {
                url: '{!! route('get_roadmap') !!}',
            },
            columns: [
                { data: 'id'},
                { data: 'reason'},
                { data: 'description'},
                { data: 'status', name:'status'},
                { data: 'action', name: 'action', orderable: false, searchable: false, sClass: 'text-center' }
            ],
        });
    </script>
@endsection