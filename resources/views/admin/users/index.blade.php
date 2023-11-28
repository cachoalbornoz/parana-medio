@extends('base.base')

@section('title', 'Listar usuarios')

@section('breadcrumb')
{!! Breadcrumbs::render('users') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Usuarios</h5>
            </div>

            <div class="card-body">

                {!! Form::open(['route' => 'users.destroy']) !!}
                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-sm" style="font-size: smaller" id="usuarios">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Dni</th>
                                <th>Email</th>
                                <th>Ciudad</th>
                                <th>Creado</th>
                                <th>Rol</th>
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
            var table = $('#usuarios').DataTable({
                scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
                lengthMenu      : [[5, 25, 50, -1], [5, 25, 50, "Todos"]],
                dom             : '<"wrapper"Brflit>',
                buttons         : ['copy', 'excel', 'pdf', 'colvis'],
                order           : [[ 1, "asc" ]],
                stateSave       : true,
                processing      : true,
                serverSide      : true,
                language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'id', name: 'id', orderable: true, searchable: false, class:"text-center"},
                    {data: 'apellido', name: 'apellido', orderable: true, searchable: true},
                    {data: 'nombre', name: 'nombre', orderable: true, searchable: true},
                    {data: 'dni', name: 'dni', orderable: false, class:"text-center"},
                    {data: 'email', name: 'email', orderable: false},
                    {data: 'ciudad', name: 'ciudad'},
                    {data: 'created_at', name: 'created_at', orderable: true, searchable: false, class:"text-center"},
                    {data: 'rol', name: 'rol'},
                    {data: 'borrar', name: 'borrar', orderable: false, searchable: false, class:"text-center"},
                ]
            });
        })

        $('#usuarios').on("click", ".borrar", function(){


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