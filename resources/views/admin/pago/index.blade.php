@extends('base.base')

@section('title', 'Listar pagos')

@section('breadcrumb')
{!! Breadcrumbs::render('pago', $expediente) !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">

                <div class="row mb-5">
                    <div class="col-xs-12 col-sm-6 col-xs-6">
                        {{$expediente->Titular->NombreCompleto}}
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        @if (isset($expediente))
                        @include('admin.expediente.menuExpediente')
                        @endif
                    </div>
                </div>

                <div class="row text-center mt-3">
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        Monto total pago
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        Fecha
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        Nro Cta
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        Tipo Movimiento
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        Nro Operación
                    </div>
                </div>

                {!! Form::open([ 'route' => 'pago.store', 'id'=>'formpago' ]) !!}

                <div class="row text-center mb-3">

                    {!! Form::hidden('expediente', $expediente->id, ['id' => 'expediente']) !!}

                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        {!! Form::number('monto', null, ['class' => 'form-control text-center', 'required' => 'true', 'step'=>'any', 'autofocus'=>true]) !!}
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        {!! Form::date('fecha', null, ['class' => 'form-control text-center', 'required']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        {!! Form::text('cuenta', '62298851', ['class' => 'form-control text-center', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        {!! Form::select('tipopago', $tipopago, 2, ['class' => 'form-control text-center', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        {!! Form::text('nro_operacion', null, ['class' => 'form-control text-center', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        {!! Form::submit('Guardar',['class' => 'btn btn-secondary']) !!}
                    </div>

                </div>

                {!! Form::close() !!}

            </div>

            <div class="card-body">

                <div class="detalle mt-5">
                    @include('admin.pago.detalle')
                </div>

            </div>


        </div>
    </div>
</div>
</div>

@endsection

@section('js')

<script>
    $("#formpago").on('submit', (event)=>{

        event.preventDefault();

        $.ajax({
            url 	: "{{ route('pago.store') }}",
            type 	: 'POST',
            dataType: 'json',
            data 	: $("#formpago").serialize(),
            success: function(data){
                $('.detalle').html(data);
                toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                toastr.success("&nbsp;", "pago agregado ... ");
            }
        });    
    })

    const borrar = (id) => {

        const texto       = '&nbsp; Elimina ? &nbsp;';
        const expediente  = {{$expediente->id}};

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
                    url 	: "{{ route('pago.destroy') }}",
                    type 	: 'POST',
                    dataType: 'json',
                    data 	: {id, expediente},
                    success: function(data){

                        $('.detalle').html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Rendición eliminada ... ");
                    }
                });
            }
        });
    };

</script>

@endsection