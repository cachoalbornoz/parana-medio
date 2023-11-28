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
            <img src="{{ asset('public/images/frontend/prog_proyecto_estrategico.png') }}" class=" img-fluid" />
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
                LÍNEAS DE CRÉDITOS PARA PROYECTOS ESTRATÉGICOS
            </h5>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        La línea está destinada a proyectos de inversión productiva dentro de la provincia de Entre Ríos.
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="row mt-2 mb-2">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            &nbsp;
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            - <b>Montos a financiar</b> : desde 40 millones de pesos hasta 100 millones de pesos por proyectos.
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            - <b>Tasa </b> : fija nominal anual vencida del 22 por ciento.
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            - <b>Plazo de amortización</b> : hasta 72 meses incluido un periodo de gracia para capital de 12 meses

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            - <b>Sistema de amortización </b> : francés.
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            - <b>Garantías </b> : a satisfacción del Banco.
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            - Se propicia que al menos el 20% del cupo de los créditos esté dirigido a empresas lideradas o de propiedad de mujeres.
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            - <b>Requisito </b> : contar con certificado MiPyME vigente.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


@endsection