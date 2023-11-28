@extends('base.base')

@section('title', 'Registro')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <br />
            </div>
        </div>

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

        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <h5>Registro usuarios de Empresas</h5>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <small>
                            (*) Completá por favor el siguiente formulario, <b>todos</b> los datos son necesarios.
                        </small>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="form" class="form-horizontal" role="form" method="POST" action="{{ url('/registro/Emp') }}"
                    autocomplete="off">

                    {{ csrf_field() }}

                    <div class="row mt-3 mb-2">
                        <div class="col-xs-12 col-sm-2 col-lg-2 mb-2">
                            <div class="form-group">
                                <label>Dni</label>
                                <input id="dni" type="number" class="form-control" name="dni" autofocus maxlength="10">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-lg-5 mb-2">
                            <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label>Apellido</label>
                                <input id="apellido" type="text" class="form-control" name="apellido"
                                    value="{{ old('apellido') }}" required>
                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-lg-5 mb-2">
                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label>Nombres</label>
                                <input id="nombre" type="text" class="form-control" name="nombre"
                                    value="{{ old('nombre') }}" required>
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-2">
                        <div class="col-xs-12 col-sm-12 col-lg-12 mb-2">
                            <div id="divMensaje" class="alert alert-danger alert-dismissible d-none text-center">
                            </div>
                        </div>
                    </div>

                    <div class="row d-none">

                        <div class="col-xs-12 col-sm-4 col-lg-4 mb-4">
                            <label>Nacionalidad</label>
                            {!! Form::select('nacionalidad', $pais, 13, ['class' => 'd-none']) !!}
                        </div>

                        <div class="col-xs-12 col-sm-4 col-lg-4 mb-2">
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
                                    <input id="fechanac" type="date" class="d-none" name="fechanac" value="2000-01-01"
                                        required>
                                </div>

                                @if ($errors->has('fechanac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechanac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xs-12 col-sm-3 col-lg-3 mb-2">
                            <label>Código de área: <small></small></label>
                            <input id="codarea" type="text" class="form-control" name="codarea"
                                value="{{ old('codarea') }}" maxlength="5" required placeholder="Sin el 0">
                        </div>
                        <div class="col-xs-12 col-sm-9 col-lg-9 mb-2">
                            <label>Número de teléfono</label>
                            <div class="input-group">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone-alt"></i> &nbsp; <b>15</b>
                                    </span>
                                </div>
                                <input id="telefono" type="text" class="form-control" name="telefono"
                                    value="{{ old('telefono') }}" required placeholder="Particular ó laboral">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xs-12 col-sm-5 col-lg-5 mb-3">
                            <label>Dirección / Nro / Dpto / Manzana / Barrio / Sector</label>
                            <input id="direccion" type="text" class="form-control" name="direccion"
                                value="{{ old('direccion') }}" required>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-lg-2 mb-3">
                            <label>Provincia</label>
                            {!! Form::select('provincia', $provincia, null, ['id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Provincia ', 'required' => 'true']) !!}
                        </div>
                        <div class="col-xs-12 col-sm-3 col-lg-3 mb-3">
                            <label>Ciudad</label>
                            {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Ciudad ', 'required' => 'true']) !!}
                        </div>
                        <div class="col-xs-12 col-sm-2 col-lg-2 mb-3">
                            <label>Cod Postal</label>
                            <input id="cp" type="text" class="form-control" name="cp" value="{{ old('cp') }}"
                                minlength="4" maxlength="6" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            {!! Form::select('tipo_programa', $milemple, $milemple, ['class' => 'd-none']) !!}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-xs-12 col-sm-12 col-lg-12 mb-2">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>E-mail</label>
                                <div class="input-group">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <small>Mínimo 8 caracteres</small>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label for="password-confirm" class="control-label">Confirme Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                                <small>Reingrese su clave</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xs-12 col-sm-12 col-lg-12 mb-2">
                            {!! htmlFormSnippet() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block" style="display: block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xs-12 col-sm-12 col-lg-12 mb-2">
                            <button type="submit" class="btn btn-info">
                                Registrarme
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection


@section('js')

    <script>
        $("#form").submit(function(e) {
            $(":submit").attr('disabled', 'disabled');
            $(":submit").html('Registrando <i class="fas fa-spinner fa-spin"></i>');
        });


        $("#dni").focusout(() => {

            if ($("#dni").val().trim().length == 0 || $("#dni").val().trim().length < 7) {
                $("#dni").focus()
            } else {

                const dni = $("#dni").val()

                var formData = {
                    dni
                };

                var url = "{{ route('verificaDni') }}";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: formData,
                    beforeSend: function() {},
                    success: function(data) {

                        if (data['type'] == 'error') {
                            $("#divMensaje").html(data['msj']).removeClass('d-none');
                            $("#dni").focus()
                            return false
                        } else {
                            $("#divMensaje").html('').addClass('d-none');
                        }
                    }
                });
            }
        })
    </script>
@endsection
