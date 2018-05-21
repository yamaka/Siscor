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
                          <a href="#" class="btn btn-primary btn-xs pull-right"><i class="fa fa-file-excel-o"></i> Reporte</a>
                          <h2><strong>{{ $roadmap->reason }}</strong></h2>
                      </div>
                      {{-- <dl class="dl-horizontal">
                          
                      </dl> --}}
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-5" id="cluster_info">
                    <dl class="dl-horizontal" >
                        <dt>Direccion origen:</dt> <dd> {{$direction->name}} </dd>
                        <dt>Estado:</dt> <dd><span class="label label-primary"> {{ $roadmap->status }} </span></dd>
                        <dt>Última actualización:</dt> <dd>{{ $roadmap->updated_at }}</dd>
                        <dt>Creado:</dt> <dd> {{ $roadmap->created_at }} </dd>
                    </dl>
                </div>
                <div class="col-lg-7" id="cluster_info">
                    <dl class="dl-horizontal">
                        <dt>Acción:</dt>
                        <dd class="project-people">Tomar Precauciones inmediatamente
                        ya que el coronel esta necesitando el informe y se proceder a su criterio</dd>
                        <dt>Comentario:</dt>
                        <dd class="project-people">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. </dd>
                    </dl>
                </div>
              </div>
              <div class="row m-t-sm">
                  <div class="col-lg-12">
                    <div class="panel blank-panel">
                      <div class="panel-heading">
                          <div class="panel-options">
                              <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-1" data-toggle="tab">Recorrido de Hoja</a></li>
                                <li class=""><a href="#tab-2" data-toggle="tab">Derivar</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="panel-body">
                        <div class="tab-content">                    
                          <div class="tab-pane active" id="tab-1">
                              <table class="table table-striped" id="sequences-table">
                                <thead>
                                  <tr>  
                                      <th>ID Hoja</th>
                                      <th>Orden</th>
                                      <th>Direccion</th>                          
                                      <th>Cargo</th>
                                      <th>Unidad</th>
                                      <th>Nombre</th>
                                      <th>Fecha Inicio</th>
                                      <th>Fecha Fin</th>                                      
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                          </div>
                          <div class="tab-pane" id="tab-2">
                            <derivate-roadmap :Directions='{!! json_encode($directionsFormat) !!}' :Units='{!! json_encode($unitsFormat)!!}' :Positions='{!! json_encode($positionsFormat)!!}' :Actions='{!!json_encode($actionsFormat)!!}' :Users='{!!json_encode($usersFormat)!!}'
                              :Roadmap_id={!!json_encode($roadmap->id)!!}>
                            </derivate-roadmap>
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
        <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Editar</a>
        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
      </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
    <script>
        var sequencesTable = $('#sequences-table').DataTable({
            "dom": '<"top">t<"bottom"p>',
            processing: true,
            serverSide: true,
            pageLength: 8,
            autoWidth: false,
            order: [0, "asc"],
            ajax: {
                url: '{!! route('get_sequences_by_roadmap') !!}',
                data: function (d) {
                    d.id = {{ $roadmap->id }};
                }
            },
            columns: [
                { data: 'roadmap_id', bSortable: false },
                { data: 'order', sClass: "text-center" },
                { data: 'direction', bSortable:false },
                { data: 'position', bSortable: false },
                { data: 'unit', bSortable: false },
                { data: 'nameRoadmap', bSortable: false },
                { data: 'created_at', bSortable: false },
                { data: 'updated_at', bSortable: false }                
                // { data: 'action',name: 'action', orderable: false, searchable: false, bSortable: false, sClass: 'text-center'},
            ]            
        });
    </script>

@endsection