@extends('base.base')

@section('title', 'Listar auditorias')

@section('breadcrumb')
{!! Breadcrumbs::render('inicio') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>
                    Auditoria del Sistema
                </h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="auditorias">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Accion</th>
                                <th>Registro - Tabla</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    var table = $('#auditorias').DataTable({
            scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            lengthMenu      : [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            dom             : '<"wrapper"Brflit>',
            buttons         : ['copy', 'excel', 'pdf', 'colvis'],
            order           : [[ 1, "asc" ]],
            stateSave       : true,
            processing      : true,
            serverSide      : true,
            language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
            ajax            : "{{ route('auditoria.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, class:"text-center"},
                {data: 'codigo', name: 'codigo', orderable: true, searchable: true},
                {data: 'tabla', name: 'tabla', orderable: true, searchable: true},
                {data: 'usuario', name: 'usuario', orderable: true, searchable: true},
                {data: 'created_at', name: 'created_at', orderable: true, searchable: false},
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

                        url 	: "{{ route('auditoria.accion') }}",
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