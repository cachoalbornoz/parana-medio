@extends('base.base')

@section('title', 'Editar planillas')

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

<div id="spopup">
    <div class="btn-group bg-secondary" role="group" aria-label="botones">
        <div class="estado">
            @include('admin.proyectos.estadoplanilla')
        </div>
        <a class="btn btn-info" href="{{ route('proyecto.edit', $proyecto->id)}}" title="Edición del proyecto">
            Proyecto
        </a>
        <a class="btn btn-info" href="{{ route('print.proyecto', $proyecto->id)}}" title="Imprime proyecto">
            <i class="fas fa-print"></i>
        </a>
    </div>
</div>


<div class="row mb-3">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <h4>Planillas contables</h4>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 text-right">
                        <a class="btn btn-secondary" href="{{ route('proyecto.edit', $proyecto->id)}}" title="Edición del proyecto">
                            Proyecto
                        </a>
                        <a class="btn btn-info" href="{{ route('print.proyecto', $proyecto->id)}}" title="Imprime proyecto">
                            <i class="fas fa-print"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
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
                                {!! Form::text('apellidotitular', $proyecto->Titular->apellido.', '. $proyecto->Titular->nombre, ['class' => 'form-control bg-white', 'readonly' => 'true']) !!}
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
                                {!! Form::text('empresatitular', $proyecto->Empresa->razon_social, ['class' => 'form-control bg-white', 'readonly' => 'true']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::hidden('proyecto', $proyecto->id, ['id' =>'proyecto']) !!}

                    <div class="row mt-3">
                        <div class="col-xs-12 col-md-10 col-lg-10">

                        </div>

                        <div class="col-xs-12 col-md-1 col-lg-1 text-center">
                            {!! Form::label('act', 'Actualizar') !!}
                            <br>
                            <a class="btn btn-info" href="javascript:estado();" title="Actualiza estado del proyecto">
                                <i class="fas fa-sync"></i>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                            @include('admin.proyectos.estadoplanilla')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.proyectos.resumenpresupuestario')

@include('admin.proyectos.costosfijos')

@include('admin.proyectos.costosvariables')

@include('admin.proyectos.fuentefinanciacion')

@include('admin.proyectos.ingresoventa')

<div id="planillas">
    @include('admin.proyectos.planillaresultado')
</div>



@endsection


@section('js')

<script>
    //// ACTUALIZA PLANILLAS

    var proyecto = $("#proyecto").val();

    function estado(){

        var route 	= '{{ route('planilla.estado') }}';

        $.ajax({

            url 	: route,
            type 	: 'POST',
            data    : {id: proyecto },

            success: function(data){
                $(".estado").html(data);
            }
        });
    }

    function actualiza(){

        var route 	= '{{ route('planilla.actualiza') }}';

        $.ajax({

            url 	: route,
            type 	: 'POST',
            data    : {id: proyecto },

            success: function(data){
                $("#planillas").html(data);
                estado();
            }
        });
    }

    //// INGRESO VENTAS

    $('#formiv').on('submit', function(event) {

        event.preventDefault();
        var form    = $("#formiv");

        $.ajax({

            url 	: form.attr('action'),
            type 	: 'POST',
            data    : form.serialize()+"&proyecto="+ proyecto,

            success: function(data){

                if(data.success){

                    $("#ivdetalle").html(data.view);
                    $("#formiv").trigger("reset");
                    actualiza();
                }else{
                    toastr.options = {"positionClass": "toast-top-center", "progressBar": true, "showDuration": "5000", "timeOut": "5000" };
                    toastr.error("&nbsp;", data.message);
                }
            }
        });
    });

    function eliminaiv(id){

        var texto   = '&nbsp; Elimina ? &nbsp;';
        var id      = id;

        ymz.jq_confirm({
            title:texto,
            text:"",
            no_btn:"Cancelar",
            yes_btn:"Confirma",
            no_fn:function(){
                return false;
            },
            yes_fn:function(){

                $.ajax({
                    url 	: "{{ route('iv.destroy') }}",
                    type 	: 'POST',
                    data 	: {proyecto:proyecto, id: id},
                    success: function(data){

                        $("#ivdetalle").html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Item eliminado ... ");
                        actualiza();
                    }
                });
            }
        });
    };

    //// FUENTE FINANCIACION
    $('#formff').on('submit', function(event) {

        event.preventDefault();
        var form    = $("#formff");

        $.ajax({

            url 	: form.attr('action'),
            type 	: 'POST',
            data    : form.serialize()+"&proyecto="+ proyecto,

            success: function(data){

                if(data.success){

                    $("#ffdetalle").html(data.view);
                    $("#formff").trigger("reset");
                    actualiza();
                }else{
                    toastr.options = {"positionClass": "toast-top-center", "progressBar": true, "showDuration": "5000", "timeOut": "5000" };
                    toastr.error("&nbsp;", data.message);
                }
            }
        });
    });

    function eliminaff(id){

        var texto   = '&nbsp; Elimina ? &nbsp;';
        var id      = id;

        ymz.jq_confirm({
            title:texto,
            text:"",
            no_btn:"Cancelar",
            yes_btn:"Confirma",
            no_fn:function(){
                return false;
            },
            yes_fn:function(){

                $.ajax({

                    url 	: "{{ route('ff.destroy') }}",
                    type 	: 'POST',

                    data 	: {proyecto:proyecto, id: id},
                    success: function(data){

                        $("#ffdetalle").html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Item eliminado ... ");
                        actualiza();
                    }
                });
            }
        });
    };

    //// COSTOS VARIABLES
    $('#formcv').on('submit', function(event) {

        event.preventDefault();
        var form    = $("#formcv");

        $.ajax({

            url 	: form.attr('action'),
            type 	: 'POST',
            data    : form.serialize()+"&proyecto="+ proyecto,

            success: function(data){

                if(data.success){

                    $("#cvdetalle").html(data.view);
                    $("#formcv").trigger("reset");
                    actualiza();
                }else{
                    toastr.options = {"positionClass": "toast-top-center", "progressBar": true, "showDuration": "5000", "timeOut": "5000" };
                    toastr.error("&nbsp;", data.message);
                }
            }
        });
    });

    function eliminacv(id){

        var texto   = '&nbsp; Elimina ? &nbsp;';
        var id      = id;

        ymz.jq_confirm({
            title:texto,
            text:"",
            no_btn:"Cancelar",
            yes_btn:"Confirma",
            no_fn:function(){
                return false;
            },
            yes_fn:function(){

                $.ajax({

                    url 	: "{{ route('cv.destroy') }}",
                    type 	: 'POST',
                    data 	: {proyecto:proyecto, id: id},
                    success: function(data){

                        $("#cvdetalle").html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Item eliminado ... ");
                        actualiza();
                    }
                });
            }
        });
    };

    /// COSTOS FIJOS
    $('#formcf').on('submit', function(event) {

        event.preventDefault();
        var form    = $("#formcf");

        $.ajax({

            url 	: form.attr('action'),
            type 	: 'POST',
            data    : form.serialize()+"&proyecto="+ proyecto,

            success: function(data){

                if(data.success){

                    $("#cfdetalle").html(data.view);
                    $("#formcf").trigger("reset");
                    actualiza();
                }else{
                    toastr.options = {"positionClass": "toast-top-center", "progressBar": true, "showDuration": "5000", "timeOut": "5000" };
                    toastr.error("&nbsp;", data.message);
                }
            }
        });
    });

    function eliminacf(id){

        var texto   = '&nbsp; Elimina ? &nbsp;';
        var id      = id;

        ymz.jq_confirm({
            title:texto,
            text:"",
            no_btn:"Cancelar",
            yes_btn:"Confirma",
            no_fn:function(){
                return false;
            },
            yes_fn:function(){

                $.ajax({

                    url 	: "{{ route('cf.destroy') }}",
                    type 	: 'POST',
                    data 	: {proyecto:proyecto, id: id},
                    success: function(data){

                        $("#cfdetalle").html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Item eliminado ... ");
                        actualiza();
                    }
                });
            }
        });
    };

    ///RESUMEN PRESUPUESTARIO
    $('#formrp').on('submit', function(event) {

        event.preventDefault();
        var form    = $("#formrp");

        $.ajax({

            url 	: form.attr('action'),
            type 	: 'POST',
            data    : form.serialize()+"&proyecto="+ proyecto,

            success: function(data){

                if(data.success){

                    $("#rpdetalle").html(data.view);
                    $("#formrp").trigger("reset");
                    actualiza();
                }else{
                    toastr.options = {"positionClass": "toast-top-center", "progressBar": true, "showDuration": "5000", "timeOut": "5000" };
                    toastr.error("&nbsp;", data.message);
                }
            }
        });
    });

    function eliminarp(id){

        var texto   = '&nbsp; Elimina ? &nbsp;';
        var id      = id;

        ymz.jq_confirm({
            title:texto,
            text:"",
            no_btn:"Cancelar",
            yes_btn:"Confirma",
            no_fn:function(){
                return false;
            },
            yes_fn:function(){



                $.ajax({

                    url 	: "{{ route('resumen.destroy') }}",
                    type 	: 'POST',
                    data 	: {proyecto:proyecto, id: id},
                    success: function(data){

                        $("#rpdetalle").html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Item eliminado ... ");
                        actualiza();
                    }
                });
            }
        });
    };

</script>

@endsection