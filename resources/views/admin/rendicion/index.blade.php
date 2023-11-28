@extends('base.base')

@section('title', 'Listar rendiciones')

@section('breadcrumb')
{!! Breadcrumbs::render('rendicion', $expediente) !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-xs-6">
                        {{$expediente->Titular->NombreCompleto}}
                    </div>
                    <div class="col-xs-12 col-sm-2 col-xs-2">
                        Monto crédito $ {{number_format($expediente->monto, 2)}}
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        @if (isset($expediente))
                        @include('admin.expediente.menuExpediente')
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        Fecha rendición
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        Importe
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        Comprobante
                    </div>
                </div>

                {!! Form::open([ 'route' => 'rendicion.store', 'id'=>'formrendicion' ]) !!}
                <div class="row mb-3">

                    {!! Form::hidden('expediente', $expediente->id, ['id' => 'expediente']) !!}

                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        {!! Form::number('importe', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3">
                        {!! Form::select('rendicion', $tiporendicion, null, ['class' => 'form-control', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-xs-3 text-center">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-secondary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>

            <div class="card-body">

                <div class="detalle">
                    @include('admin.rendicion.detalle')
                </div>

            </div>


        </div>
    </div>
</div>
</div>

@endsection

@section('js')

<script>
    $("#formrendicion").on('submit', (event)=>{

        event.preventDefault();

        $.ajax({
            url 	: "{{ route('rendicion.store') }}",
            type 	: 'POST',
            dataType: 'json',
            data 	: $("#formrendicion").serialize(),
            success: function(data){

                $('.detalle').html(data);
                toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                toastr.success("&nbsp;", "rendicion agregada ... ");
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
                    url 	: "{{ route('rendicion.destroy') }}",
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