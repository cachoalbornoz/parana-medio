@extends('base.base')

@section('title', 'Crear ciudad')

@section('breadcrumb')
    {!! Breadcrumbs::render('inicio') !!}
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h5>
            Carga de nuevas ciudades
        </h5>
    </div>

    <div class="card-body">

        <form id = 'form'>
            
            <div class="row mb-5">
                <div class="col-xs-12 col-sm-4 col-lg-4 mb-2">
                    {!! Form::label('provincia', 'Provincia') !!}
                    {!! Form::select('provincian', $provincia, null, ['id' => 'provincian', 'class' => 'form-control', 'placeholder' => 'Seleccione provincia', 'required' => 'true']) !!}
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 mb-2">
                    {!! Form::label('departamento', 'Departamento') !!}
                    {!! Form::select('departamenton', $departamento, null, ['id' => 'departamenton', 'class' => 'form-control', 'placeholder' => 'Seleccione departamento', 'required' => 'true']) !!}
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 mb-2">
                    {!! Form::label('ciudad', 'Ciudad') !!}
                    {!! Form::select('ciudadn', $ciudad, null, ['id' => 'ciudadn', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-sm-12 col-lg-12 mb-2">
                    <hr>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <label>Nueva ciudad</label>
                    {!! Form::text('ciudad', null, ['id' => 'ciudad', 'class' => 'form-control', 'placeholder'=>'Nombre de la nueva ciudad', 'autofocus'=>'true', 'required' => 'true']) !!}
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    {!! Form::submit('Crear', ['class' => 'btn btn-info']) !!}                    
                </div>
            </div>

        </form>

    </div>
</div>    

@endsection

@section('js')

	<script>
        
        $('#form').on('submit', function(event) {





            event.preventDefault();
            var form    = $("#form");

            $.ajax({

                url 	: '{{route('ciudad.insert')}}',
                type 	: 'POST',
                data    : form.serialize(),

                success: function(response){

                    $('#ciudad').val('');
                    $('#ciudad').focus();

                    toastr.options = { "progressBar": true, "showDuration": "3000", "timeOut": "3000" };
                    toastr.success("&nbsp;", "Ciudad agregada correctamente ");
                    
                }
            });
        });


    </script>

@endsection    