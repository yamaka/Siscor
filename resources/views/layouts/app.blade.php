{{--  <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>  --}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INSPINIA - @yield('title') </title>
    {{--  <title>{{ config('app.name', 'Laravel') }}</title>  --}}
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}" />    
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
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

  <div class="theme-config">
      <div class="theme-config-box">
          <div class="spin-icon">
              <i class="fa fa-cogs fa-spin"></i>
          </div>
          <div class="skin-settings">
              <div class="title">Configuration <br>
                  <small style="text-transform: none;font-weight: 400">
                      Config box designed for demo purpose. All options available via code.
                  </small></div>
              <div class="setings-item">
                    <span>
                        Collapse menu
                    </span>

                  <div class="switch">
                      <div class="onoffswitch">
                          <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                          <label class="onoffswitch-label" for="collapsemenu">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="setings-item">
                    <span>
                        Fixed sidebar
                    </span>

                  <div class="switch">
                      <div class="onoffswitch">
                          <input type="checkbox" name="fixedsidebar" class="onoffswitch-checkbox" id="fixedsidebar">
                          <label class="onoffswitch-label" for="fixedsidebar">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="setings-item">
                    <span>
                        Top navbar
                    </span>

                  <div class="switch">
                      <div class="onoffswitch">
                          <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                          <label class="onoffswitch-label" for="fixednavbar">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="setings-item">
                    <span>
                        Top navbar v.2
                        <br>
                        <small>*Primary layout</small>
                    </span>

                  <div class="switch">
                      <div class="onoffswitch">
                          <input type="checkbox" name="fixednavbar2" class="onoffswitch-checkbox" id="fixednavbar2">
                          <label class="onoffswitch-label" for="fixednavbar2">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="setings-item">
                    <span>
                        Boxed layout
                    </span>

                  <div class="switch">
                      <div class="onoffswitch">
                          <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                          <label class="onoffswitch-label" for="boxedlayout">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="setings-item">
                    <span>
                        Fixed footer
                    </span>

                  <div class="switch">
                      <div class="onoffswitch">
                          <input type="checkbox" name="fixedfooter" class="onoffswitch-checkbox" id="fixedfooter">
                          <label class="onoffswitch-label" for="fixedfooter">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>
                  </div>
              </div>

              <div class="title">Skins</div>
              <div class="setings-item default-skin">
                    <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             Default
                         </a>
                    </span>
              </div>
              <div class="setings-item blue-skin">
                    <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            Blue light
                        </a>
                    </span>
              </div>
              <div class="setings-item yellow-skin">
                    <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            Yellow/Purple
                        </a>
                    </span>
              </div>
              <div class="setings-item ultra-skin">
                    <span class="skin-name ">
                        <a href="md_skin/" class="md-skin">
                            Material Design
                        </a>
                    </span>
              </div>
          </div>
      </div>
  </div>

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/vendor.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/custom.js') !!}" type="text/javascript"></script>

@section('scripts')
@show

</body>
</html>
