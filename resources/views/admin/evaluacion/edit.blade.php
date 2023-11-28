@extends('base.base')

@section('title', 'Editar evaluacion')

@section('breadcrumb')
    {!! Breadcrumbs::render('evaluacion.edit', $evaluacion) !!}
@endsection

@section('content')

    @include('errors.error')

    <div class="card">
        {!! Form::model($evaluacion, ['route' => ['evaluacion.update', $evaluacion->id], 'method' => 'PUT']) !!}

        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-lg-9">
                    <h5>
                        {{ $evaluacion->Proyecto->Empresa->razon_social }} -
                        ({{ $evaluacion->Proyecto->Titular->apellido }}, {{ $evaluacion->Proyecto->Titular->nombre }})
                    </h5>
                </div>

                <div class="col-xs-12 col-sm-3 col-lg-3 text-right">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-info']) !!}
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="card mb-5 bg-info text-white">
                <div class="row p-3">

                    <div class="col-xs-12 col-md-4 col-lg-4 mb-4">
                        <label>
                            Fecha evaluación
                        </label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4 mb-4">
                        {!! Form::label('evaluador', 'Quién realiza la evaluación ?') !!}
                        {!! Form::select('evaluador', $evaluador, null, ['class' => 'form-control', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4 mb-4">
                        {!! Form::label('estado', 'Estado de la evaluación') !!}
                        {!! Form::select('estado', $estado, null, ['class' => 'form-control', 'placeholder' => 'Seleccione estado de su evaluación', 'required' => 'true']) !!}
                    </div>

                </div>
            </div>

            <div class="card mb-5 bg-light">

                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::textarea('observacion1', null, ['autofocus' => true, 'class' => 'form-control mb-3', 'rows' => '2', 'placeholder' => 'Si desea, ingrese una observación']) !!}
                        {!! Form::label('observacion1', 'a - Las perspectivas de consolidación o escalamiento de la empresa solicitante, en sus distintas facetas, mediante el aporte requerido') !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::number('puntaje1', null, ['class' => 'form-control mb-3 text-center', 'required', 'required', 'min' => 0, 'max' => '15', 'onkeyup' => 'imposeMinMax(this)']) !!}
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        <small>Máx 500 caracteres</small>
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        <small>Máx 15</small>
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-light">
                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::textarea('observacion2', null, ['class' => 'form-control mb-3', 'rows' => '2', 'placeholder' => 'Si desea, ingrese una observación']) !!}
                        {!! Form::label('observacion2', 'b - La capacidad económica, financiera y operativa del solicitante para desarrollar las actividades propuestas') !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::number('puntaje2', null, ['class' => 'form-control mb-3 text-center', 'required', 'required', 'min' => 0, 'max' => '10', 'onkeyup' => 'imposeMinMax(this)']) !!}
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        <small>Máx 500 caracteres</small>
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        <small>Máx 10</small>
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-light">
                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::textarea('observacion3', null, ['class' => 'form-control mb-3', 'rows' => '2', 'placeholder' => 'Si desea, ingrese una observación']) !!}
                        {!! Form::label('observacion3', 'c - La facturación de la empresa en el año anterior, en referencia al requisito de la línea por el cual no puede solicitarse en carácter de crédito más del 50% del total de la misma') !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::number('puntaje3', null, ['class' => 'form-control mb-3 text-center', 'required', 'min' => 0, 'max' => '10', 'onkeyup' => 'imposeMinMax(this)']) !!}
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        <small>Máx 500 caracteres</small>
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        <small>Máx 10</small>
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-light">
                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::textarea('observacion4', null, ['class' => 'form-control mb-3', 'rows' => '2', 'placeholder' => 'Si desea, ingrese una observación']) !!}
                        {!! Form::label('observacion4', 'd - La adecuación del proyecto a la perspectiva de sostenibilidad económica que presenta el solicitante') !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::number('puntaje4', null, ['class' => 'form-control mb-3 text-center', 'required', 'min' => 0, 'max' => '20', 'onkeyup' => 'imposeMinMax(this)']) !!}
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        <small>Máx 500 caracteres</small>
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        <small>Máx 20</small>
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-light">
                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::textarea('observacion5', null, ['class' => 'form-control mb-3', 'rows' => '2', 'placeholder' => 'Si desea, ingrese una observación']) !!}
                        {!! Form::label('observacion5', 'e - La contribución a la preservación de las fuentes laborales dependientes de la MiPyME') !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::number('puntaje5', null, ['class' => 'form-control mb-3 text-center', 'required', 'min' => 0, 'max' => '20', 'onkeyup' => 'imposeMinMax(this)']) !!}
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        <small>Máx 500 caracteres</small>
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        <small>Máx 20</small>
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-light">
                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::textarea('observacion6', null, ['class' => 'form-control mb-3', 'rows' => '2', 'placeholder' => 'Si desea, ingrese una observación']) !!}
                        {!! Form::label('observacion6', 'f - La incorporación de perspectiva de sustentabilidad ambiental, social y de género por parte de la MiPyME') !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::number('puntaje6', null, ['class' => 'form-control mb-3 text-center', 'required', 'min' => 0, 'max' => '15', 'onkeyup' => 'imposeMinMax(this)']) !!}
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        <small>Máx 500 caracteres</small>
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        <small>Máx 15</small>
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-light">
                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::textarea('observacion7', null, ['class' => 'form-control mb-3', 'rows' => '2', 'placeholder' => 'Si desea, ingrese una observación']) !!}
                        {!! Form::label('observacion7', 'g - El encuadramiento del destino del financiamiento solicitado a los términos previstos en la presente Resolución y normas complementarias') !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::number('puntaje7', null, ['class' => 'form-control mb-3 text-center', 'required', 'min' => 0, 'max' => '10', 'onkeyup' => 'imposeMinMax(this)']) !!}
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        <small>Máx 500 caracteres</small>
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        <small>Máx 10</small>
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-light">
                <div class="row p-3">
                    <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                        {!! Form::hidden('observacion8', null, ['class' => 'form-control mb-3']) !!}
                    </div>
                    <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
                        {!! Form::hidden('puntaje8', 0) !!}
                    </div>
                </div>
            </div>

            <div class="card mb-5 bg-info text-white">
                <div class="row p-2">
                    <div class="col-xs-12 col-md-12 col-lg-12 mb-2">
                        {!! Form::label('comentario', 'Escriba la observación o comentario final de la evaluación') !!}
                        {!! Form::textarea('comentario', null, ['class' => 'form-control', 'rows' => '2', 'required' => true]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 m-3">
                        <small>Máx 500 caracteres</small>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                    <div class="form-group">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-info']) !!}
                    </div>
                </div>
            </div>


        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('js')

    <script>
        $('.anular').on('click', function() {
            var proyecto = {{ $evaluacion->Proyecto->id }};

            ymz.jq_confirm({
                title: '<div class="text-center m-3">Confirma anular la evaluación ?</div>',
                text: "<br>",
                no_btn: "No",
                yes_btn: "Si",
                no_fn: function() {

                    return false;
                },
                yes_fn: function() {

                    $.ajax({

                        url: '{{ route('proyecto.cambioestado') }}',
                        type: 'POST',
                        data: {
                            id: proyecto,
                            estado: 20
                        },
                    });

                    window.location.href = '{{ route('proyecto.index') }}';
                    toastr.options = {
                        "progressBar": true,
                        "showDuration": "300",
                        "timeOut": "1000"
                    };
                    toastr.success("&nbsp;", "Proyecto rehabilitado para la carga ... ");
                }
            })
        })
    </script>

@endsection
