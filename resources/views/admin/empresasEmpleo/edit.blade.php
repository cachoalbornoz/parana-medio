@extends('base.base')

@section('title', 'Editar empresa')

@section('breadcrumb')
    {!! Breadcrumbs::render('empresa') !!}
@stop

@section('content')

    @include('errors.error')


    <div class="card">
        {!! Form::model($empresa, ['route' => ['empresaEmpleo.update', $empresa->id], 'method' => 'PUT']) !!}

        <div class="card-header">

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-lg-10">
                    <h5>{{ $empresa->razon_social }}</h5>
                </div>
                <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>

        </div>

        <div class="card-body">

            <div class="row mt-5 mb-5">
                <div class="col-xs-12 col-md-8 col-lg-8 mb-2">
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                <small class=" text-danger font-weight-bold">*</small> &nbsp; Razón social
                            </span>
                        </div>
                        {!! Form::text('razon_social', null, ['autofocus' => 'true', 'class' => 'form-control', 'required', 'placeholder' => 'Razón social de la empresa']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                <small class=" text-danger font-weight-bold">*</small> &nbsp; Responsable / Titular /
                                Apoderado
                            </span>
                        </div>
                        {!! Form::select('titular', $usuario, null, ['class' => 'form-control', 'required' => 'true']) !!}
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                    {!! Form::label('cuit', 'Nro Cuit') !!}
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                <small class=" text-danger font-weight-bold">*</small> &nbsp;
                            </span>
                        </div>
                        {!! Form::text('cuit', null, ['class' => 'form-control', 'required', 'maxlength' => '11']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                    <label> <small class=' text-danger font-weight-bold'>*</small> &nbsp; Tipo sociedad</label>
                    {!! Form::select('tipo_sociedad', $sociedad, null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 mb-2">
                    <label> <small class=' text-danger font-weight-bold'>*</small> &nbsp; Certificado MiPyME</label>
                    {!! Form::select('tipopyme', $tipopyme, null, ['onChange' => 'showLink(this.value)', 'class' => 'form-control', 'required' => 'true']) !!}
                </div>
                <div id="divPyme" class="col-xs-12 col-md-1 col-lg-1 d-none">
                    <label>Link acceso <b>?</b></label><br>
                    <small>Si no realizaste el trámite, accedé desde <a href="#"> acá </a> </small>
                </div>
            </div>

            <div class="row mt-3 mb-5">
                <div class="col-xs-12 col-md-1 col-lg-1 mb-2">
                    <div class="form-group">
                        <label><small class=" text-danger font-weight-bold">*</small> &nbsp; CodArea </label>
                        {!! Form::text('codarea', null, ['class' => 'form-control', 'maxlength' => '5', 'required' => 'true']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 mb-2">
                    <div class="form-group">
                        <label> <small class=' text-danger font-weight-bold'>*</small> &nbsp; Teléfonos </label>
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'required' => 'true']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                    <div class="form-group">
                        <label> <small class=' text-danger font-weight-bold'>*</small> &nbsp; Dirección </label>
                        {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => 'true']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-2">
                    <label> <small class=' text-danger font-weight-bold'>*</small> &nbsp; Provincia</label>
                    {!! Form::select('provincia', $provincia, $idprovincia, ['id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Seleccione provincia', 'required' => 'true']) !!}
                </div>
                <div class="col-xs-12 col-md-2 col-lg-2 mb-2">
                    <label> <small class=' text-danger font-weight-bold'>*</small> &nbsp;Ciudad </label>
                    {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ciudad']) !!}
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-md-12 col-lg-12 mb-2">
                    <div class="card border border-danger">
                        <div class="card-header">
                            <label>
                                Actividad principal de la empresa
                                (<small class=' text-danger'>Todos los datos son necesarios</small>)
                            </label>
                        </div>
                        <div class="card-body">

                            <div class="row">
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
                                    {!! Form::textarea('actividad1', null, ['class' => 'form-control', 'rows' => '1']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-3 mb-2">
                                    <label>
                                        Fecha inscripción en Registro Público
                                    </label>
                                    <div class="input-group">
                                        <div class=" input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        {!! Form::date('fecha_inscripcion', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

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

                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-lg-8 mb-2">
                                    <div class="form-group">
                                        {!! Form::label('direccion_actividad', 'Dirección') !!}
                                        {!! Form::text('direccion_actividad', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                                    {!! Form::label('ciudad_actividad', 'Ciudad') !!}
                                    {!! Form::select('ciudad_actividad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ciudad']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-md-8 col-lg-8 mb-2">
                    <div class="form-group">
                        <label>
                            <small class=" text-danger font-weight-bold">*</small> &nbsp;
                            Apellido y nombres del representante o apoderado legal
                        </label>
                        {!! Form::text('representante', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 mb-2">
                    <label>
                        <small class=" text-danger font-weight-bold">*</small> &nbsp;
                        Cuit del representante legal
                    </label>
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                #
                            </span>
                        </div>
                        {!! Form::text('cuit_representante', null, ['class' => 'form-control', 'required', 'maxlength' => '11']) !!}
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="card border border-secondary">
                        <div class="card-header">
                            Datos adicionales
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class=" input-group-prepend">
                                                <span class="input-group-text">
                                                    Web / Url / Redes &nbsp; <i class="fas fa-globe-americas"></i>
                                                </span>
                                            </div>
                                            {!! Form::text('url', 'No posee', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-xs-12 col-md-12 col-lg-12 mb-2">
                                    <div class="form-group">
                                        {!! Form::label('observaciones', 'Observaciones') !!}
                                        {!! Form::textarea('observaciones', 'No posee', ['rows' => '3', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-5">
                <div class="col-xs-12 col-md-10 col-lg-10 mb-2">
                    <small>
                        <span class=" text-danger font-weight-bold">*</span>
                        Datos obligatorios
                    </small>
                </div>
                <div class="col-xs-12 col-md-2 col-lg-2 mb-2 text-center">
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
        const divPyme = $("#divPyme");

        const showLink = (id) => {

            if (id == 5) {
                divPyme.removeClass('d-none')
            } else {
                divPyme.addClass('d-none')
            }

        }
    </script>

@endsection
