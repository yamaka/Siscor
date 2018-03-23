<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="http://webapplayers.com/inspinia_admin-v2.7.1/img/profile_small.jpg" />
                    </span>    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">                        
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->getFullName() }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::user()->username }} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
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
                        {{--  <li><a href="/logout">Logout</a></li>  --}}
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            {{--  <li class="">  --}}
            <li class="{{ isActiveRoute('Direction') }}">
                <a href="{{ url('/') }}"><i class="fa fa-cogs"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="">
                    <li class="">
                        <a href="{{url('/Direction')}}"> Direcciones</a>
                    </li>
                    <li>
                        <a href="{{url('/Unit')}}">Unidades</a>
                    </li>
                    <li>
                        <a href="{{url('/Position')}}">Cargos</a>
                    </li>
                    <li>
                        <a href="{{ url('/User') }}">Usuarios</a>
                    </li>
                </ul>
            </li>
            <li class="{{ isActiveRoute('Home') }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Principal</span></a>
            </li>
            <li class="{{ isActiveRoute('RoadMap') }}">
                <a href="{{ url('/RoadMap') }}"><i class="fa fa-list-alt"></i> <span class="nav-label">Hojas de Ruta</span></a>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                {{--  <li class="">  --}}
                <a href="{{ url('/minor') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Correspondencia</span>
                </a>
            </li>
        </ul>

    </div>
</nav>

