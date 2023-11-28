@extends('base.base')

@section('title', 'calculadora')

@section('content')

    <style>
        select {
            text-align: center;
            text-align-last: center;
        }
    </style>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<br/>
			</div>
		</div>

		<div class="row mb-3 border-bottom border-info">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<h4>CALCULADORA</h4>
			</div>
        </div>

        <form id ='form'>

            <div class="row mb-3">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    &nbsp;
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <label>
                        MONTO A FINANCIAR <span class=" text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <div class=" input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                        </div>
                        <input id="monto" name="monto" type="number" class="form-control text-center" autofocus min="0" max="99999999" onkeyup = 'imposeMinMax(this)'>
                    </div>
                </div>
            </div>


            <div class="row mb-5 text-center">
                <div class="col-xs-12 col-sm-3 col-lg-3 mb-3">
                    <label>
                        <h6>MESES DE GRACIA</h6>
                    </label>
                    <input type="number" name="mesamor" value="6" id="mesamor" class="form-control text-center shadow">
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-3 mb-3">
                    <label>
                        <h6>CUOTAS DE AMORTIZACIÓN</h6>
                    </label>
                    <input type="number" value="18" name="cuotas" id="cuotas" class="form-control text-center shadow">
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-3 mb-3">
                    <label>
                        <H6>FRECUENCIA PAGOS</H6>
                    </label>
                    <input type="hidden" name="frecuencia" id="frecuencia" value="12" >
                    <input type="text" value="MENSUAL" class="form-control text-center shadow"  >
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-3 mb-3">
                    <label>
                        <H6>TASA INTERÉS ANUAL</H6>
                    </label>
                    <div class="input-group">
                        <input type="hidden" name="interes" id="interes" value="{{$tasa}}" >
                        <input type="text" value="{{ $tasa*100 }}" class="form-control text-center shadow" >

                        <div class="input-group-append">
                            <span class="input-group-text">
                                %
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3 border-bottom border-primary">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    &nbsp;
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <button class="btn btn-primary" id="calcular">
                        <i class="fas fa-calculator"></i> Calcular
                    </button>
                </div>
            </div>

            <div class="row mb-3 border-bottom border-primary">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    &nbsp;
                </div>
            </div>

        </form>

        <div class="row mb-3 mt-3">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<div id="resultado">
                    @include('partials.resultado')
                </div>
			</div>
        </div>

        <div class="row mb-3 mt-3">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<br/>
			</div>
        </div>

        <div class="row mb-3 mt-3">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<br/>
			</div>
        </div>

        <div class="row mb-3 mt-3">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<br/>
			</div>
		</div>

    </div>

@endsection

@section('js')

    <script>

        $('#calcular').on('click', function(event) {

            event.preventDefault();
            var form  = $("#form");

            $.ajax({

                url 	: '{{ route('calcular') }}',
                type 	: 'POST',
                data    : form.serialize(),

                success: function(data){
                    $("#resultado").html(data);
                }
            });
        });

    </script>

@endsection
