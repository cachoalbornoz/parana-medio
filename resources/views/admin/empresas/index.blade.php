@extends('base.base')

@section('title', 'Listar empresa')

@section('breadcrumb')
{!! Breadcrumbs::render('empresa') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>
                    Empresas
                </h5>
            </div>

            <div class="card-body">

                {!! Form::open(['route' => 'empresa.destroy']) !!}
                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="empresa">
                        <thead>
                            <tr>
                                <th>RazónSocial </th>
                                <th>Titular</th>
                                <th>Cuit</th>
                                <th>TipoPyme</th>
                                <th>CategoriaPrincipal</th>
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
    var table = $('#empresa').DataTable({
            scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            lengthMenu      : [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            dom             : '<"wrapper"Brflit>',
            buttons         : ['copy', 'excel', 'pdf', 'colvis'],
            order           : [[ 1, "asc" ]],
            stateSave       : true,
            processing      : true,
            serverSide      : true,
            language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
            ajax: "{{ route('empresa.index') }}",
            columns: [
                {data: 'razon_social', name: 'razon_social', orderable: true, searchable: true,},
                {data: 'titular', name: 'titular', orderable: true, searchable: true,},
                {data: 'cuit', name: 'cuit', orderable: false, searchable: true, class:"text-center"},
                {data: 'tipopyme', name: 'tipopyme', orderable: false, searchable: true,},
                {data: 'categoria1', name: 'categoria1', orderable: false, searchable: true,},
                {data: 'ciudad', name: 'ciudad', orderable: true, searchable: true},
                {data: 'borrar', name: 'borrar', orderable: false, searchable: false, class:"text-center"},
            ]
        });

        $('#empresa').on("click", ".borrar", function(){


            var texto   = '&nbsp; Elimina empresa? &nbsp;';
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

                    var token 		= $('input[name=_token]').val() ;

                    $.ajax({

                        url 	: "{{ route('empresa.destroy') }}",
                        type 	: 'POST',
                        headers : {'X-CSRF-TOKEN': token},
                        dataType: 'json',
                        data 	: {id: id},
                        success: function(data){
                            table.ajax.reload();
                            toastr.options = { "progressBar": true, "showDuration": "300", "timeOut": "1000" };
                            toastr.error("&nbsp;", "Empresa eliminada ... ");
                        }
                    });
                }
            });
        });
</script>

@endsection