@extends('base.base')

@section('title', 'Seguimiento')

@section('breadcrumb')
    {!! Breadcrumbs::render('empresa') !!}
@stop

@section('content')

    @include('errors.error')


    {!! Form::model($seguimiento, [ 'route' => ['seguimiento.update', $seguimiento->id], 'method' => 'PUT']) !!}

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h5>Carga de novedad ::
                            <small>
                                {{ $empresa->razon_social }}
                            </small>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row mb-5">

                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            {!! Form::select('financiamiento', $tipofinanciamiento, $seguimiento->financiamiento, ['class' => 'form-control', 'placeholder' => 'Seleccione línea financiamiento ']) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <label>
                            <input type="radio" name="envia"  value="0" @if ($seguimiento->envia == 0) checked @endif> Recepción
                        </label>                
                    </div>

                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <label>
                            <input type="radio" name="envia"  value="1" @if ($seguimiento->envia == 1) checked @endif> Envío
                        </label>
                    </div>

                </div>

                <div class="row mb-5">
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
                            {!! Form::date('fecha_registro', null, ['class' => 'form-control', 'required',]) !!}
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
                            {!! Form::date('fecha_pactada', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label> Medio utilizado para enviar / recibir </label>
                            {!! Form::select('tipo', $tipoorigen, null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <label> Estado del seguimiento  </label>
                        {!! Form::select('estadoTipo', $tipoestado, null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        {!! Form::label('respuesta', 'Detalle de la novedad') !!}
                        {!! Form::textarea('respuesta', null, ['class' => 'form-control', 'autofocus' => 'true', 'required','rows' => '3']) !!}
                        <small>Máximo 1000 caracteres</small>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                        {!! Form::submit('Actualizar novedad', ['class' => 'btn btn-secondary']) !!}
                    </div>
                </div>
            </div>

        </div>


    {!! Form::close() !!}

@endsection
