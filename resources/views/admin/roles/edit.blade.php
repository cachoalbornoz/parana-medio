@extends('base.base')

@section('title', 'Editar roles')

@section('breadcrumb')
    {!! Breadcrumbs::render('roles.edit', $role) !!}
@endsection

@section('content')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-lg-12">
    		<div class="card">
    			<div class="card-header">
    				<h5>Rol <em>{{ $role->name }}</em> </h5>
                </div>

    			<div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de rol']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('guard_name', 'Guard Name') !!}
                                {!! Form::text('guard_name', 'web', ['class' => 'form-control', 'required', 'placeholder' => 'Guard name']) !!}
                            </div>

                            <div class="form-group">
                                <h5>Asignar permisos</h5>
                                @foreach ($permission as $permiso)
                                    <label>
                                        {{ Form::checkbox('permissions[]',  $permiso->id ) }}
                                        {{$permiso->name}}
                                    </label>
                                    <br>
                                @endforeach
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            </div>


                            {!! Form::close()  !!}
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
