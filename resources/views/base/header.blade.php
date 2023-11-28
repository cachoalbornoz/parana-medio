@if (Auth::guest())

<div class="container">

    <div class="row pb-3">
        <div class="col-xs-4 col-md-3 col-lg-3 text-center">
            <img class=" img-fluid" src="{{ asset('images/frontend/cabecera.png') }}" alt="Desarrollo Económico" />
        </div>
        <div class="col-xs-8 col-md-9 col-lg-9 text-center">
        </div>
    </div>

    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark favenir pb-3">

        <a id="navbar_top-brand" class="navbar-brand d-none" href="#">
            <img src="{{ asset('images/frontend/logo_er.png') }}" alt="logo" style=" width:40px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav nav-fill">
                <li class="nav-item">
                    <a href="https://www.entrerios.gov.ar/economicoemprendedor/" class="nav-link">
                        INICIO
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('noticias.publicacion') }}" class="nav-link">
                        NOTICIAS
                    </a>
                </li>
                {{-- 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PROGRAMAS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href={{ route('pafinanciera') }}>
                                CONSOLIDACIÓN PRODUCTIVA
                            </a>
                            <a class="dropdown-item" href={{ route('patecnica') }}>
                                FORTALECIMIENTO MIPYME
                            </a>
                            <a class="dropdown-item" href="{{ route('pcooperativas') }}">
                                COOPERATIVAS DE TRABAJO
                            </a>
                            <a class="dropdown-item" href="{{ route('pcapitalTrabajo') }}">
                                CRÉDITOS BERSA
                            </a>
                            <a class="dropdown-item" href="{{ route('pestrategicos') }}">
                                CRÉDITOS BNA
                            </a>

                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('register') }}" class="nav-link">
                            REGISTRO
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link text-white">
                            INGRESAR
                        </a>
                    </li> 
                --}}
            </ul>
        </div>
    </nav>

</div>

@else

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/frontend/logo_er.png') }}" alt="logo" style=" width:40px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}" title="Opciones de inicio">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </li>

            @if (Auth::user()->hasRole(['superadmin', 'admin', 'dataentry']))


            @can('AdminRole')

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú usuarios
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
                    <div class="dropdown-divider"></div>
                </div>
            </li>

            @endcan


            @can('AdminProyecto')

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Autogestión
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('proyecto.index') }}">Proyectos</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li>
                        <a class="dropdown-item" href="{{ route('evaluacion.index') }}">Evaluacion</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li>
                        <a class="dropdown-item" href="{{ route('documentacion.index') }}">Documentacion</a>
                    </li>
                    <div class="dropdown-divider"></div>

                </ul>
            </li>

            @endcan


            @can('AdminEmpresaAdmin')

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administración
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Empresas</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('empresaEmpleo.indexAdmin') }}">
                                    Empresas - Programa de Fortalecimiento Productivo
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ route('empresa.create', 2) }}">Crear
                                    empresas (sin titular)
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ route('empresa.indexAdmin') }}">Lista de
                                    empresas
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ route('asociado.create') }}">Crear
                                    asociado
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ route('asociado.index') }}">Lista de
                                    asociados
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                        </ul>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Herramientas</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('auditoria.index') }}">
                                    Auditoria sistema
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('emisor.index') }}">
                                    Entidad contactos
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('origen.index') }}">
                                    Medio contactos
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('categoria.index') }}">
                                    Categorías empresas
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('financiamiento.index') }}">
                                    Tipo de financiamientos
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('ciudad.create') }}">
                                    Cargar ciudades
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('editasa') }}">
                                    Tasa simulador de préstamos
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-divider"></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Control/Seguimiento
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('expediente.index') }}">Listado expedientes</a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('pago.resumenCta') }}">Resumen de cuenta</a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('ingresos.futuro') }}">Ingresos futuros</a>
                    </li>
                    <li class="dropdown-divider"></li>
                </ul>
            </li>

            @endcan

            @can('AdminProyecto')

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Secretaria
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('noticias.index') }}">
                            Noticias
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                </ul>
            </li>

            @endcan


            @else

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/proyecto') }}" title="Proyectos registrados">
                    Proyecto
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/empresa') }}" title="Empresa registradas">
                    Empresa
                </a>
            </li>

            @endif

        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <small>
                        {{ Auth::user()->nombre }} {{ Auth::user()->apellido }} ({{ Auth::user()->tieneRol()}})
                    </small>
                </a>
                <ul class="dropdown-menu">

                    <li>
                        <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                            <i class="fa fa-edit" aria-hidden="true"></i> Editar datos
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('users.editclave') }}">
                            <i class="fas fa-lock" aria-hidden="true"></i> Cambiar clave
                        </a>
                    </li>



                    @can('AdminRole')
                    <li class="dropdown-divider"></li>
                    <li>
                        <a href="{{ route('limpiar') }}" class="dropdown-item">
                            <i class="fa fa-trash" aria-hidden="true"></i> Limpiar sistema
                        </a>
                    </li>
                    @endcan

                    <li class="dropdown-divider">
                    <li>
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">
                            <i class="fas fa-sign-out-alt"></i> </i> Salir
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

@endif