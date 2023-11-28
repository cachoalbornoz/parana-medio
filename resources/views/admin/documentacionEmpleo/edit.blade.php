@extends('base.base')

@section('title', 'Editar documentacion')

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
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <h5> Documentación solicitada </h5>
                    Empresa :: <span class=" font-weight-bold">{{ $documentacion->Empresa->razon_social }}</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <h5> Estado documentación </h5>
                    <div id="estado">
                        <strong> @include('admin.documentacionEmpleo.estado') </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form method="POST">
        <input type="hidden" name="documentacion" id="documentacion" value="{{ $documentacion->id }}">
    </form>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div id="pj">
        @include('admin.documentacionEmpleo.documentos')
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 text-center">
            <hr>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <small>
                <span class="text-danger">(*)</span>
                La documentación debe enviarse en archivos <b>Tipo PDF </b><i class="far fa-file-pdf"></i>
            </small>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>


@endsection

@section('js')

    <script>
        
        let fondep = "{{ route('documentacione.fondep') }}";
        let cbu = "{{ route('documentacione.cbu') }}";
        let attrabajador = "{{ route('documentacione.attrabajador') }}";
        let certdiscapacidad = "{{ route('documentacione.certdiscapacidad') }}";

        $("#guardar").on("click", function() {

            let empleado = $('#empleado').val();
            let documentacion = $("#documentacion").val();

            $.ajax({
                url: "{{ route('documentacione.empleado') }}",
                method: 'POST',
                data: {
                    empleado: empleado,
                    documentacion: documentacion
                },
                success: function(data) {
                    mensaje(data);
                }
            })
        });


        $("#fondep").on("change", function() {

            let data = new FormData($('#formfondep')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: fondep,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#cbu").on("change", function() {
            let data = new FormData($('#formcbu')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: cbu,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#attrabajador").on("change", function() {
            let data = new FormData($('#formattrabajador')[0]);
            data.append('documentacion', $('#documentacion').val());
            $.ajax({
                url: attrabajador,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#certdiscapacidad").on("change", function() {
            let data = new FormData($('#formcertdiscapacidad')[0]);
            data.append('documentacion', $('#documentacion').val());
            $.ajax({
                url: certdiscapacidad,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        function estado() {

            $.ajax({

                url: '{{ route('documentacione.estado') }}',
                type: 'POST',
                data: {
                    id: $("#documentacion").val()
                },

                success: function(data) {
                    $("#estado").html(data);
                }
            });
        }

        function mensaje(data) {
            if (data.success) {
                estado();
                toastr.options = {
                    "positionClass": "toast-top-center",
                    "progressBar": true,
                    "showDuration": "1000",
                    "timeOut": "1000"
                };
                toastr.success("&nbsp;", 'Documentación subida');
                setTimeout(function() {
                    window.location.reload(1);
                }, 300);

            } else {

                toastr.options = {
                    "positionClass": "toast-top-center",
                    "progressBar": true,
                    "showDuration": "5000",
                    "timeOut": "5000"
                };
                toastr.error("&nbsp;", data.message);
            }
        }
    </script>

@endsection
