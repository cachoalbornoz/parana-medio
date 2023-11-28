@extends('base.base')

@section('title', 'Cambio password')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    Resetear clave
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('password.update') }}" method="post" role="form" class="form-horizontal">
                {{csrf_field()}}

                <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                    <div class="row justify-content-center  ">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <label>Contraseña anterior</label>
                            <input id="password" type="password" class="form-control" name="old">
                            @if ($errors->has('old'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="row justify-content-center  ">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <label>Contraseña</label>
                            <input id="password" type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="row justify-content-center  ">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <label>Confirme contraseña</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row justify-content-center  ">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <button type="submit" class="btn btn-primary form-control">Cambiar</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection