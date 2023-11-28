@extends('base.base')

@section('title', 'Listar proyecto')

@section('breadcrumb')
    {!! Breadcrumbs::render('proyecto') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Proyectos

                        @if (Auth::user()->hasRole(['user']))
                            <small>
                                <a href="{{ route('proyecto.create') }}" class="btn btn-link">(+) Crear</a>
                            </small>
                        @endif

                    </h5>
                </div>

                <div class="card-body">

                    {!! Form::open(['route' => 'proyecto.destroy']) !!}
                    {!! Form::close() !!}

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="proyecto">
                            <thead>
                                <tr>
                                    <th>Denominación</th>
                                    <th>Titular</th>
                                    <th>Empresa</th>
                                    <th>Asociados</th>
                                    <th>Estado Proyecto</th>
                                    <th>Estado Planillas</th>
                                    <th>
                                        @if (Auth::user()->hasRole(['user']))
                                            Enviar
                                        @else
                                            Habilitar
                                        @endif
                                    </th>
                                    <th>Imprimir</th>
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
        $(function() {
            var table = $('#proyecto').DataTable({
                scrollCollapse: true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
                lengthMenu: [
                    [25, 50, -1],
                    [25, 50, "Todos"]
                ],
                dom: '<"wrapper"Brflitp>',
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                order: [[1, "asc"]],
                stateSave: true,
                processing: true,
                serverSide: true,
                language: {
                    "url": "{{ url('public/DataTables/spanish.json') }}"
                },
                ajax: "{{ route('proyecto.index') }}",
                columns: [
                    {
                        data: 'denominacion',
                        name: 'denominacion',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'titular',
                        name: 'titular',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'empresa',
                        name: 'empresa',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'integrantes',
                        name: 'integrantes',
                        orderable: false,
                        searchable: false,
                        class: "text-center"
                    },
                    {
                        data: 'estado',
                        name: 'estado',
                        orderable: false,
                        searchable: true,
                        class: "text-center"
                    },
                    {
                        data: 'estadoplanilla',
                        name: 'estadoplanilla',
                        orderable: false,
                        searchable: false,
                        class: "text-center"
                    },
                    {
                        data: 'enviar',
                        name: 'enviar',
                        orderable: false,
                        searchable: false,
                        class: "text-center"
                    },
                    {
                        data: 'print',
                        name: 'print',
                        orderable: false,
                        searchable: false,
                        class: "text-center"
                    },
                    {
                        data: 'borrar',
                        name: 'borrar',
                        orderable: false,
                        searchable: false,
                        class: "text-center"
                    },
                ]
            });
        })

        function enviar(dato) {

            ymz.jq_confirm({
                title: '<div class="text-center m-3">Confirma envío del proyecto  ?</div>',
                text: "<small>Luego de enviarlo, todos sus datos no podrán modificarse</small>",
                no_btn: "No",
                yes_btn: "Si",
                no_fn: function() {

                    return false;
                },
                yes_fn: function() {
                    window.location.href = 'proyecto/enviar/' + dato;
                }
            })
        }

        function rehabilitar(proyecto) {

            ymz.jq_confirm({
                title: '',
                text: "<div class='text-center m-3'>Confirma rehabilita proyecto?</div>",
                no_btn: "No",
                yes_btn: "Si",
                no_fn: function() {

                    return false;
                },
                yes_fn: function() {
                    window.location.href = 'proyecto/rehabilitar/' + proyecto;
                }
            })
        }

        $('#proyecto').on("click", ".borrar", function() {

            var texto = '&nbsp; Elimina ? &nbsp;';
            var id = this.id;
            var fila = $(this).parent().parent().parent();

            ymz.jq_confirm({
                title: texto,
                text: "",
                no_btn: "Cancelar",
                yes_btn: "Confirma",
                no_fn: function() {
                    return false;
                },
                yes_fn: function() {

                    $.ajax({

                        url: "{{ route('proyecto.destroy') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            fila.remove();
                            toastr.options = {
                                "progressBar": true,
                                "showDuration": "300",
                                "timeOut": "1000"
                            };
                            toastr.error("&nbsp;", "Proyecto eliminado ... ");
                        }
                    });
                }
            });
        });
    </script>

@endsection
