@extends('base.base')

@section('title', 'Listar permisos')

@section('breadcrumb')
    {!! Breadcrumbs::render('permisos') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h5>Permisos
                    <small>
                        <a href="{{ route('permisos.create') }}" class="btn btn-link">(+) Crear</a>
                    </small>
                </h5>
            </div>

			<div class="card-body">

                {!! Form::open(['route' => 'permisos.destroy'])  !!}
                {!! Form::close()  !!}

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="permisos">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Guard_Name</th>
                                <th>Borrar</th>
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
        $(function () {
            var table = $('#permisos').DataTable({
                scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
                lengthMenu      : [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                dom             : '<"wrapper"Brflit>',
                buttons         : ['copy', 'excel', 'pdf', 'colvis'],
                order           : [[ 1, "asc" ]],
                stateSave       : true,
                processing      : true,
                serverSide      : true,
                language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
                ajax: "{{ route('permisos.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', class:"text-center"},
                    {data: 'name', name: 'name'},
                    {data: 'guard_name', name: 'guard_name'},
                    {data: 'borrar', name: 'borrar', orderable: false, searchable: false, class:"text-center"},
                ]
            });
        })

        $('#permisos').on("click", ".borrar", function(){


            var texto   = '&nbsp; Elimina ? &nbsp;';
            var id      = this.id;
            var fila    = $(this).parent().parent().parent();

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

                        url 	: "{{ route('permisos.destroy') }}",
                        type 	: 'POST',
                        headers : {'X-CSRF-TOKEN': token},
                        dataType: 'json',
                        data 	: {id: id},
                        success: function(data){
                            fila.remove();
                            toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                            toastr.error("&nbsp;", "Permiso eliminado ... ");
                        }
                    });
                }
            });
    });
	</script>

@endsection
