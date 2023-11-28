@extends('base.base')

@section('title', 'calculadora')

@section('content')

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

        <div class="row mb-3">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				&nbsp;
			</div>
		</div>

        <div class="row mb-3">
			<div class="col-xs-12 col-sm-3 col-lg-3">
                <label>
                    Monto a financiar *
                </label>
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input id="monto" name="monto" type="number" class="form-control" min="0" max="9999999" onkeyup = 'imposeMinMax(this)' placeholder="Monto a financiar">
                </div>
            </div>
        </div>

        <div class="row mb-3">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				&nbsp;
			</div>
		</div>

        <div class="row mb-3">
			<div class="col-xs-12 col-sm-4 col-lg-4 mb-3">
                <label>
                    Frecuencia de amortización *
                </label>
                <select name="frecuencia" id="frecuencia" class="form-control text-center" >
                    <option value="12" selected>MENSUAL</option>
                    <option value="3">TRIMESTRAL</option>
                    <option value="6">SEMESTRAL</option>
                    <option value="1">ANUAL</option>
                </select>

            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4 mb-3">
                <label>
                    Mes de la 1° amortización *
                </label>
                <select name="meses" id="meses" class="form-control text-center" >
                    <option value="" selected>-</option>
                    <option value="0">0</option>
                    <option value="6">6</option>
                    <option value="12">12</option>
                    <option value="18">18</option>
                    <option value="24">24</option>
                </select>

            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4 mb-3">
                <label>
                    Cuotas de amortización *
                </label>
                <select name="cuotas" id="cuotas" class="form-control text-center" >
                    <option value="" selected>-</option>
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="36">36</option>
                    <option value="48">48</option>
                    <option value="60">60</option>
                </select>

			</div>
        </div>

        <div class="row mb-3 border-bottom border-primary">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				&nbsp;
			</div>
        </div>


        <div class="row">
			<div class="col-xs-12 col-sm-6 col-lg-6">
                Plazo total
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6 text-right">
                <input type="button" value="Calcular" class="btn btn-primary">
			</div>
        </div>

        <div class="row mb-3">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<div id="resultado"></div>
			</div>
        </div>




		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
				<br/>
			</div>
		</div>


    </div>


@endsection
