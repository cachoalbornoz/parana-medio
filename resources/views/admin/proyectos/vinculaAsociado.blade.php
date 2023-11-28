@extends('base.base')

@section('title', 'Lista asociados')

@section('breadcrumb')
{!! Breadcrumbs::render('asociado') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row mb-4">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        Asociados
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">

                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6 text-center">
                        <input id="proyecto" name="proyecto" type="hidden" value="{{$proyecto->id}}">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nuevo asociado</span>
                            </div>
                            <input id="dni" name="dni" type="number" placeholder="DNI de la persona a asociar" autofocus class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-plus" id="addAsociado" name="addAsociado"></i>
                                </span>
                            </div>
                        </div>
                        <small>
                            Para agregar un asociado al proyecto, éste debe haberse registrado previamente en el sistema.
                        </small>
                    </div>
                </div>

                {!! Form::open(['route' => 'asociado.destroy']) !!}
                {!! Form::close() !!}


                <div id="divasociados">
                    @include('admin.asociados.detalleasociados')
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    const proyecto  = $('#proyecto').val();

    $("#addAsociado").on("click", function(){

        const dni       = $('#dni').val();

        if(dni.length != 0){

            var route 		= '{{ route('proyecto.vincularasociado') }}';
            var token 		= $('input[name=_token]').val() ;
            $.ajax({

                url 	: route,
                headers : {'X-CSRF-TOKEN': token},
                type 	: 'POST',
                dataType: 'json',
                data 	: {
                    proyecto : proyecto, 
                    dni: dni
                },

                success: function(data){

                    $('#divasociados').html(data);
                }
            });
        }
    })

    function desvincula(id){

        var texto   = '&nbsp; Desvincula asociado? &nbsp;';

        ymz.jq_confirm({
            title:texto,
            text:"",
            no_btn:"Cancelar",
            yes_btn:"Confirma",
            no_fn:function(){
                return false;
            },
            yes_fn:function(){

                var route 		= '{{ route('proyecto.desvincularasociado') }}';
                var token 		= $('input[name=_token]').val() ;
                $.ajax({

                    url 	: route,
                    headers : {'X-CSRF-TOKEN': token},
                    type 	: 'POST',
                    dataType: 'json',
                    data 	: {
                        proyecto : proyecto, 
                        id: id
                    },

                    success: function(data){

                        $('#divasociados').html(data);
                    }
                });
            }
        });
    };

</script>

@endsection