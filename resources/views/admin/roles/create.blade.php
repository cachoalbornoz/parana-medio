@extends('base.base')

@section('title', 'Crear roles')

@section('breadcrumb')
    {!! Breadcrumbs::render('roles.create') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Crear rol
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">

                            {{ Form::open(['route' => 'roles.store']) }}

                               <div class="form-group mb-4">
                                    {!! Form::label('name', 'Nombre') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de rol']) !!}
                                </div>

                                <div class="form-group mb-4">
                                    {!! Form::label('guard_name', 'Guard Name') !!}
                                    {!! Form::text('guard_name', 'web', ['class' => 'form-control', 'required', 'placeholder' => 'Guard name']) !!}
                                </div>

                                <div class='form-group mb-4'>
                                    <h5><b>Asignar permisos</b></h5>
                                        @foreach ($permissions as $permission)
                                            {{ Form::checkbox('permissions[]',  $permission->id ) }}
                                            {{ Form::label($permission->name, $permission->name) }}<br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                                </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

	<script>

	$(document).ready(function() {


	});

	</script>

@endsection
