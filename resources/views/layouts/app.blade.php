<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Siscor - @yield('title') </title>
    {{--  <title>{{ config('app.name', 'Laravel') }}</title>  --}}
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}" />    
    <link rel="stylesheet" href="{!! asset('css/datatables.min.css') !!}" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{!! asset('css/selectize.css') !!}" />
</head>
<body>
  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">
        {{--  <div id="page-wrapper" class="gray-bg">  --}}

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            <div id="app">
                @yield('content')
            </div>

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/vendor.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/custom.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/datatables.min.js') !!}" type="text/javascript"></script>



@section('scripts')

@show

</body>
</html>
