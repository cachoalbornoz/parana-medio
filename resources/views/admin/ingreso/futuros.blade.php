@extends('base.base')

@section('title', 'Ingresos futuros')

@section('breadcrumb')
    {!! Breadcrumbs::render('inicio') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ingresos futuros</h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="ingresos">
                            <thead>
                                <tr>
                                    <th>Mes</th>
                                    <th>Año</th>
                                    <th>Proyeccion de ingresos</th>
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
        var table = $('#ingresos').DataTable({
            scrollCollapse: true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            lengthMenu: [
                [12, 24, 36, 48],
                [12, 24, 36, 48]
            ],
            dom: 'Blrtip',
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            ordering: false,
            stateSave: true,
            processing: true,
            serverSide: true,
            language: {
                "url": "{{ url('public/DataTables/spanish.json') }}"
            },
            ajax: "{{ route('ingresos.getIngresosFuturos') }}",
            columns: [
                {data: 'mes'},
                {data: 'anio'},
                {data: 'ingresos'},
            ]
        });
    </script>

@endsection
