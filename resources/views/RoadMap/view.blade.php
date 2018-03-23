@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
      <h2>Detalle de Hoja de Ruta</h2>
      <ol class="breadcrumb">
          <li>
              <a href="/RoadMap">Hojas De Ruta</a>
          </li>
          <li class="active">
              <strong>{{ $roadmap->id }}</strong>
          </li>
      </ol>
  </div>
</div>
<div class="row">
<div class="col-lg-9">
  <div class="wrapper wrapper-content animated fadeInUp">
      <div class="ibox">
          <div class="ibox-content">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="m-b-md">
                          <a href="#" class="btn btn-warning btn-xs pull-right"><i class="fa fa-edit"></i> Editar</a>
                          <h2><strong>{{ $roadmap->reason }}</strong></h2>
                      </div>
                      {{-- <dl class="dl-horizontal">
                          
                      </dl> --}}
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-5" id="cluster_info">
                    <dl class="dl-horizontal" >
                        <dt>Estado:</dt> <dd><span class="label label-primary"> {{ $roadmap->status }} </span></dd>
                        <dt>Última actualización:</dt> <dd>{{ $roadmap->updated_at }}</dd>
                        <dt>Creado:</dt> <dd> {{ $roadmap->created_at }} </dd>
                    </dl>
                </div>
                <div class="col-lg-7" id="cluster_info">
                    <dl class="dl-horizontal">
                        <dt>Destinos:</dt>
                        <dd class="project-people">Juanito - Complemento Económico</dd>
                        <dd class="project-people">Esperanza - Archivos</dd>
                        <dd class="project-people">Cechus - Tecnología e Investigación</dd>
                    </dl>
                </div>
              </div>
              <div class="row m-t-sm">
                  <div class="col-lg-12">
                    <div class="panel blank-panel">
                      <div class="panel-heading">
                          <div class="panel-options">
                              <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-1" data-toggle="tab">Registro de Actividades</a></li>
                                <li class=""><a href="#tab-2" data-toggle="tab">Otros</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="panel-body">
                        <div class="tab-content">                    
                          <div class="tab-pane active" id="tab-1">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                      <th>Status</th>
                                      <th>Title</th>
                                      <th>Start Time</th>
                                      <th>End Time</th>
                                      <th>Comments</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                        <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                    </td>
                                    <td>
                                      Create project in webapp
                                    </td>
                                    <td>
                                      12.07.2014 10:10:1
                                    </td>
                                    <td>
                                        14.07.2014 10:16:36
                                    </td>
                                    <td>
                                    <p class="small">
                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                    </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                    </td>
                                    <td>
                                        Various versions
                                    </td>
                                    <td>
                                        12.07.2014 10:10:1
                                    </td>
                                    <td>
                                        14.07.2014 10:16:36
                                    </td>
                                    <td>
                                        <p class="small">
                                            Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                    </td>
                                    <td>
                                        There are many variations
                                    </td>
                                    <td>
                                        12.07.2014 10:10:1
                                    </td>
                                    <td>
                                        14.07.2014 10:16:36
                                    </td>
                                    <td>
                                        <p class="small">
                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which
                                        </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                    </td>
                                    <td>
                                        Latin words
                                    </td>
                                    <td>
                                        12.07.2014 10:10:1
                                    </td>
                                    <td>
                                        14.07.2014 10:16:36
                                    </td>
                                    <td>
                                        <p class="small">
                                            Latin words, combined with a handful of model sentence structures
                                        </p>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                          </div>
                          <div class="tab-pane" id="tab-2">
                            <h3>Otros</h3>
                          </div>                  
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="col-lg-3">
  <div class="wrapper wrapper-content project-manager">
      <h3>Descripción Hoja de Ruta</h3>      
      {{-- <i class="fa fa-list-alt modal-icon"></i> --}}
      <p>{{ $roadmap->description }}</p>
      <p class="small font-bold">
          <span><i class="fa fa-circle text-warning"></i> Alta prioridad</span>
      </p>
      {{-- <h5>Archivos de Hoja</h5>
      <ul class="list-unstyled project-files">
          <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
          <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
          <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
          <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
      </ul> --}}
      <div class="text-center m-t-md">
        <a href="#" class="btn btn-xs btn-primary">Derivar</a>
        <a href="#" class="btn btn-xs btn-danger">Eliminar</a>
      </div>
  </div>
</div>
</div>
@endsection
@section('scripts')

@endsection