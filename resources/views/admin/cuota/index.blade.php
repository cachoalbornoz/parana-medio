@extends('base.base')

@section('title', 'Listar cuotas')

@section('breadcrumb')
    {!! Breadcrumbs::render('cuota', $expediente) !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">

                    <div class="row mb-5">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            {{ $expediente->Titular->NombreCompleto }}
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            @if (isset($expediente))
                                @include('admin.expediente.menuExpediente')
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <label>Monto crédito </label>
                        </div>
                        <div class="col-2">
                            <input type="number" readonly="true"
                                value="{{ $expediente->monto }}" class="form-control text-danger text-center text-bold" />
                        </div>
                        <div class="col-2">
                            <label>Período de gracia</label>
                        </div>
                        <div class="col-2">
                            <select id="pgracia" name="pgracia" class="form-control text-center">
                                <option value="6">6</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Monto devolver </label>
                        </div>
                        <div class="col-2">
                            <input type="number" readonly="true" name="montop" id="montop" 
                                value="{{ $expediente->monto_devolver }}" class="form-control text-danger text-center font-weight-bolder" />
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-2">
                            <label>Fecha otorgamiento</label>
                        </div>
                        <div class="col-2">
                            <input type="date" readonly="true" name="fechao" id="fechao"
                                value="{{ $expediente->fecha_otorgamiento }}" class="form-control text-center">
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <div class="row text-center mt-3">

                        <div class="col-xs-12 col-sm-1 col-lg-1">

                        </div>
                        <div class="col-xs-12 col-sm-1 col-lg-1">
                            Nro Cuota
                        </div>
                        <div class="col-xs-12 col-sm-2 col-lg-2">
                            Fecha Vencimiento
                        </div>
                        <div class="col-xs-12 col-sm-2 col-lg-2">
                            $ Importe
                        </div>
                        <div class="col-xs-12 col-sm-2 col-lg-2">

                        </div>
                        <div class="col-xs-12 col-sm-2 col-lg-2">

                        </div>
                    </div>
                    <hr />

                    {!! Form::open(['route' => 'cuota.store', 'id' => 'formcuota']) !!}

                    {!! Form::hidden('expediente', $expediente->id, ['id' => 'expediente']) !!}

                    <div class="row text-center mt-3">
                        <div class="col-xs-12 col-sm-1 col-xs-1">

                        </div>
                        <div class="col-xs-12 col-sm-1 col-xs-1">
                            <select id="nroCuota" name="nroCuota" class="form-control text-center" autofocus>

                                @for ($i = 1; $i <= 60; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-xs-2">
                            <input type="date" name="fechaVcto" id="fechaVcto" class="form-control text-center"
                                value={{ date(now()) }}>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-xs-2">
                            <input type="number" name="monto" id="monto" value="0"
                                class="form-control text-center">
                        </div>
                        <div class="col-xs-12 col-sm-2 col-xs-2">
                            <button class=" btn btn-secondary" onClick="registrar()"> Crear </button>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-xs-2">
                            <button class=" btn btn-secondary" onClick="generar_18()"> 18 Cuotas </button>
                        </div>
                       
                        <div class="col-xs-12 col-sm-1 col-xs-1">
                            <button class=" btn btn-secondary" onClick="chequear_plan()" title="revisar pagos">
                                Revisar
                            </button>
                        </div>
                        <div class="col-xs-12 col-sm-1 col-xs-1">
                            <button class=" btn btn-default" onClick="eliminar_plan()"> <i
                                    class=" fa fa-trash text-danger"></i> 
                            </button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                    <hr />

                    <div class="detalle mt-5">
                        @include('admin.cuota.detalle')
                    </div>

                </div>


            </div>
        </div>
    </div>
    </div>

@endsection

@section('js')

    <script>
        const expediente = document.getElementById('expediente').value;

        const chequear_plan = () => {

            event.preventDefault();

            $.ajax({
                url: "{{ route('cuota.comprobar') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    expediente
                },
                success: function(response) {
                    $('.detalle').html(response);
                    toastr.options = {
                        "progressBar": true,
                        "showDuration": "300",
                        "timeOut": "1000"
                    };
                    toastr.success("&nbsp;", "Chequeado ... ");
                }
            });
        }

        const registrar = () => {

            const cuotas = 1;
            const nroCuota = document.getElementById('nroCuota').value;;
            const monto = document.getElementById('monto').value;
            const fechaVcto = document.getElementById('fechaVcto').value;
            const manual = 1;

            event.preventDefault();

            if (monto > 0 && fechaVcto != 0) {

                $.ajax({
                    url: "{{ route('cuota.store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        cuotas,
                        expediente,
                        nroCuota,
                        monto,
                        fechaVcto,
                        manual
                    },
                    success: function(response) {

                        $('.detalle').html(response);
                        toastr.options = {
                            "progressBar": true,
                            "showDuration": "300",
                            "timeOut": "1000"
                        };
                        toastr.success("&nbsp;", "Cuota agregada ... ");
                    }
                });

            } else {

                toastr.options = {
                    "progressBar": true,
                    "showDuration": "1500",
                    "timeOut": "1500"
                };
                toastr.error("&nbsp;", "Complete fecha e importe ");
            }
        }

        const generar_18 = () => {

            event.preventDefault();

            const cuotas = 18;
            const monto = document.getElementById('montop').value;
            const fecha = document.getElementById('fechao').value;
            const pgracia = document.getElementById('pgracia').value;

            $.ajax({
                url: "{{ route('cuota.store') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    cuotas,
                    expediente,
                    monto,
                    fecha,
                    pgracia
                },
                success: function(response) {

                    $('.detalle').html(response);
                    toastr.options = {
                        "progressBar": true,
                        "showDuration": "300",
                        "timeOut": "1000"
                    };
                    toastr.success("&nbsp;", "Cuota agregada ... ");
                }
            });

        }

        // Operacion 2 => Elimina el plan completo
        const eliminar_plan = () => {

            event.preventDefault();

            const texto = '&nbsp; Elimina plan de cuotas ? &nbsp;';

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
                        url: '{{ route('cuota.borrarPlan', $expediente->id) }}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            expediente
                        },
                        success: function(response) {

                            $('.detalle').html(response);
                            toastr.options = {
                                "progressBar": true,
                                "showDuration": "300",
                                "timeOut": "1000"
                            };
                            toastr.error("&nbsp;", "Plan eliminado ... ");
                        }
                    });
                }
            });

        }


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
                        url: "{{ route('cuota.destroy') }}",
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
                            toastr.error("&nbsp;", "Cuota eliminada ... ");
                        }
                    });
                }
            });
        };
    </script>

@endsection
