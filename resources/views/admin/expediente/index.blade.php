@extends('base.base')

@section('title', 'Listar expediente')

@section('breadcrumb')
{!! Breadcrumbs::render('expediente') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>
                    Expedientes
                    <small>
                        <a href="{{ route('expediente.create') }}" class="btn btn-link">(+) Crear</a>
                    </small>
                </h5>
            </div>

            <div class="card-body">

                {!! Form::open(['route' => 'expediente.destroy']) !!}
                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="expediente">
                        <thead>
                            <tr>
                                <th>Expediente</th>
                                <th>Titular</th>
                                <th>Dni</th>
                                <th>Icono</th>
                                <th>Estado</th>
                                <th>FechaOtorg</th>
                                <th>Año</th>
                                <th>Finalidad</th>
                                <th>Monto</th>
                                <th>Saldo</th>
                                <th>Ciudad</th>
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
    var table = $('#expediente').DataTable({
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "Todos"]
    ],
    dom: '<"wrapper"Brflit>',
    buttons: ['copy', 'excel', 'pdf', 'colvis'],
    order: [
        [1, "asc"]
    ],
    stateSave: true,
    processing: true,
    serverSide: true,
    language: {
        "url": "{{ url('public/DataTables/spanish.json') }}"
    },
    ajax: "{{ route('expediente.index') }}",
    columns: [
        {
            data: 'id',
            name: 'id',
            orderable: true,
            searchable: true,
            class: "text-center"
        },
        {
            data: 'titular',
            name: 'titular',
            orderable: true,
            searchable: true,
        },
        {
            data: 'dni',
            name: 'dni',
            orderable: true,
            searchable: true,
            class: "text-center"
        },
        {
            data: 'icono',
            name: 'icono',
            orderable: false,
            searchable: false,
            class: "text-center"
        },
        {
            data: 'estado',
            name: 'estado',
            orderable: false,
            searchable: false,
            class: "text-center"
        },
        {
            data: 'fecha_otorgamiento',
            name: 'fecha_otorgamiento',
            orderable: true,
            searchable: true,
            class: "text-center"
        },
        {
            data: 'ano',
            name: 'ano',
            orderable: true,
            searchable: true,
            class: "text-center"
        },
        {
            data: 'rubro',
            name: 'rubro',
            orderable: true,
            searchable: true,
        },
        {
            data: 'monto',
            name: 'monto',
            orderable: false,
            searchable: false,
            class: "text-center"
        },
        {
            data: 'saldo',
            name: 'saldo',
            orderable: false,
            searchable: false,
            class: "text-center"
        },
        {
            data: 'ciudad',
            name: 'ciudad',
            orderable: true,
            searchable: true,
            class: "text-center"
        },
        {
            data: 'borrar',
            name: 'borrar',
            orderable: true,
            searchable: true,
            class: "text-center"
        },
    ]
});

$('#expediente').on("click", ".borrar", function() {

    var texto = '&nbsp; Elimina expediente? &nbsp;';
    var id = this.id;

    ymz.jq_confirm({
        title: texto,
        text: "",
        no_btn: "Cancelar",
        yes_btn: "Confirma",
        no_fn: function() {
            return false;
        },
        yes_fn: function() {

            var token = $('input[name=_token]').val();

            $.ajax({

                url: "{{ route('expediente.destroy') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    table.ajax.reload();
                    toastr.options = {
                        "progressBar": true,
                        "showDuration": "300",
                        "timeOut": "1000"
                    };
                    toastr.error("&nbsp;", "Expediente eliminado ... ");
                }
            });
        }
    });
});

</script>

@endsection