@extends('base.base')

@section('title', 'Ingreso')

@section('content')





    <div id="outer">
        <div id="wrapper">

            <form id="formLogin" role="form" method="POST" action="{{ url('/login') }}" autocomplete="off" class="mt-5">

                {{ csrf_field() }}

                <div class="form-group">                    
                    <label for="email">Correo electrónico</label>
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-user"></span>
                            </span>
                        </div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block mt-2">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>                        
                </div>

                <div class="form-group">
                    <label for="password">Clave</label>
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-key"></span>
                            </span>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <div class=" input-group-append">
                            <span class="input-group-text">
                                <span class="fa fa-eye" id="mostrar"></span>
                            </span>
                        </div>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block mt-2">
                            {{ $errors->first('password') }}
                        </span>
                    @endif                        
                </div>

                <div class="form-group">
                    <div id="g-recaptcha" style="transform:scale(0.85);transform-origin:0 0">
                        {!! htmlFormSnippet() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block" style="display: block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <button type="submit" name="submitBtn" id="submitBtn"
                            class="btn btn-lg btn-primary btn-block">Entrar</button>
                    </div>
                </div>
                
            </form>

            @include('partials.session')
            
        </div>
    </div>


@endsection

@section('js')

@endsection
