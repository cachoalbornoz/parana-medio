@extends('base.base')

@section('title', 'Listar documentacion')

@section('breadcrumb')
    {!! Breadcrumbs::render('documentacion') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h5>
                    Documentación
                </h5>
            </div>

			<div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="documentacion">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Denominación proyecto</th>
                                <th>Titular</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                                <th>Modificación</th>
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
            var table = $('#documentacion').DataTable({
                scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
                lengthMenu      : [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                dom             : '<"wrapper"Brflit>',
                buttons         : ['copy', 'excel', 'pdf', 'colvis'],
                order           : [[ 1, "asc" ]],
                stateSave       : true,
                processing      : true,
                serverSide      : true,
                language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
                ajax: "{{ route('documentacion.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', class:"text-center"},
                    {data: 'denominacion', name: 'denominacion', orderable: true, searchable: true},
                    {data: 'titular', name: 'titular', orderable: true, searchable: true},
                    {data: 'revision', name: 'revision', orderable: true, searchable: true},
                    {data: 'estado', name: 'estado', orderable: false, searchable: false},
                    {data: 'updated_at', name: 'updated_at', orderable: false, searchable: false, class:"text-center"},
                ]
            });
        })
	</script>

@endsection
