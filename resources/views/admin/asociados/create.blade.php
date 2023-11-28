@extends('base.base')

@section('title', 'Crear asociado')

@section('breadcrumb')
{!! Breadcrumbs::render('asociado') !!}
@stop

@section('content')

@include('errors.error')

<div class="card">

    {!! Form::open(['route' => 'asociado.store']) !!}

    <div class="card-header">

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <h5>
                    Nuevo Asociado
                </h5>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6 text-right">
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-2 col-lg-2">
                <label>Dni</label>
                {!! Form::number('dni', null, ['id'=> 'dni', 'autofocus'=>'true', 'class' => 'form-control', 'required', 'min'=>'0', 'maxlength'=>'10']) !!}
            </div>
            <div class="col-xs-12 col-sm-5 col-lg-5">
                <label>Apellido</label>
                {!! Form::text('apellido', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="col-xs-12 col-sm-5 col-lg-5">
                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    <label>Nombres</label>
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <label>Nacionalidad</label>
                {!! Form::select('nacionalidad', $pais, 13, ['class' => 'form-control', 'placeholder' => 'Seleccione nacionalidad', 'required' => 'true']) !!}
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
                {!! Form::text('codarea', null, ['class' => 'form-control', 'required', 'maxlength' => '5']) !!}
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
            <div class="col-xs-12 col-sm-6 col-lg-6 mb-2">
                <label>Dirección Nro - (Dpto / Manzana / Barrio / Sector)</label>
                {!! Form::text('direccion', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="col-xs-12 col-sm-2 col-lg-2 mb-2">
                {!! Form::label('provincia', 'Provincia') !!}
                {!! Form::select('provincia', $provincia, null, ['id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Seleccione provincia', 'required' => 'true']) !!}
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4 mb-2">
                {!! Form::label('ciudad', 'Ciudad') !!}
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
                        {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                </div>
            </div>
        </div>

        <div class="row  mb-3">
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirme Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}

</div>

@endsection


@section('js')

<script>
    $('#dni').on('blur', function (e) {

    e.preventDefault();

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    console.log(0);
    return false;

    jQuery.ajax({
        url: "{{ url('/form') }}",
        method: 'post',
        data: {
            name: jQuery('#footballername').val(),
            type: jQuery('#club').val(),
            price: jQuery('#country').val()
        },
        success: function (data) {
            jQuery.each(data.errors, function (key, value) {
                jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p>' + value + '</p>');
            });
        }

    });
});

</script>

@endsection