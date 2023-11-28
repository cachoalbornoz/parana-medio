@extends('base.base')

@section('title', 'Listar origenes')

@section('breadcrumb')
    {!! Breadcrumbs::render('inicio') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h5>
                    Origenes de contactos
                </h5>
            </div>

			<div class="card-body">

                <form action ="{{route('origen.accion')}}" id = 'form'>

                    <div class="row mb-2">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            Nuevo origen
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            {!! Form::text('origen', null, ['class' => 'form-control', 'required', 'autofocus'=>'true']) !!}
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            {!! Form::submit('Crear', ['class' => 'btn btn-info']) !!}
                        </div>
                    </div>

                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="origenes">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>origen </th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
		</div>
	</div>
</div>

<div id="formulario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title"></p>
            </div>

            <form id = 'formedit'>

                <div class="modal-body">

                    <div class="form-group">

                        <label class="control-label col-sm-2">origen</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="origen">
                            <input type="text" class="form-control" id="nombre" autofocus>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" class="btn btn-info actualizar" data-dismiss="modal">
                        Modificar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@section('js')

	<script>

        $(document).on("click", ".actualizar", function(event){

            event.preventDefault();

            $.ajax({

                url 	: "{{route('origen.accion')}}",
                type 	: 'POST',
                data    : {accion: 'editar', id:$("#origen").val(), origen:$("#nombre").val()},
                success: function(){
                    table.ajax.reload();
                }
            });
        });

        $('#form').on('submit', function(event) {

            event.preventDefault();
            var form    = $("#form");

            $.ajax({

                url 	: form.attr('action'),
                type 	: 'POST',
                data    : form.serialize()+ "&accion=guardar",
                success: function(){
                    table.ajax.reload();
                }
            });
        });

        $(document).on("click", ".editar", function(){

            var id = this.id;

            $('.modal-title').text('Modificar origen');

            $.ajax({
                url     : "{{route('origen.edit')}}" + "/" +id,
                type 	: 'GET',
                dataType: 'json',
                success: function(data){

                    $('#origen').val(data.id);
                    $('#nombre').val(data.origen);
                    $('#formulario').modal('show');
                }
            });
        })

        var table = $('#origenes').DataTable({
            scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            lengthMenu      : [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            dom             : '<"wrapper"Brflit>',
            buttons         : ['copy', 'excel', 'pdf', 'colvis'],
            order           : [[ 1, "asc" ]],
            stateSave       : true,
            processing      : true,
            serverSide      : true,
            language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
            ajax            : "{{ route('origen.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, class:"text-center"},
                {data: 'origen', name: 'origen', orderable: true, searchable: true},
                {data: 'edit', name: 'edit', orderable: false, searchable: false, class:"text-center"},
                {data: 'borrar', name: 'borrar', orderable: false, searchable: false, class:"text-center"},
            ]
        });


        $(document).on("click", ".borrar", function(){

            var texto   = '&nbsp; Elimina registro ? &nbsp;';
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

                    $.ajax({

                        url 	: "{{ route('origen.accion') }}",
                        type 	: 'POST',
                        dataType: 'json',
                        data 	: {accion: 'borrar', id: id},
                        success: function(){

                            table.ajax.reload();
                        }
                    });
                }
            });
        });

	</script>

@endsection
