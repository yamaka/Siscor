@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>
                            @can('edit_forum')
                                <a href="">hello</a>
                            @endcan

                            @can('manage')
                                <a href="">Manage</a>
                            @endcan

                        </p>

                        <span data-toggle="tooltip" data-placement="left" title="hi!!">Direcciones</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
