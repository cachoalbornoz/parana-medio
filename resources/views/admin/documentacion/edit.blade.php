@extends('base.base')

@section('title', 'Editar documentacion')

@section('breadcrumb')
{!! Breadcrumbs::render('documentacion.edit', $documentacion) !!}
@endsection

@section('stylesheet')

<style>
    input[type="file"] {
        color: transparent !important;
    }
</style>
@endsection

@section('content')

@include('errors.error')


<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-lg-9">
                <h5>
                    {{ $documentacion->Proyecto->Empresa->razon_social}} -
                    ({{ $documentacion->Proyecto->Titular->apellido}}, {{ $documentacion->Proyecto->Titular->nombre}})
                </h5>
            </div>
            <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
                Tipo persona:
                <br>
                <strong>
                    @if ($documentacion->Proyecto->Empresa->tiposociedad->id == '0')
                    Física
                    @else
                    Jurídica
                    @endif
                </strong>
            </div>
            <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                Estado:
                <br>
                <div id="estado">
                    <strong> @include('admin.documentacion.estado') </strong>
                </div>
            </div>
        </div>
    </div>
</div>


<form method="POST">
    <input type="hidden" name="documentacion" id="documentacion" value="{{$documentacion->id}}">
</form>

<div id="pf">
    @if ($documentacion->Proyecto->Empresa->tiposociedad->id == '0')
    @include('admin.documentacion.pf')
    @endif
</div>
<div id="pj">
    @if ($documentacion->Proyecto->Empresa->tiposociedad->id != '0')
    @include('admin.documentacion.pj')
    @endif
</div>

<div class="row">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Certificado MiPyME vigente
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formmipyme" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="mipyme" id="mipyme" required>
        </form>
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->mipyme))
        <a id="linkmipyme" href="{{ asset('/public/images/upload/documentacion/'. $documentacion->mipyme) }}?codeimg={{ time()}}">
            <i class="far fa-file-pdf"></i>
        </a>
        @else
        <a id="linkmipyme" href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
            <i class="far fa-file-pdf"></i>
        </a>
        @endif
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->mipyme))
        <i class="far fa-check-circle text-success"></i>
        @else
        <i id="checkmipyme" class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>


<div class="row mb-4">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        &nbsp;
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <small>
            <span class="text-danger">(*)</span>
            En todos los ítems, dónde se soliciten archivos PDF, <b>éstos no pueden superar los 10 Mbytes</b>.
        </small>
    </div>
</div>


@endsection

@section('js')

<script>
    var estadocontable  = "{{ route('estadocontable')}}";
    var personeria      = "{{ route('personeria')}}";
    var poder           = "{{ route('poder')}}" ;
    var acta            = "{{ route('acta')}}";
    var estatuto        = "{{ route('estatuto')}}";
    var mipyme          = "{{ route('mipyme')}}";
    var muni            = "{{ route('muni')}}";
    var ater            = "{{ route('ater')}}";
    var afip            = "{{ route('afip')}}";
    var domiciliolegal  = "{{ route('domiciliolegal')}}";
    var dnidorso        = "{{ route('dnidorso')}}";
    var dnifrente       = "{{ route('dnifrente')}}";

    // Como revisar lo que tiene FormData
    /*
    for (var pair of data.entries()){
        console.log(pair[0]+ ', '+ pair[1]);
    }
    */

    function estado(){

        $.ajax({

            url 	: '{{ route('documentacion.estado') }}',
            type 	: 'POST',
            data    : {id: $("#documentacion").val() },

            success: function(data){
                $("#estado").html(data);
            }
        });
    }

    function mensaje(data){
        if(data.success){

            estado();
            toastr.options = {"positionClass": "toast-top-center", "progressBar": true, "showDuration": "1000", "timeOut": "1000" };
            toastr.success("&nbsp;", 'Documentación subida');
            setTimeout(function(){ window.location.reload(1);  }, 1000);

        }else{

            toastr.options = {"positionClass": "toast-top-center", "progressBar": true, "showDuration": "5000", "timeOut": "5000" };
            toastr.error("&nbsp;", data.message);
        }
    }


    $("#estadocontable").on("change", function () {
        var data    = new FormData($('#formestadocontable')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : estadocontable,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#personeria").on("change", function () {

        var data    = new FormData($('#formpersoneria')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : personeria,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#poder").on("change", function () {

        var data    = new FormData($('#formpoder')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : poder,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#acta").on("change", function () {

        var data    = new FormData($('#formacta')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : acta,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#estatuto").on("change", function () {

        var data    = new FormData($('#formestatuto')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : estatuto,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#mipyme").on("change", function () {

        var data = new FormData($('#formmipyme')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url: mipyme,
            method: 'POST',
            data: data,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                mensaje(data);
            }
        })
    });

    $("#muni").on("change", function () {

        var data    = new FormData($('#formmuni')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : muni,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#ater").on("change", function () {

        var data    = new FormData($('#formater')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : ater,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#afip").on("change", function () {

        var data    = new FormData($('#formafip')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : afip,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#domiciliolegal").on("change", function () {

        var data    = new FormData($('#formdomiciliolegal')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : domiciliolegal,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#dnidorso").on("change", function () {

        var data    = new FormData($('#formdnidorso')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : dnidorso,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        })
    });

    $("#dnifrente").on("change", function () {

        var data    = new FormData($('#formdnifrente')[0]);
        data.append('documentacion', $('#documentacion').val());

        $.ajax({
            url 	    : dnifrente,
            method      : 'POST',
            data        : data,
            dataType    : 'JSON',
            contentType : false,
            cache       : false,
            processData : false,
            success: function(data) {
                mensaje(data);
            }
        }) 
    });

</script>

@endsection