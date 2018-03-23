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
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Nueva Hoja de Ruta</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-wrench"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#">Config option 1</a>
							</li>
							<li><a href="#">Config option 2</a>
							</li>
						</ul>
						<a class="close-link">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<form method="post" action="{{url('RoadMap')}}" class="form-horizontal">
						<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						<div class="form-group"><label class="col-sm-2 control-label">Razon</label>
							<div class="col-sm-10"><input type="text" name="reason" class="form-control"></div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Descripción</label>
							<div class="col-lg-10">
								<textarea type="text" id="description" name="description" placeholder="Descripcion"
								class="form-control"></textarea>
							</div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group"><label class="col-sm-2 control-label">Seleccione Tipo</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="account">
									<option>option 1</option>
									<option>option 2</option>
									<option>option 3</option>
									<option>option 4</option>
								</select>
							</div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-8">
								<button class="btn btn-white" type="button">Cancelar</button>
								<button class="btn btn-primary" type="submit">Crear Hoja</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')

@endsection