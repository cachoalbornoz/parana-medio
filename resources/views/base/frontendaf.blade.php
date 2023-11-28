@extends('base.base')

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
                <img src="{{ asset('public/images/frontend/prog_financ.png') }}" class=" img-fluid" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <h5 class="favenir mb-3">
                    PROGRAMA DE ASISTENCIA FINANCIERA PARA LA CONSOLIDACIÓN PRODUCTIVA
                </h5>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row mt-3 mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                El Programa de Asistencia Financiera para la Consolidación Productiva otorga créditos dirigidos a las
                MiPyMEs entrerrianas en marcha, destinados a capital de trabajo o proyectos de inversión y capital de
                trabajo asociado.
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class="mt-3 mb-5">Requisitos</h4>

                <li class=" p-2">Ser persona física o jurídica constituida en la provincia de Entre Ríos.</li>
                <li class=" p-2">Contar con certificado MiPyME vigente.</li>
                <li class=" p-2">Estar inscriptos en la AFIP (Administración Federal de Ingresos Públicos) y en
                    ATER (Administración Tributaria de Entre Ríos).</li>
                <li class=" p-2">Tener un mínimo de un (1) año de antigüedad en la actividad objeto del proyecto.
                </li>
                <li class=" p-2">Cumplir con la normativa exigida para el desarrollo de su actividad, las normas
                    de higiene y seguridad industrial exigibles y la normativa ambiental exigible.</li>

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class="mt-3 mb-5">Financiamiento</h4>

                <p class=" p-2">
                    Créditos de hasta <strong>$8.000.000</strong> (PESOS OCHO MILLONES) para capital de trabajo o inversión
                    y capital de trabajo asociado. Se financiará hasta el CIEN POR CIENTO (100%) del proyecto presentado. El monto
                    solicitado no podrá superar, en ningún caso, el 50% del total de la facturación anual del ejercicio
                    anterior por parte de la empresa.
                </p>

                <li class=" p-2">Garantía: a sola firma (pagaré). A satisfacción de la evaluación del riesgo
                    crediticio por parte de la Secretaría a partir del proyecto presentado.</li>
                <li class=" p-2">Tasa: <strong>20% de la TNA fijas</strong>. Además, las empresas lideradas por mujeres
                    podrán acceder a una reducción de tasa de 2 puntos porcentuales más.</li>
                <li class=" p-2">Sistema de amortización: francés.</li>
                <li class=" p-2">Plazo de gracia: 6 meses, para capital de trabajo y 12 meses para inversión y
                    capital de trabajo asociado.</li>
                <li class=" p-2">Devolución: 18 meses a partir de la finalización del plazo de gracia.</li>
                <li class=" p-2">Presentación: mediante sistema web. Convocatoria abierta hasta agotar cupo
                    presupuestario disponible.
                </li>

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <a href="{{ route('register') }}" class=" btn btn-info"> Registrate</a>
            </div>
        </div>


    </div>


@endsection
