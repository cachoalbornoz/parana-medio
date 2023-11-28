<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/frontend/logo_er.png')}}" alt="logo" style=" width:40px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">

            @can('crearRole')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('users.index') }}">
                            <i class="fa fa-lock text-white" aria-hidden="true"></i>
                            Usuarios
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('roles.index') }}">
                            <i class="fa fa-address-card text-white" aria-hidden="true"></i>
                            Roles
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('permisos.index') }}">
                            <i class="fas fa-shield-alt text-white" aria-hidden="true"></i>
                            Permisos
                        </a>
                    </div>
                </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home')}}" title="Opciones de inicio">
                    <i class="fas fa-home"></i>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('proyecto.index')}}">
                        Proyecto
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('empresa.index')}}">
                        Empresa
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('documentacion.index')}}">
                        Documentación
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('asociado.index')}}">
                        Asociados
                    </a>
                </div>
            </li>



        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="mr-3">
                <a href="#">
                    @if (Str::length((Auth::user()->image)) > 0)
                        <img src="{{ asset('/public/images/upload/usuarios/'.Auth::user()->image) }}" class="rounded-circle" width="40" height="40" alt="Usuario" >
                    @else
                        <img src="{{ asset('/public/images/frontend/user.jpg')}}" class=" rounded-circle" width="40" height="40" alt="Usuario">
                    @endif
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <small>
                        {{ Auth::user()->nombre }} {{ Auth::user()->apellido }} (<i class="fa fa-circle text-success"></i> {{ Auth::user()->tieneRol() }} )
                    </small>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('users.editclave') }}">
                            <i class="fas fa-lock text-info" aria-hidden="true"></i> Cambiar clave
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        @if (Auth::user()->puedeEditar())

                            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                                <i class="fa fa-edit text-info" aria-hidden="true"></i> Editar datos
                            </a>

                        @else

                            <a class="dropdown-item" href="#">
                                <i class="fa fa-edit text-info" aria-hidden="true"></i> Editar datos
                            </a>

                        @endif

                    </li>

                    @can('crearRole')
                    <li class="dropdown-divider"></li>
                    <li>
                        <a href="{{ route('limpiar') }}" class="dropdown-item">
                            <i class="fa fa-trash text-info" aria-hidden="true"></i> Limpiar sistema
                        </a>
                    </li>
                    @endcan

                    <li class="dropdown-divider"> <li>
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">
                            <i class="fas fa-sign-out-alt text-info"></i> </i> Salir
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
