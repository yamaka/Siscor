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
<create-roadmap :Directions='{!! json_encode($directions) !!}' :Units='{!! json_encode($units)!!}' :Positions='{!! json_encode($positions)!!}'  :Users='{!!json_encode($users)!!}' :Actions='{!!json_encode($actions)!!}'></create-roadmap>

@endsection
@section('scripts')

<script type="text/javascript"> 
    
</script>

@endsection