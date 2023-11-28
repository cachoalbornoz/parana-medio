@extends('base.base')

@section('title', 'Listar ubicaciones')

@section('breadcrumb')
{!! Breadcrumbs::render('ubicacion', $expediente) !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-8 col-xs-8">
                        {{$expediente->Titular->NombreCompleto}}
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        @if (isset($expediente))
                        @include('admin.expediente.menuExpediente')
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        Fecha traslado
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        Ubicación / lugar
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        Motivo / respuesta
                    </div>
                </div>

                {!! Form::open([ 'route' => 'ubicacion.store', 'id'=>'formUbicacion' ]) !!}
                <div class="row mb-3">

                    {!! Form::hidden('expediente', $expediente->id, ['id' => 'expediente']) !!}

                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        {!! Form::select('ubicacion', $tipoubicacion, null, ['class' => 'form-control', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3 text-center">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-secondary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>

            <div class="card-body">

                <div class="detalle">
                    @include('admin.ubicacion.detalle')
                </div>

            </div>


        </div>
    </div>
</div>
</div>

@endsection

@section('js')

<script>
    $("#formUbicacion").on('submit', (event)=>{

        event.preventDefault();

        $.ajax({
            url 	: "{{ route('ubicacion.store') }}",
            type 	: 'POST',
            dataType: 'json',
            data 	: $("#formUbicacion").serialize(),
            success: function(data){

                $('.detalle').html(data);
                toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                toastr.success("&nbsp;", "Ubicacion agregada ... ");
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
                    url 	: "{{ route('ubicacion.destroy') }}",
                    type 	: 'POST',
                    dataType: 'json',
                    data 	: {id, expediente},
                    success: function(data){

                        $('.detalle').html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Ubicacion eliminada ... ");
                    }
                });
            }
        });
    };

</script>

@endsection