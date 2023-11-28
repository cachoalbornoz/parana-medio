@extends('base.base')

@section('title', 'Listar estados')

@section('breadcrumb')
    {!! Breadcrumbs::render('estado', $expediente) !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-8 col-xs-86">
                            {{ $expediente->Titular->NombreCompleto }}
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-4">
                            @if (isset($expediente))
                                @include('admin.expediente.menuExpediente')
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-lg-4">
                            Fecha estado
                        </div>
                        <div class="col-xs-12 col-sm-4 col-lg-4">
                            Estado
                        </div>
                    </div>

                    {!! Form::open(['route' => 'estado.store', 'id' => 'formestado']) !!}

                    <div class="row mb-3">
                        <div class="col-xs-12 col-md-3 col-lg-3">
                            {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-3">
                            {!! Form::select('estado', $tipoestado, null, ['id' => 'estado', 'class' => 'form-control', 'required' => 'true']) !!}
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-3 text-center">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-secondary']) !!}
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-3">
                            {!! Form::hidden('expediente', $expediente->id, ['id' => 'expediente']) !!}
                            {!! Form::hidden('estadoAnt', $expediente->estado, ['id' => 'estadoAnt']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

                <div class="card-body">

                    <div class="detalle">
                        @include('admin.estado.detalle')
                    </div>

                </div>


            </div>
        </div>
    </div>
    </div>

@endsection

@section('js')

    <script>
        $("#formestado").on('submit', (event) => {

            event.preventDefault();

            $.ajax({
                url: "{{ route('estado.store') }}",
                type: 'POST',
                dataType: 'json',
                data: $("#formestado").serialize(),
                success: function(data) {

                    $('.detalle').html(data);
                    $("#estadoAnt").val($("#estado").val());

                    toastr.options = {
                        "progressBar": true,
                        "showDuration": "300",
                        "timeOut": "1000"
                    };
                    toastr.success("&nbsp;", "estado agregada ... ");
                }
            });
        })

        const borrar = (id) => {

            const texto = '&nbsp; Elimina ? &nbsp;';
            const expediente = {{ $expediente->id }};

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

                        url: "{{ route('estado.destroy') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id,
                            expediente
                        },

                        success: function(data) {

                            $('.detalle').html(data);
                            toastr.options = {
                                "progressBar": true,
                                "showDuration": "300",
                                "timeOut": "1000"
                            };
                            toastr.error("&nbsp;", "Estado eliminada ... ");
                        }
                    });
                }
            });
        };
    </script>

@endsection
