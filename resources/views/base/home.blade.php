@extends('base.base')

@section('title', 'Inicio')

@section('breadcrumb')
    {!! Breadcrumbs::render('inicio') !!}
@stop

@section('content')


    @if (Auth::user()->hasRole(['user']))
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">

                <div class="card-group">

                    <div class="card mr-3 mb-3">
                        <div class="card-header badge-info text-center">
                            PROGRAMA FEDERAL DE FORTALECIMIENTO DE LA REACTIVACIÓN PRODUCTIVA
                        </div>
                        <div class="card-body">
                            <h5 class=" row">
                                <a class="nav-link text-info" href="{{ route('empresa.vincular') }}">
                                    <i class=" fa fa-pen-alt"></i> Ingresa aquí al programa
                                </a>
                            </h5>

                            Si sos industria o agroindustria, Recibí un Aporte No Reembolsable (ANR) mensual y por el plazo
                            máximo de TREINTA Y SEIS (36) cuotas por cada trabajador o trabajadora que contrates por tiempo
                            indeterminado y que desempeñe sus tareas en la Provincia de ENTRE RÍOS.
                            <br />
                            <br />


                            <p><u>BENEFICIOS: APORTES NO REEMBOLSABLES</u></p>

                            <p>Cada cupo por un nuevo puesto de trabajo permitirá acceder a un Aporte No Reembolsable, de
                                hasta TREINTA Y SEIS (36) pagos mensuales consecutivos.</p>

                            Para el caso de contrataciones correspondientes a las personas comprendidas en la Categoría “A”
                            del “Apéndice F” del Anexo a la Resolución N° 245/21 MDP (Mujeres, Personas Travestis,
                            Transexuales o Transgénero, Personas con Discapacidad)

                            <p> - Desde el mes de enero de 2022 al mes de diciembre de 2022, inclusive hasta la suma de
                                PESOS VEINTICUATRO MIL <strong>$ 24.000</strong>. </p>
                            <p> - Desde el mes de enero de 2023 al mes de diciembre de 2023, inclusive hasta la suma de
                                PESOS DIECISIETE MIL <strong>$ 17.000</strong>.</p>
                            <p> - Desde el mes de enero de 2024 al mes de diciembre de 2024, inclusive hasta la suma de
                                PESOS NUEVE MIL <strong>$ 9.000</strong>.</p>

                            Para el caso de contrataciones correspondientes a las personas comprendidas en la Categoría “B”
                            del “Apéndice F” del Anexo a la Resolución N° 245/21 MDP (varones):

                            <p>- Desde el mes de enero de 2022 al mes de diciembre de 2022, inclusive hasta la suma de $
                                <strong>21.000</strong>.
                            </p>
                            <p>- Desde el mes de enero de 2023 al mes de diciembre de 2023, inclusive hasta la suma de $
                                <strong>14.000</strong>.
                            </p>
                            <p>- Desde el mes de enero de 2024 al mes de diciembre de 2024, inclusive hasta la suma $
                                <strong>6.000</strong>.
                            </p>
                        </div>
                    </div>

                    <div class="card mr-3 mb-3">
                        <div class="card-header bg-success text-center">
                            PROGRAMA DE ASISTENCIA FINANCIERA PARA LA CONSOLIDACION PRODUCTIVA
                        </div>
                        <div class="card-body">

                            <h5 class="row">
                                <a class="nav-link text-success" href="{{ route('proyecto.index') }}">
                                    <i class=" fa fa-pen-alt"></i> Cargá aquí tu proyecto
                                </a>
                            </h5>

                            Crédito de hasta <strong> $8.000.000 </strong> y a tasa subsidiada para MiPyMEs entrerrianas en marcha,
                                destinados
                                a capital de trabajo o proyectos de inversión y capital de trabajo asociado.
                                </br>
                                &nbsp;
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endif

@endsection
