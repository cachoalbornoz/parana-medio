@extends('base.base')

@section('title', 'Ingreso')

@section('content')


<div class="container">

    <div class="row mt-3">
        <div class="col-xs-12 col-md-6 col-lg-6 mx-auto">
            @include('partials.session')
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-xs-12 col-md-6 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row mb-3">
                                <div class="col-xs-12 col-sm-12 col-lg-12">
                                    <label for="email">Correo electrónico</label>
                                    <input id="email" type="email" class="form-control mb-3" name="email" value="{{ old('email') }}" required autofocus>

                                    @if($errors->has('email'))
                                    <span class="help-block mt-2">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row mb-3">
                                <div class="col-xs-12 col-sm-12 col-lg-12">
                                    <label for="password">Clave</label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        <div class=" input-group-append">
                                            <span class="input-group-text">
                                                <span class="fa fa-eye" id="mostrar"></span>
                                            </span>
                                        </div>
                                    </div>

                                    @if($errors->has('password'))
                                    <span class="help-block mt-2">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div id="g-recaptcha" style="transform:scale(0.85);transform-origin:0 0">
                                    {!! htmlFormSnippet() !!}
                                    @if($errors->has('g-recaptcha-response'))
                                    <span class="help-block" style="display: block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <button type="submit" class="btn btn-block btn-info">
                                    Acceder
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('js')

    @endsection