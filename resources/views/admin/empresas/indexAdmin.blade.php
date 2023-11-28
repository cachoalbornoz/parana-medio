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
                        Empresas Admin
                    </h5>
                </div>
            </div>
        </div>

        <div class="card-body">

            {!! Form::open(['route' => 'empresa.destroy']) !!}
            {!! Form::close() !!}

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="empresa">
                    <thead>
                        <tr>
                            <th>Editar </th>
                            <th>Razón Social </th>
                            <th>Titular</th>
                            <th>Emisor</th>
                            <th>Seg.</th>
                            <th>Cuit</th>
                            <th>Categoria</th>
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


@endsection

@section('js')

    <script>
        var table = $('#empresa').DataTable({
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
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
            ajax: "{{ route('empresa.getEmpresas') }}",
            columns: [
                {data: 'id'},
                {data: 'razon_social', 'class':'text-left'  },
                {data: 'titular', 'class':'text-left' },
                {data: 'emisor',   },
                {data: 'seguimiento',   },
                {data: 'cuit',   },
                {data: 'categoria1',   },
                {data: 'ciudad', 'class':'text-left' },
                {data: 'borrar',   },
            ]
        });

        $('#empresa').on("click", ".borrar", function() {
            var texto = '&nbsp; Elimina empresa? &nbsp;';
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

                        url: "{{ route('empresa.destroy') }}",
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
                            toastr.error("&nbsp;", "Empresa eliminada ... ");
                        }
                    });
                }
            });
        });
    </script>

@endsection
