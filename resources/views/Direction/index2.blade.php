@extends('layouts.app')


@section('title', 'Dirección')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-7">
    <h2>Direccion</h2>
    <ol class="breadcrumb">
        <li>
            <a href="#">Admin</a>
        </li>
        <li class="active">
            <strong>Direccion</strong>
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
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center m-t-lg">
                <direction-index></direction-index>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
