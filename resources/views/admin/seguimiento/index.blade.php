@extends('base.base')

@section('title', 'Seguimiento empresa')

@section('breadcrumb')
{!! Breadcrumbs::render('empresa.Admin') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-lg-10">
                        <h4>{{ $empresa->razon_social }}</h4>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-lg-2 text-right">
                        <a href="{{ route('seguimiento.create', request()->route()->parameters['id'] ) }}" class="btn btn-secondary">
                            <i class="fas fa-plus-circle"></i> Cargar seguimiento
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="seguimiento">
                        <thead>
                            <tr>
                                <th class=" w-25">Texto</th>
                                <th class=" w-25">Financiamiento</th>
                                <th>Estado</th>
                                <th>Registró</th>
                                <th style="width: 15px">FechaRegistro</th>
                                <th style="width: 15px">FechaRespuesta</th>
                                <th style="width: 15px">Medio</th>
                                <th style="width: 15px">Tipo</th>
                                <th style="width: 15px">Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    var table = $('#seguimiento').DataTable({
            scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            lengthMenu      : [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            dom             : '<"wrapper"Brflit>',
            buttons         : ['copy', 'excel', 'pdf', 'colvis'],
            order           : [[ 2, "asc" ]],
            stateSave       : true,
            processing      : true,
            serverSide      : true,
            language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
            ajax            : "{{ route('seguimiento.index', request()->route()->parameters['id'] ) }}",
            columns: [
                {data: 'respuesta', name: 'respuesta', orderable: false, searchable: true,},
                {data: 'financiamiento', name: 'financiamiento', orderable: false, searchable: true,},
                {data: 'estadoTipo', name: 'estadoTipo', orderable: false, searchable: false, class:"text-center"},
                {data: 'usuario', name: 'usuario', orderable: true, searchable: true,},
                {data: 'fecha_registro', name: 'fecha_registro', orderable: true, class:"text-center"},
                {data: 'fecha_pactada', name: 'fecha_pactada', orderable: false, class:"text-center"},
                {data: 'tipo', name: 'tipo', orderable: false, searchable: true, class:"text-center"},
                {data: 'envia', name: 'envia', orderable: false, searchable: true, class:"text-center"},
                {data: 'borrar', name: 'borrar', orderable: false, searchable: false, class:"text-center"},
            ]
        });

        $('#seguimiento').on("click", ".borrar", function(){

            var texto   = '&nbsp; Elimina seguimiento? &nbsp;';
            var id      = this.id;

            ymz.jq_confirm({
                title:texto,
                text:"",
                no_btn:"Cancelar",
                yes_btn:"Confirma",
                no_fn:function(){
                    return false;
                },
                yes_fn:function(){

                    var token 		= $('input[name=_token]').val() ;

                    $.ajax({

                        url 	: "{{ route('seguimiento.destroy') }}",
                        type 	: 'POST',
                        headers : {'X-CSRF-TOKEN': token},
                        dataType: 'json',
                        data 	: {id: id},
                        success: function(data){
                            table.ajax.reload();
                            toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                            toastr.error("&nbsp;", "Seguimiento eliminado ... ");
                        }
                    });
                }
            });
    });
</script>

@endsection