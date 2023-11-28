@extends('base.base')

@section('title', 'Editar proyecto')

@section('breadcrumb')
{!! Breadcrumbs::render('proyecto.edit', $proyecto) !!}
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

{!! Form::model($proyecto, ['route' => ['proyecto.update', $proyecto->id], 'method' => 'PUT', 'id' => 'proyecto']) !!}

<div id="spopup">
    <div class="btn-group bg-secondary" role="group" aria-label="botones">

        @include('admin.proyectos.cabecera')

        <span class="estado btn btn-info">
            @if (!$proyecto->TieneVacios())
            Completo
            @else
            Incompleto
            @endif
        </span>
        <a class="btn btn-secondary enviar" title="Guardar ó Presione F10">
            <i class="fas fa-save text-white"></i>
        </a>
        <a class="btn btn-secondary" href="{{ route('print.proyecto', $proyecto->id)}}" title="Imprime proyecto">
            <i class="fas fa-print"></i>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <h4>Edición del proyecto</h4>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 text-right">

                        @include('admin.proyectos.cabecera')

                        <a class="btn btn-info enviar" title="Guardar o Presione F10">
                            <i class="fas fa-save text-white"></i>
                        </a>
                        @if (isset($proyecto->empresa))
                        <a class="btn btn-info" href="{{ route('print.proyecto', $proyecto->id)}}" title="Imprime proyecto">
                            <i class="fas fa-print"></i>
                        </a>
                        @else
                        <a class="btn btn-info" href="#" title="Imprime proyecto">
                            <i class="fas fa-print"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="card border mb-2">
                    <div class="card-header bg-secondary text-white p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <label>Titular del proyecto</label>
                                <div class="input-group">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            Apellido y Nombres
                                        </span>
                                    </div>
                                    {!! Form::select('titular', $usuarios, null, ['class' => 'form-control bg-white']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <label>Empresa vinculada</label>
                                <div class="input-group">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            Razón social
                                        </span>
                                    </div>
                                    {!! Form::select('empresa', $empresas, null, ['class' => 'form-control bg-white']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-xs-12 col-md-10 col-lg-10">
                        {!! Form::label('denominacion', 'Denominación de la solicitud') !!}
                        {!! Form::text('denominacion', null, ['autofocus' => 'true', 'class' => 'form-control shadow', 'required', 'maxlength' => '150']) !!}
                        <small class="mt-2 mb-5">Max 150 carácteres</small>
                    </div>

                    <div class="col-xs-12 col-md-2  col-lg-2 text-center">
                        {!! Form::label('estado', 'Estado') !!}
                        <br>
                        <span class="estado btn btn-info">
                            @if (!$proyecto->TieneVacios())
                            Completo
                            @else
                            Incompleto
                            @endif
                        </span>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        {!! Form::label('resumenejecutivo', 'Resumen ejecutivo') !!}
                        {!! Form::textarea('resumenejecutivo', null, ['class' => 'form-control shadow', 'rows'=>'3', 'required', 'maxlength' => '500']) !!}
                        <small class="mt-2 mb-5">Max 500 carácteres</small>
                    </div>
                </div>

                <div class="row mt-5 mb-3">
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <label>Monto solicitado</label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    $
                                </span>
                            </div>
                            {!! Form::number('monto', null, ['class' => 'form-control shadow', 'required' ]) !!}
                        </div>
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <p class="mb-3 mt-5">
                            Destino general de los fondos solicitados
                        </p>

                        <div class="form-group">
                            <label>{{ Form::radio('destino', 0, true) }} Capital trabajo</label>
                            <br />
                            <label>{{ Form::radio('destino', 1, false) }} Inversión y capital de trabajo asociado</label>
                        </div>

                    </div>
                </div>


                <div class="row mt-3 mb-5">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <p class="mb-3 mt-5">
                            Empresa liderada por mujeres
                        </p>

                        <div class="form-group">
                            <label>{{ Form::radio('esliderMujer', 0, true) }} No </label>
                            <br />
                            <label>{{ Form::radio('esliderMujer', 1, false) }} Si</label>
                        </div>

                        <small>
                            Se entenderá por empresas liderada por mujeres a las empresas unipersonales
                            de las las mismas o en el caso de las personas jurídicas, a aquellas que con
                            cumplan con alguna de las siguientes condiciones:
                            <ul>
                                <li>
                                    El 51% o más de la titularidad de la composición accionaria se encuentre
                                    en manos de mujeres.
                                </li>
                                <li>
                                    El 25% o más de la titularidad de la composición accionaria se encuentre en
                                    manos de mujeres y a su vez alguna ocupe un puesto jerárquico en la toma de
                                    decisiones (designada por Acta de Asamblea y/o Directorio).
                                </li>
                            </ul>
                        </small>

                    </div>
                </div>

                <div class="card border mb-2">
                    <div class="card-header bg-info p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                                <h5>Presentación del proyecto</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Form::label('descripcion', 'Descripción del proyecto') !!}
                                {!! Form::textarea('descripcion', null, ['autofocus' => 'true', 'rows' => '3', 'class' => 'form-control shadow', 'required', 'placeholder' => 'Descripción del proyecto', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Form::label('objetivos', 'Objetivos del proyecto') !!}
                                {!! Form::textarea('objetivos', null, ['class' => 'form-control shadow', 'rows' => '3', 'required', 'placeholder' => 'Objetivos del proyecto', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Form::label('oportunidad', 'Oportunidad que significa') !!}
                                {!! Form::textarea('oportunidad', null, ['class' => 'form-control shadow', 'rows' => '3', 'required', 'placeholder' => 'Oportunidad del proyecto', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Form::label('desarrollo', 'Desarrollo actual') !!}
                                {!! Form::textarea('desarrollo', null, ['class' => 'form-control shadow', 'rows' => '3', 'required', 'placeholder' => 'Oportunidad del proyecto', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border mb-2">
                    <div class="card-header bg-info p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                                <h5>Presentación de la MiPyme</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Form::label('historia', 'Historia') !!}
                                {!! Form::textarea('historia', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Form::label('presente', 'Presente') !!}
                                {!! Form::textarea('presente', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border mb-2">
                    <div class="card-header bg-info p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                                <h5>Aspectos de los Productos / Servicios y de la producción de los mismos</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <em> Lugar donde funciona la empresa </em>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Form::label('propio', 'Propio: descripción del lugar') !!}
                                {!! Form::text('propio', null, ['rows' => '2', 'class' => 'form-control shadow', 'required', 'maxlength' => '300']) !!}
                                <small class="mt-2 mb-5">Max 300 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                {!! Html::decode(Form::label('Alquiler','<strong>Alquiler / Arrendamiento</strong>: Años de alquiler/arrendamiento del lugar y descripción del mismo')) !!}
                                {!! Form::textarea('alquilado', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '300']) !!}
                                <small class="mt-2 mb-5">Max 300 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Características <b>técnicas</b> de los productos/servicios</label>
                                {!! Form::textarea('ctecnicas', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '300']) !!}
                                <small class="mt-2 mb-5">Max 300 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Características <b>tecnológicas</b> de los productos/servicios</label>
                                {!! Form::textarea('ctecnologicas', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '300']) !!}
                                <small class="mt-2 mb-5">Max 300 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Descripción de los <strong>procesos productivos</strong></label>
                                {!! Form::textarea('pproductivos', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '300']) !!}
                                <small class="mt-2 mb-5">Max 300 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Descripción de la <strong>materia prima</strong></label>
                                {!! Form::textarea('mprimas', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '300']) !!}
                                <small class="mt-2 mb-5">Max 300 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Descripción de los <b>subprocesos, desechos y/o residuos que se generan </b> durante los Procesos Productivos</label>
                                {!! Form::textarea('subprocesos', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '300']) !!}
                                <small class="mt-2 mb-5">Max 300 carácteres</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border mb-2">
                    <div class="card-header bg-info p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                                <h5>Aspectos del Mercado</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Determinación del <strong>Mercado</strong></label>
                                {!! Form::textarea('mercado', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Descripción de los <strong>Clientes</strong></label>
                                {!! Form::textarea('clientes', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Descripción de los <strong>Competencia</strong></label>
                                {!! Form::textarea('competencia', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Descripción de los <strong>Proveedores</strong></label>
                                {!! Form::textarea('proveedores', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Riesgos y estratégias</strong> de superación de los mismos</label>
                                {!! Form::textarea('riesgos', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border mb-2">
                    <div class="card-header bg-info p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                                <h5>Generales</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Destino del monto solicitado</strong></label>
                                {!! Form::textarea('destinomonto', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Personal</strong> empleado</label>
                                {!! Form::textarea('personal', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label>Impacto<strong> económico y social </strong> </label>
                                {!! Form::textarea('impacto', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border mb-2">
                    <div class="card-header bg-info p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                                <h5>Aspectos Económicos-Financieros</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Precios </strong> de los productos / servicios </label>
                                {!! Form::textarea('precios', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border mb-2">
                    <div class="card-header bg-info p-3">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                                <h5>Análisis FODA</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Fortalezas</strong></label>
                                {!! Form::textarea('fortalezas', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Oportunidades </strong> </label>
                                {!! Form::textarea('oportunidades', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Debilidades </strong> </label>
                                {!! Form::textarea('debilidades', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <label><strong>Amenazas </strong></label>
                                {!! Form::textarea('amenazas', null, ['rows' => '3', 'class' => 'form-control shadow', 'required', 'maxlength' => '500']) !!}
                                <small class="mt-2 mb-5">Max 500 carácteres</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}

@endsection

@section('js')

<script>
    var btnguardar = "<i class='fas fa-save text-white'></i>";

    $( document ).ready(function () {

        toastr.options = { 
            "closeButton": true,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
        };
        toastr.info("&nbsp;", 'Guarde siempre sus datos! <br> <strong>F10</strong> o '+ btnguardar+' </div>');
    })
        
    $( document ).on( 'keydown', function ( e ) {

        if (e.keyCode === 121 ) { // F10
            guardar();
        }
    });

    $(".enviar").on('click', function(){
        guardar();
    })

    function guardar(){

        $(".enviar").html('<i class="fas fa-spinner fa-spin"></i>');

        var url     = "{{ route('proyecto.update', $proyecto->id  )}}";        

        $.ajax({
            url     : url,
            type    : 'POST',
            data    : $("#proyecto").serialize(),

            success: function (data) {

                $(".estado").html(data);
                setTimeout(function(){ $(".enviar").html(btnguardar); },1500);
            },
        })
    }

</script>

@endsection