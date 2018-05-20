@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-7">
            <h2>Hoja Ruta</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#">App</a>
                </li>
                <li class="active">
                    <strong>Hoja Ruta</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        {!! Form::open(['url' => 'RoadMap', 'method' => 'post']) !!}
            <div class="row">
                <div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>1° Hoja de Ruta *</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Datos Hoja de Ruta.</p>
                                    <div class="form-group">
                                        {{ Form::label('Razón:', null) }}
                                        {{ Form::text('reason', '', ['class' => 'form-control', 'placeholder' => 'razón'])}}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Descripción:', null) }}
                                        {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'descripción', 'rows' => 3, 'cols' => 40])}}
									</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>2° Dirigido *</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <p>Derivar la hoja de ruta.</p>
                                <div class="form-group">
                                    {!! Form::label('Dirección:', 'Dirección', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                    {!! Form::select('direction', $directions, '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Unidad:', 'Unidad', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                    {!! Form::select('unit', $units, '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                 <div class="form-group">
                                    {!! Form::label('Cargo:', 'Cargo', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                    {!! Form::select('position', $positions, '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Usuario:</label>
                                    <div class="col-lg-10">
                                        <p>Pablito Escobar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>3° Accion y Finalizar
                                <small>accion que se recomienda al destinatario</small>
                            </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="col-md-6">
                                     {{-- <div class="form-group">
                                        {!! Form::label('Cargo:', 'Cargo', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                        {!! Form::select('position', $positions, '', ['class' => 'form-control']) !!}
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        {!! Form::label('Accion:', 'Cargo', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::select('action', $actions, '', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center">
                                    {{ Form::submit('Crear Hoja de Ruta', array('class' => 'btn btn-primary')) }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

@endsection
@section('scripts')


@endsection