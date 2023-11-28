@extends('base.base')

@section('title', 'Seguimiento')

@section('breadcrumb')
{!! Breadcrumbs::render('empresa') !!}
@stop

@section('content')

@include('errors.error')


{!! Form::open([ 'route' => 'seguimiento.store' ]) !!}

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">
                <h5>Carga de novedad ::
                    <small>
                        {{ $empresa->razon_social }}
                    </small>
                </h5>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">

                {!! Form::hidden('usuario', Auth::user()->id) !!}
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user text-info"></i> &nbsp; usuario
                        </span>
                    </div>
                    <input type="text" value="{{ Auth::user()->nombrecompleto }}" class=" form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="row mt-5 mb-5">
            <div class="col-xs-12 col-md-6 col-lg-6">
                <label> Línea de financiamiento </label>
                <div class="form-group">
                    {!! Form::select('financiamiento', $tipofinanciamiento, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione línea por favor']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-md-3 col-lg-6">

                <label> Estado del seguimiento </label>
                {!! Form::select('estadoTipo', $tipoestado, 5, ['class' => 'form-control', 'required']) !!}

                <label>
                    <hidden type="radio" name="envia" value="0" checked>
                </label>

                <label>
                    <hidden type="radio" name="envia" value="1">
                </label>
            </div>

        </div>

        <div class="row mb-5">
            {!! Form::hidden('empresa', request()->route()->parameters['id']) !!}

            <div class="col-xs-12 col-md-3 col-lg-3">
                <label>
                    Fecha novedad
                </label>
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt text-info"></i>
                        </span>
                    </div>
                    {!! Form::date('fecha_registro', \Carbon::now(), ['class' => 'form-control', 'required',]) !!}
                </div>
            </div>

            <div class="col-xs-12 col-md-3 col-lg-3">
                <label>
                    Fecha posible respuesta
                </label>
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt text-primary"></i>
                        </span>
                    </div>
                    {!! Form::date('fecha_pactada', \Carbon::now()->addDays(7), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-md-3 col-lg-3">
                <div class="form-group">
                    <label> Medio utilizado para enviar / recibir </label>
                    {!! Form::select('tipo', $tipoorigen, 1, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-md-12 col-lg-12">
                {!! Form::label('respuesta', 'Detalle de la novedad') !!}
                {!! Form::textarea('respuesta', null, ['class' => 'form-control', 'autofocus' => 'true', 'required','rows' => '3']) !!}
                <small>Máximo 1000 caracteres</small>
            </div>

        </div>


        <div class="row mb-2">
            <div class="col-xs-12 col-md-12 col-lg-12">

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                {!! Form::submit('Crear novedad', ['class' => 'btn btn-secondary']) !!}
            </div>
        </div>

    </div>

</div>


{!! Form::close() !!}

@endsection