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
            <img src="{{ asset('public/images/frontend/prog_financ_cooperativas_grande.jpeg') }}" class=" img-fluid" />
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
                PROGRAMA DE FINANCIAMIENTO PARA COOPERATIVAS DE TRABAJO
            </h5>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <p class="mb-2 font-weight-bolder">Beneficiarios</p>
            La línea está destinada a las cooperativas de trabajo entrerrianas que buscan financiar proyectos de
            adquisición de capital de trabajo o de inversión y capital de trabajo incremental.
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <p class="mb-2 font-weight-bolder">Requisitos de las cooperativas solicitantes</p>
            <ul>
                <li> Ser una cooperativa de trabajo constituida en la provincia de Entre Ríos</li>
                <li> Contar con inscripción vigente ante el IPCYMER (Instituto de Promoción de Cooperativas y
                    Mutualidades de Entre Ríos)</li>
                <li> Contar con certificado MiPyME vigente</li>
                <li> Estar inscriptos en la AFIP y en ATER</li>
                <li> Tener un mínimo de un (1) año de antigüedad en la actividad objeto del proyecto</li>
                <li> Cumplir con la normativa exigida para el desarrollo de su actividad</li>
            </ul>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <p class="mb-2 font-weight-bolder">Monto a financiar</p>
            Crédito hasta <strong> $3.000.000</strong> (PESOS TRES MILLONES). El monto máximo a solicitar en ningún caso podrá superar el
            50% del total de facturación de la cooperativa correspondiente al año anterior
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <p class="mb-2 font-weight-bolder">Características del Financiamiento</p>
            - Se financiará hasta el CIEN POR CIENTO (100%) del proyecto presentado
            anual del ejercicio anterior por parte de la cooperativa
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <p class="mb-2 font-weight-bolder">
                - Características de la línea:
            </p>
            <ul>

                <li> Garantía: a sola firma (pagaré). A satisfacción de la evaluación del riesgo crediticio por parte de
                    la Secretaría a partir del proyecto presentado.
                </li>

                <li> Tasa: 50% de la Tasa Activa de Cartera General Nominal Anual en pesos del Banco de la Nación
                    Argentina menos dos puntos porcentuales.


                    En ningún caso la tasa resultante podrá superar el 30%, que se establece como tope máximo de interés
                    a aplicar al financiamiento otorgado mediante el presente Programa.
                </li>

                <li> Casos especiales de subsidio de tasa: la cooperativa podrá acceder a un subsidio de tasa mayor en
                    caso de
                    que se cumplan las siguientes condiciones:
                    <ul>
                        <li>a. Cooperativas lideradas por mujeres.</li>
                        <li>b. Cooperativas lideradas por jóvenes.</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <p class="mb-2 font-weight-bolder">
                El cumplimiento de cada una de estas condiciones habilitará a la cooperativa habilitará a la cooperativa
                a acceder a 2 puntos porcentuales más de subsidio de tasa.
            </p>

            <ul>
                <li>Sistema: francés</li>
                <li>Plazo de gracia: 6 meses para los proyectos de capital de trabajo, 12 meses para los proyectos de
                    inversión y capital de trabajo asociado.</li>
            </ul>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <p class="mb-2 font-weight-bolder">
                El plazo de gracia será sobre capital e intereses.
            </p>
            <ul>
                <li>Devolución: 18 meses a partir de la finalización del plazo de gracia.</li>
            </ul>
        </div>
    </div>



</div>


@endsection