@extends('base.base')

@section('title', 'Lista asociados')

@section('breadcrumb')
{!! Breadcrumbs::render('asociado') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <h5>
                            Asociados
                            <small>
                                <a href="{{ route('asociado.create') }}" class="btn btn-link">(+) Crear</a>
                            </small>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="card-body">

                {!! Form::open(['route' => 'asociado.destroy']) !!}
                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="asociados">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>#Id</th>
                                <th>Asociado</th>
                                <th>Programa</th>
                                <th>Dni</th>
                                <th>Email</th>
                                <th>Ciudad</th>
                                <th>Habilitado</th>
                                <th>Registro</th>
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
    var table = $('#asociados').DataTable({
        scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
        lengthMenu      : [[25, 50, -1], [25, 50, "Todos"]],
        dom             : '<"wrapper"Brflit>',
        buttons         : ['copy', 'excel', 'pdf', 'colvis'],
        order           : [[ 1, "asc" ]],
        stateSave       : true,
        processing      : true,
        serverSide      : true,
        language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
        ajax: "{{ route('asociado.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, class:"text-center"},
            {data: 'id', name: 'id', orderable: false, searchable: false, class:"text-center"},
            {data: 'apellido', name: 'apellido'},
            {data: 'programa', name: 'programa'},
            {data: 'dni', name: 'dni', class:"text-center"},
            {data: 'email', name: 'email'},
            {data: 'ciudad', name: 'ciudad'},
            {data: 'habilitado', name: 'habilitado', orderable: false, searchable: false, class:"text-center"},
            {data: 'created_at', name: 'created_at', orderable: true, searchable: false, class:"text-center"},
            {data: 'borrar', name: 'borrar', orderable: false, searchable: false, class:"text-center"},
        ]
    });

    $('#asociados').on("click", ".borrar", function(){

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

                $.ajax({

                    url 	: "{{ route('users.destroy') }}",
                    type 	: 'POST',
                    dataType: 'json',
                    data 	: {id: id},
                    success: function(data){
                        fila.remove();
                        toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                        toastr.error("&nbsp;", "Solicitante eliminado ... ");
                    }
                });
            }
        });
    });

</script>

@endsection