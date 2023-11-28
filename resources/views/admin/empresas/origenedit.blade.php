@extends('base.base')

@section('title', 'Editar empresa')

@section('breadcrumb')
    {!! Breadcrumbs::render('empresa') !!}
@stop

@section('content')

    @include('errors.error')


    <div class="card">
        {!! Form::model($origen, ['route' => ['empresa.origenUpdate', $origen->id], 'method' => 'PUT']) !!}

        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <h5>
                        Origen del Registro
                    </h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            {!! Form::hidden('empresa', $empresa->id) !!}
            <div class="row mb-3">
                <div class="col-xs-12 col-md-12 col-lg-12 mb-2">
                    <label>
                        Detalle / observaciones
                    </label>
                    {!! Form::textarea('descripcion', null, ['autofocus' => 'true', 'class' => 'form-control', 'rows' => '3']) !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                    <label>
                        Quién nos envió el dato
                    </label>
                    {!! Form::select('emisor', $emisor, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ...']) !!}
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                    <label>
                        Medio por el cual nos llegó la info
                    </label>
                    {!! Form::select('origen', $tipoorigen, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ...']) !!}
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                    <div class="form-group">
                        <label>
                            Fecha registro
                        </label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            {!! Form::date('fecha', null, ['id' => 'fecha', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-5">
                <div class="col-xs-12 col-md-12 col-lg-12 mb-2 text-right">

                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

                </div>
            </div>
        </div>

        {!! Form::close()  !!}
    </div>


@endsection
