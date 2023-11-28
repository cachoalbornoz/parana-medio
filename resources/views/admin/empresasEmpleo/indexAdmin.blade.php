@extends('base.base')

@section('title', 'Listar empresa')

@section('breadcrumb')
    {!! Breadcrumbs::render('empresa') !!}
@endsection

@section('content')


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h5>
                        Solicitudes
                    </h5>
                </div>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover" style="font-size: smaller" id="empleados">
                <thead>
                    <tr>
                        <th>Ver</th>
                        <th>Empresa</th>
                        <th>Empleado</th>
                        <th>Estado</th>
                        <th>Icono</th>
                        <th>Fecha estado</th>
                        <th>Desbloquear</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>


@endsection

@section('js')

    <script>
        var table = $('#empleados').DataTable({
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Todos"]
            ],
            dom: '<"wrapper"Brflit>',
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            order: [
                [1, "asc"]
            ],
            bSort:false,
            stateSave: true,
            processing: true,
            serverSide: true,
            language: {
                "url": "{{ url('public/DataTables/spanish.json') }}"
            },
            ajax: "{{ route('empresaEmpleo.indexAdmin') }}",
            columns: [{
                    data: 'id',
                    orderable: false,
                    searchable: false,
                    class: "text-center"
                },
                {
                    data: 'empresa',
                    orderable: true,
                    searchable: true,
                },                
                {
                    data: 'empleado',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'estado',
                    orderable: true,
                    searchable: true,
                    class: "text-center"
                },
                {
                    data: 'icono',
                    orderable: false,
                    searchable: false,
                    class: "text-center"
                },
                {
                    data: 'updated_at',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'habilitar',
                    orderable: false,
                    searchable: false,
                    class: "text-center"
                }
            ]
        });



        $('#empleados').on("click", ".habilitar", function() {

            var texto = '&nbsp; Permite que la empresa modifique sus datos ? &nbsp;';
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

                        url: "{{ route('documentacione.habilitar') }}",
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
                            toastr.success("&nbsp;", "Carga nuevamente habilitada ... ");
                        }
                    });
                }
            });
        })
    </script>

@endsection
