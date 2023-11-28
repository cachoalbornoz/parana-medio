@extends('base.base')

@section('title', 'Editar foto ')

@section('breadcrumb')
{!! Breadcrumbs::render('users.profile') !!}
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

        {!! Form::model($user, ['route' => ['users.updateprofile', $user->id], 'method' => 'POST', 'files' => 'true']) !!}

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h5> {{ $user->nombre }} {{ $user->apellido }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row mb-5">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        @if(Str::length($user->image))
                        <img src="{{ asset('/public/images/upload/usuarios/'. $user->image) }}" class=" img-thumbnail" height="150" width="150">
                        @else
                        <img src="{{ asset('/public/images/frontend/user.jpg')}}" class=" img-thumbnail" height="150" width="150">
                        @endif
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6">
                        {!! Form::label('image', 'Cambiar foto de perfil') !!}
                        <input name="image" id="image" type="file" class="file">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12 text-right">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-secondary ']) !!}
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection