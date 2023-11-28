@extends('base.basesec')

@section('title', 'Inicio')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <img src="{{ asset('public/images/frontend/portada.jpeg') }}" class="img-fluid" />
            </div>
        </div>


        <div class="row mb-5 mt-5">
            <div class="col">

                <nav class="navbar navbar-expand-lg navbar-light bg-dark favenir pb-3">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">

                        <ul class="navbar-nav nav-fill w-100">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    FINANCIAMIENTO
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('pafinanciera') }}">
                                        - Empresas
                                    </a>
                                    <a class="dropdown-item" href="{{ route('pcooperativas') }}">
                                        - Cooperativas
                                    </a>
                                    <hr>
                                    <p class="ml-2 block">Emprendedores</p>

                                    <a class="dropdown-item"
                                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_jovenes.php">
                                        - Créditos a tasa cero
                                    </a>

                                    <a class="dropdown-item"
                                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_proaccer.php">
                                        - ANR para comercialización
                                    </a>

                                    <a class="dropdown-item"
                                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_proceder.php">
                                        - ANR para innovación
                                    </a>

                                    <hr />

                                    <a class="dropdown-item" href="{{ route('pcapitalTrabajo') }}">
                                        - Banco de Entre Ríos
                                    </a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    CAPACITACIONES
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <h6 class="ml-2 mr-2">Empresas y Cooperativas </h6>

                                    <a class="dropdown-item" href="{{ route('patecnica') }}">
                                        - Asistencia Técnica
                                    </a>

                                    <hr />

                                    <h6 class="ml-2">Emprendedores</h6>
                                    <a class="dropdown-item"
                                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_formacion.php">
                                        - Capacitaciones
                                    </a>
                                    <a class="dropdown-item"
                                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_tutorias.php">
                                        - Tutorías
                                    </a>

                                </div>
                            </li>

                        </ul>

                    </div>
                </nav>

            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">
                <div class="mb-3 text-center h-100">
                    <a href="{{ route('programasp') }}">
                        <img src="{{ asset('public/images/frontend/portadapymes_new.png') }}"
                            class=" img-fluid img-medium" />
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">
                <div class="mb-3 text-center h-100">
                    <a href="https://www.entrerios.gov.ar/desarrolloemprendedor" target="_blank">
                        <img src="{{ asset('public/images/frontend/portadad_new.png') }}" class=" img-fluid img-medium" />
                    </a>
                </div>
            </div>
        </div>

        <div class="row favenir">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h3 class=" mt-5 mb-5">Trayectorías de Jóvenes Emprendedores </h3>

                <div class="row mt-3">
                    <div class="col-6">
                        <h4 class="mb-3">Caravan Café y Crepes</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/Dt8ogUJgvzA" title="Caravan Café y Crepes"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="mb-3">Cocomelón</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/H1Qjf5uD3yM" title="Cocomelón" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-6">
                        <h4 class="mt-5 mb-3">Micro Digital Tecnología Forense</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/uUIdZDCtF-A" title="Micro Digital Tecnología Forense"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="mt-5 mb-3">Luthier</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/sFd9hsyyAWM"
                                title="Luthier" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 mb-5">
                    <div class="col-6">
                        <h4 class="mt-5 mb-3">Eco Diseño Paraná</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/EY_GwrvaFtg" title="Eco Diseño Paraná"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="mt-5 mb-3">Cooperativa de Trabajo Tenondé Limitada</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/W3crBn2yzgk"
                                title="Cooperativa de Trabajo Tenondé Limitada" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                @include('base.noticias')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

    </div>


@endsection
