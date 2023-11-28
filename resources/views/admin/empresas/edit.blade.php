@extends('base.base')

@section('title', 'Editar empresa')

@section('breadcrumb')
{!! Breadcrumbs::render('empresa') !!}
@stop

@section('content')

@include('errors.error')


<div class="card">
    {!! Form::model($empresa, ['route' => ['empresa.update', $empresa->id], 'method' => 'PUT']) !!}

    <div class="card-header">

        <div class="row">
            <div class="col-xs-12 col-sm-10 col-lg-10">
                <h5>{{ $empresa->razon_social }}</h5>
            </div>

            <div class="col-xs-12 col-sm-1 col-lg-1">
                @if (!Auth::user()->hasRole(['user']))
                <a href="{{ route('empresa.origenEdit', $empresa->id) }}" class='btn btn-secondary btn-block'>
                    Origen
                </a>
                @endif
            </div>
            <div class="col-xs-12 col-sm-1 col-lg-1">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>

    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 mb-2">
                <small>Por favor complete todos los campos </small>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-xs-12 col-md-6 col-lg-6 mb-2">
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            Razón social
                        </span>
                    </div>
                    {!! Form::text('razon_social', null, ['autofocus' => 'true', 'class' => 'form-control', 'required', 'placeholder' => 'Razón social de la empresa']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            Responsable / Titular / Apoderado
                        </span>
                    </div>
                    {!! Form::select('titular', $usuario, null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            Email
                        </span>
                    </div>
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                {!! Form::label('cuit', 'Nro de Cuit') !!}
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            #
                        </span>
                    </div>
                    {!! Form::text('cuit', null, ['class' => 'form-control', 'required', 'maxlength' => '11']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                <label>Tipo sociedad</label>
                {!! Form::select('tipo_sociedad', $sociedad, null, ['class' => 'form-control', 'required' => 'true']) !!}
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                <label>Certificado MiPyME</label>
                {!! Form::select('tipopyme', $tipopyme, null, ['class' => 'form-control', 'required' => 'true']) !!}
            </div>
        </div>

        <div class="row mt-3 mb-5">
            <div class="col-xs-12 col-md-1 col-lg-1 mb-2">
                <div class="form-group">
                    {!! Form::label('codarea', 'CodArea') !!}
                    {!! Form::text('codarea', null, ['class' => 'form-control', 'maxlength' => '5', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-md-3 col-lg-3 mb-2">
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfonos') !!}
                    {!! Form::text('telefono', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                <div class="form-group">
                    {!! Form::label('direccion', 'Dirección') !!}
                    {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-lg-2">
                <label>Provincia</label>
                {!! Form::select('provincia', $provincia, $idprovincia, ['id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Seleccione provincia', 'required' => 'true']) !!}
            </div>
            <div class="col-xs-12 col-md-2 col-lg-2 mb-2">
                {!! Form::label('ciudad', 'Ciudad') !!}
                {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ciudad']) !!}
            </div>
        </div>

        @if (Auth::user()->hasRole(['superadmin', 'admin', 'dataentry']))
        <div class="card p-2 border-info mb-2">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                        <strong>Interés principal de la Empresa</strong>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                        {!! Form::select('interes', $interes, null, ['id' => 'interes', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4 mb-2 text-right">
                        {!! Form::button('Agregar interés', ['class' => 'btn btn-primary cargarinteres']) !!}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="div_interes">
                    @include('admin.empresas.detalleInteres')
                </div>
            </div>
        </div>
        @endif

        <div class="card p-2 border-info mb-2">

            <div class="row mb-3">
                <div class="col-xs-12 col-md-3 col-lg-3 mb-2">
                    {!! Form::label('categoria1', 'Actividad principal') !!}
                    {!! Form::select('categoria1', $categoria, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 mb-2">
                    {!! Form::label('codigoafip1', 'CódAfip') !!}
                    {!! Form::text('codigoafip1', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 mb-2">
                    <label>Detalle actividad </label>
                    {!! Form::textarea('actividad1', null, ['class' => 'form-control', 'rows' => '2']) !!}
                </div>
            </div>

            <div class="row mb-3">

                <div class="col-xs-12 col-md-3 col-lg-3 mb-2">
                    <div class="form-group">
                        <label>
                            Fecha inicio de las actividades
                        </label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            {!! Form::date('fecha_inicio', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3 mb-5">
            <div class="col-xs-12 col-md-11 col-lg-11 mb-2">

            </div>
            <div class="col-xs-12 col-md-1 col-lg-1 mb-2">
                <div class="form-group">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>


@endsection

@section('js')

<script>
    $(document).on("click", ".cargarinteres", function() {

            var interes = $("#interes").val();
            var empresa = {{ $empresa->id }};

            $.ajax({

                url: "{{ route('empresa.addInteres') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    interes: interes,
                    empresa: empresa
                },
                success: function(data) {
                    $('.div_interes').html(data);
                }
            });

        })

        $(document).on("click", ".borrarinteres", function() {

            var texto = '&nbsp; Elimina interés cargado ? &nbsp;';
            var id = this.id;
            var empresa = {{ $empresa->id }};

            ymz.jq_confirm({
                title: texto,
                text: "",
                no_btn: "Cancelar",
                yes_btn: "Confirma",
                no_fn: function() {
                    return false;
                },
                yes_fn: function() {

                    $.ajax({

                        url: "{{ route('empresa.removeInteres') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id,
                            empresa: empresa
                        },
                        success: function(data) {
                            $('.div_interes').html(data);
                        }
                    });
                }
            });

        })
</script>

@endsection