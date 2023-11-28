@extends('base.base')

@section('title', 'Crear permisos')

@section('breadcrumb')
    {!! Breadcrumbs::render('permisos.create') !!}
@stop

@section('content')

    @include('errors.error')

    <div class="card">
        <div class="card-header">
            <h5>
                Permiso
            </h5>
        </div>

        <div class="card-body">

            {!! Form::model($permiso, ['route' => ['permisos.update', $permiso->id], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de permiso']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('guard_name', 'Guard Name') !!}
                {!! Form::text('guard_name', 'web', ['class' => 'form-control', 'required', 'placeholder' => 'Guard name']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close()  !!}

        </div>
    </div>	

@endsection
