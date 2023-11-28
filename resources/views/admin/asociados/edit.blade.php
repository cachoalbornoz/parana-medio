@extends('base.base')

@section('title', 'Editar asociado ')

@section('breadcrumb')
{!! Breadcrumbs::render('proyecto') !!}
@stop

@section('content')

@include('errors.error')

<div class="card">
    {!! Form::model($asociado, ['route' => ['asociado.update', $asociado->id], 'method' => 'PUT']) !!}

    <div class="card-header">
        <div class="row h-100">
            <div class="col-xs-12 col-md-6 col-lg-6">
                <h5>
                    <h5> {{ $asociado->nombre }} {{ $asociado->apellido }}</h5>
                </h5>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 text-right">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    <label>Nombres</label>
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'autofocus'=>'true']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <label>Apellido</label>
                {!! Form::text('apellido', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <label>Dni</label>
                {!! Form::number('dni', null, ['class' => 'form-control', 'required', 'min'=>'0', 'maxlength'=>'10']) !!}
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <label>Nacionalidad</label>
                {!! Form::select('nacionalidad', $pais, null, ['class' => 'form-control', 'placeholder' => 'Seleccione nacionalidad', 'required' => 'true']) !!}
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <label>
                    Fecha Nacimiento
                </label>
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    {!! Form::date('fechanac', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-3 col-lg-3">
                <label>Cod. área: <small>(sin el 0)</small></label>
                {!! Form::text('codarea', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="col-xs-12 col-sm-9 col-lg-9">
                <label>Teléfono: <small>(sin el 15) / Particular / Laboral</small></label>
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-phone-alt"></i>
                        </span>
                    </div>
                    {!! Form::text('telefono', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row  mb-5">
            <div class="col-xs-12 col-sm-6 col-lg-6 mb-2">
                <label>Dirección Nro - (Dpto / Manzana / Barrio / Sector)</label>
                {!! Form::text('direccion', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="col-xs-12 col-sm-2 col-lg-2 mb-2">
                <label>Provincia</label>
                {!! Form::select('provincia', $provincia, $idprovincia, ['id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Seleccione provincia', 'required' => 'true']) !!}
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4 mb-2">
                <label>Ciudad</label>
                {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ciudad', 'required' => 'true']) !!}
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-xs-12 col-sm-12 col-lg-12">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>E-mail</label>
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-envelope"></i>
                            </span>
                        </div>
                        {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="card-footer border border-info">
        <div class="row mt-5 mb-3">
            <div class="col-xs-12 col-sm-6 col-lg-6">

                <h5>Programa inscripto</h5>
                <div class="row mb-2">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        {!! Form::select('tipo_programa', $programa, $idprograma, ['class' => 'form-control']) !!}
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4 d-none @if(Auth::user()->hasRole(['superadmin', 'admin'])) d-block @endif">
                <label class="checkbox-inline">
                    {{ Form::checkbox('habilitado', null) }}
                    Habilitado para cargar proyecto </p>
                </label>

            </div>
            <div class="col-xs-12 col-sm-2 col-lg-2 text-right">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>


@endsection