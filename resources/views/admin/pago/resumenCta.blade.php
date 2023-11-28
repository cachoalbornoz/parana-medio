@extends('base.base')

@section('title', 'Resumen de cuenta')

@section('breadcrumb')
    {!! Breadcrumbs::render('inicio') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Resumen de cuenta</h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="pagos">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Expediente</th>
                                    <th>Titular</th>
                                    <th>Monto</th>
                                    <th>Cuenta</th>
                                    <th>Pago</th>
                                    <th>Nro Operación</th>
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
        var table = $('#pagos').DataTable({
            scrollCollapse: true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            lengthMenu: [
                [10, 25, 50, 500],
                [10, 25, 50, 500]
            ],
            dom: 'Blrftip',
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            ordering: false,
            stateSave: true,
            processing: true,
            serverSide: true,
            language: {
                "url": "{{ url('public/DataTables/spanish.json') }}"
            },
            ajax: "{{ route('pago.getPagos') }}",
            columns: [
                {data: 'fecha'},
                {data: 'expediente'},
                {data: 'titular', 'class': 'text-left'},
                {data: 'monto'},
                {data: 'cuenta'},
                {data: 'tipopago'},
                {data: 'nro_operacion'},
            ]
        });
    </script>

@endsection
