@extends('base.base')

@section('title', 'Carga proyecto')

@section('breadcrumb')
    {!! Breadcrumbs::render('proyecto.create') !!}
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


{!! Form::open('route' => ['proyecto.store']) !!}

<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                        <div class="form-group">
                            {!! Form::button('Guardar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>

            </div>

			<div class="card-body">

                <div class="row mb-3">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            {!! Form::label('denominacion', 'Denominacion del proyecto') !!}
                            {!! Form::text('denominacion', null, ['autofocus' => 'true', 'class' => 'form-control', 'required', 'placeholder' => 'Idea del proyecto']) !!}
                        </div>
                    </div>
                </div>

                <div class="row mt-3 mb-3">

                    {!! Form::hidden('titular', Auth::user()->id, ['required']) !!}

                    {!! Form::hidden('empresa', $empresa->id, ['required']) !!}

                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Datos del titular del proyecto</label>
                            <div class="input-group">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        Apellido y Nombres
                                    </span>
                                </div>
                                {!! Form::text('apellido', Auth::user()->apellido.', '. Auth::user()->nombre, ['class' => 'form-control bg-white', 'readonly' => 'true']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Datos de la empresa vinculada</label>
                            <div class="input-group">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        Razón social
                                    </span>
                                </div>
                                {!! Form::text('razon', $empresa->razon_social, ['class' => 'form-control bg-white', 'readonly' => 'true']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <p class="mb-3">Asociados al proyecto</p>
                            @foreach ($asociados as $asociado)
                                <label>
                                    {{ Form::checkbox('asociados[]',  $asociado->id ) }} {{$asociado->apellido}}, {{$asociado->nombre}}
                                </label>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción del proyecto') !!}
                            {!! Form::textarea('descripcion', null, ['autofocus' => 'true', 'rows' => '3', 'class' => 'form-control', 'required', 'placeholder' => 'Descripción del proyecto']) !!}
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('objetivos', 'Objetivos del proyecto') !!}
                            {!! Form::textarea('objetivos', null, ['class' => 'form-control', 'rows' => '3', 'required', 'placeholder' => 'Objetivos del proyecto']) !!}
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('oportunidad', 'Oportunidad del proyecto') !!}
                            {!! Form::textarea('oportunidad', null, ['class' => 'form-control', 'rows' => '3', 'required', 'placeholder' => 'Oportunidad del proyecto']) !!}

                        </div>
                    </div>
                </div>

			</div>
		</div>
	</div>
</div>

{!! Form::close()  !!}

@endsection

@section('js')

    <script>

        $( document ).on( 'keydown', function ( e ) {

            if (e.keyCode === 121 ) { // F10

                guardar(objeto);

            }

        });

        function guardar(this1) {

        this1.disabled  = true;
        this1.innerHTML = 'Guardando ... aguarde ';

        var url = "editar_proyectos.php";

        $.ajax({
            type: "POST",
            url: url,
            data: $("#solicitud").serialize(),

            success: function (data) {

                console.log(data);

                setTimeout(function () {
                    this1.disabled  = false;
                    this1.innerHTML = ' <i class="fas fa-save"></i> Guardar (F10)';

                }, 1000);
            }
        });

        return false;
    }

    $(window).scroll(function () {
        if ($(document).scrollTop() >= ($(document).height() / 50))
            $("#spopup").show("slow");
        else
            $("#spopup").hide("slow");
    });



    </script>

@endsection
