@extends('base.base')

@section('title', 'Listar visitas')

@section('breadcrumb')
{!! Breadcrumbs::render('visita', $expediente) !!}
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

                {!! Form::open([ 'route' => 'visita.store', 'id'=>'formVisita' ]) !!}
                {!! Form::hidden('expediente', $expediente->id, ['id' => 'expediente']) !!}
                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-12 col-xs-12">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td>Fecha</td>
                                <td>Motivo</td>
                                <td>Responsable</td>
                                <td>Resultado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <div class=" input-group-prepend">
                                            <span class="input-group-text">
                                                Fecha
                                            </span>
                                        </div>
                                        {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                <td>
                                    {!! Form::text('motivo', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td>
                                    {!! Form::text('responsable', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td>
                                    {!! Form::text('resultado', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td class="text-center">
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-secondary']) !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>

            <div class="card-body">

                <div class="detalle">
                    @include('admin.visita.detalle')
                </div>

            </div>


        </div>
    </div>
</div>
</div>

@endsection

@section('js')

<script>
    $("#formVisita").on('submit', (event)=>{

        event.preventDefault();

        $.ajax({
            url 	: "{{ route('visita.store') }}",
            type 	: 'POST',
            dataType: 'json',
            data 	: $("#formVisita").serialize(),
            success: function(data){

                $('.detalle').html(data);
                toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                toastr.success("&nbsp;", "Visita agregada ... ");
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
                    url 	: "{{ route('visita.destroy') }}",
                    type 	: 'POST',
                    dataType: 'json',
                    data 	: {id, expediente},
                    success: function(data){

                        $('.detalle').html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Visita eliminada ... ");
                    }
                });
            }
        });
    };

</script>

@endsection