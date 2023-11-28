@extends('base.base')

@section('title', 'Editar clave ')

@section('breadcrumb')
{!! Breadcrumbs::render('users.clave') !!}
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
        @endif

    </div>
</div>

<div class="card">
    <div class=" card-header">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 ">
                <h5>Cambio de clave</h5>
            </div>
        </div>
    </div>

    <div class=" card-body">


        {!! Form::open(['route' => ['users.updateclave']]) !!}


        <div class="row mt-5 mb-5">
            <div class="col-md-6 offset-md-3">
                <label>CLAVE ACTUAL</label>
                {!! Form::password('clave_actual', ['class' => 'form-control', 'required', 'autofocus']) !!}
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <label>NUEVA CLAVE</label>
                {!! Form::password('nueva_clave', ['id' => 'nueva_clave', 'class' => 'form-control', 'required']) !!}
                <small>Mínimo 8 caracteres</small>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <label><small>Confirme</small> NUEVA CLAVE</label>
                {!! Form::password('nueva_clave_confirmation', ['id' => 'nueva_clave_confirmation', 'class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="row mb-5 mt-5">
            <div class="col-md-6 offset-md-3 text-right">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection


@section('js')


@endsection