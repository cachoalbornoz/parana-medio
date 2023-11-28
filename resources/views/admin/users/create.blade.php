@extends('base.base')

@section('title', 'Editar usuario '. $user->name)

@can('crear.usuario')

    @section('breadcrumb')
        {!! Breadcrumbs::render('users.edit', $user) !!}
    @stop

@endcan


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
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="card">
            <div class="card-header bg-info text-white">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-6 p-3">
                    <i class="fas fa-pen-alt"></i> Registro de usuarios
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6 p-3">
                    <small>
                        (*) Completá por favor el siguiente formulario, <b>todos</b> los datos son necesarios.
                    </small>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}" >
                {{ csrf_field() }}

                <div class="row mb-5">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label>Apellido</label>
                            <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>
                            @if ($errors->has('apellido'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label>Nombre/s</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required >
                            @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row  mb-5">
                    <div class="col-xs-12 col-sm-4 col-lg-4">
                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label>Dni</label>
                            <input id="dni" type="number" class="form-control" name="dni" value="{{ old('dni') }}" required min="0" maxlength="10">
                            @if ($errors->has('dni'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-lg-4">
                        <label>Cuit</label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    #
                                </span>
                            </div>
                            <input id="cuit" type="number" class="form-control" name="cuit" value="{{ old('cuit') }}" required>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-lg-4">
                        <div class="form-group{{ $errors->has('fechanac') ? ' has-error' : '' }}">
                            <label>
                                Fecha Nacimiento
                            </label>
                            <div class="input-group">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input id="fechanac" type="date" class="form-control" name="fechanac" value="{{ old('fechanac') }}" required>
                            </div>

                            @if ($errors->has('fechanac'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fechanac') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row  mb-5">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <label>Cod. área: <small>(sin el 0)</small></label>
                        <input id="codarea" type="text" class="form-control" name="codarea" value="{{ old('codarea') }}" required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <label>Teléfono: <small>(sin el 15)</small></label>
                        <div class="input-group">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-phone-alt"></i>
                                </span>
                            </div>
                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row  mb-5">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <label>Dirección / Nro / Dpto / Manzana / Barrio / Sector</label>
                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <label>Ciudad</label>
                        {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ciudad', 'required' => 'true']) !!}
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row  mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirme Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>

                <div class="row  mb-5">

                    <div class="col-xs-12 col-sm-6 col-lg-6 text-right">
                        <button type="submit" class="btn btn-info btn-lg btn-block">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('js')

    <script>

    $("#image").fileinput({
        language: 'es',
        dropZoneEnabled: false
    });

    </script>

@endsection
