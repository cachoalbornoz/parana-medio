@extends('base.base')

@section('title', 'Crear permisos')

@section('breadcrumb')
    {!! Breadcrumbs::render('permisos.create') !!}
@stop

@section('content')

    @include('errors.error')

    {!! Form::open(['route' => 'permisos.store'])  !!}


        <div class="card">
            <div class="card-header">
                <h5>
                    Permiso
                </h5>
            </div>

            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de permiso']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('guard_name', 'Guard Name') !!}
                    {!! Form::text('guard_name', 'web', ['class' => 'form-control', 'required', 'placeholder' => 'Guard name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                </div>

            </div>
        </div>


    {!! Form::close()  !!}

@endsection
