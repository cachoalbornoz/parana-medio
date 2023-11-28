@extends('base.base')

@section('title', 'Listar notificaciones')

@section('breadcrumb')
{!! Breadcrumbs::render('notificacion', $expediente) !!}
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

                {!! Form::open([ 'route' => 'notificacion.store', 'id'=>'formNotificacion' ]) !!}
                {!! Form::hidden('expediente', $expediente->id, ['id' => 'expediente']) !!}
                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-12 col-xs-12">
                        <table class="table table-sm table-borderless">
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
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Emprendedor</th>
                                <th>Parentesco</th>
                                <th>Recibe</th>
                                <th>Dni</th>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::select('asociado', $asociados, null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td>
                                    {!! Form::select('parentesco', $tipoparentesco, null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td>
                                    {!! Form::text('recibe', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td>
                                    {!! Form::text('dni', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Notificacion</th>
                                <th>Tipo Notificacion</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::select('notificacion', $tiponotificacion, null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td>
                                    {!! Form::select('tipopostal', $tipopostal, null, ['class' => 'form-control', 'required' => 'true']) !!}
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class=" input-group-prepend">
                                            <span class="input-group-text">
                                                Monto $
                                            </span>
                                        </div>
                                        {!! Form::number('monto', null, ['id' =>'monto', 'required', 'class' => 'form-control text-center', 'min' => 0, 'max' => '99999999', 'onkeyup' => 'imposeMinMax(this)']) !!}
                                    </div>
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
                    @include('admin.notificacion.detalle')
                </div>

            </div>


        </div>
    </div>
</div>
</div>

@endsection

@section('js')

<script>
    $("#formNotificacion").on('submit', (event)=>{

        event.preventDefault();

        $.ajax({
            url 	: "{{ route('notificacion.store') }}",
            type 	: 'POST',
            dataType: 'json',
            data 	: $("#formNotificacion").serialize(),
            success: function(data){

                $('.detalle').html(data);
                toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                toastr.success("&nbsp;", "Notificacion agregada ... ");
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
                    url 	: "{{ route('notificacion.destroy') }}",
                    type 	: 'POST',
                    dataType: 'json',
                    data 	: {id, expediente},
                    success: function(data){

                        $('.detalle').html(data);
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Notificacion eliminada ... ");
                    }
                });
            }
        });
    };

</script>

@endsection