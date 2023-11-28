@extends('base.base')

@section('title', 'Editar usuario '. $user->name)

@section('breadcrumb')
{!! Breadcrumbs::render('users.edit', $user) !!}
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <h5> {{ $user->nombre }} {{ $user->apellido }}</h5>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6 text-right">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row mt-5 mb-5">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label>Nombres</label>
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'autofocus'=>'true']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <label>Apellido</label>
                        {!! Form::text('apellido', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-xs-12 col-sm-4 col-lg-4">
                        <label>Dni</label>
                        {!! Form::number('dni', null, ['class' => 'form-control', 'required', 'min'=>'0', 'maxlength'=>'10']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-4 col-lg-4">
                        <label>Nacionalidad</label>
                        {!! Form::select('nacionalidad', $pais, null, ['class' => 'form-control', 'placeholder' => 'Seleccione nacionalidad', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-4 col-lg-4">
                        <label>
                            Fecha Nacimiento
                        </label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            {!! Form::date('fechanac', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-xs-12 col-sm-3 col-lg-3">
                        <label>Cod. área: <small>(sin el 0)</small></label>
                        {!! Form::text('codarea', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-9 col-lg-9">
                        <label>Teléfono: <small>(sin el 15) / Particular / Laboral</small></label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-phone-alt"></i>
                                </span>
                            </div>
                            {!! Form::text('telefono', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row  mb-5">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <label>Dirección Nro - (Dpto / Manzana / Barrio / Sector)</label>
                        {!! Form::text('direccion', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-lg-2">
                        <label>Provincia</label>
                        {!! Form::select('provincia', $provincia, $idprovincia, ['id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Seleccione provincia', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-3 col-lg-3">
                        <label>Ciudad</label>
                        {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ciudad', 'required' => 'true']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1">
                        <label>Cod Postal</label>
                        {!! Form::text('cp', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>

                <div class="row  mb-2">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <hr class=" border border-info">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xs-12 col-sm-12 col-lg-12">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>E-mail</label>
                            <div class="input-group">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                </div>
                                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-3 d-none @if(Auth::user()->hasRole(['superadmin', 'admin'])) d-block @endif">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <h5 class="mb-3">Roles disponibles</h5>
                        <ul>
                            @foreach ($roles as $role)
                            <p>
                                <label class="checkbox-inline">
                                    {{ Form::checkbox('roles[]', $role->id, null) }}
                                    {{ $role->name }}
                                </label>
                            </p>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <h5 class="mb-3">Habilitado para cargar proyecto</h5>
                        <p>
                            <label class="checkbox-inline">
                                {{ Form::checkbox('habilitado', null) }}
                                Habiltado
                            </label>
                        </p>
                    </div>
                </div>



            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12 text-right">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection


@section('js')

<script>


</script>


@endsection