<div class="card border mb-2">
    <div class="card-header bg-info p-3">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                <h5>Proyección de ingresos por ventas <small>(iv)</small></h5>
                <small>
                    Proyección de ventas de unidades de los productos/servicios para los próximos dos años.
                </small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-xs-12 col-md-12 col-lg-12">

                {!! Form::open(['route' => ['iv.insert'], 'id' => 'formiv'] )  !!}
                <table class="table table-sm table-borderless text-center">
                    <thead>
                        <tr>
                            <th>Concepto</th>
                            <th style="width: 10%">Año</th>
                            <th style="width: 10%">Cantidad</th>
                            <th style="width: 10%">Monto</th>
                            <th style="width: 10%">Total</th>
                            <th style="width: 10%">Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                {!! Form::text('ivdescripcion', null, ['id' =>'ivdescripcion', 'required', 'class' => 'form-control']) !!}
                            </td>
                            <td>
                                <select name="ivano" id="ivano" class="form-control text-center" >
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                </select>
                            </td>
                            <td>
                                {!! Form::number('ivcantidad', 1, ['id' =>'ivcantidad', 'required', 'class' => 'form-control text-center', 'min' => 1, 'max' => '99999999999', 'onkeyup' => 'imposeMinMax(this)']) !!}
                            </td>
                            <td>
                                {!! Form::number('ivcosto', 1, ['id' =>'ivcosto', 'required', 'class' => 'form-control text-center', 'min' => 1, 'max' => '99999999999', 'onkeyup' => 'imposeMinMax(this)']) !!}
                            </td>
                            <td>
                                {!! Form::number('ivtotal', 0, ['id' =>'ivtotal', 'required', 'class' => 'form-control text-center', 'disabled' => true]) !!}
                            </td>
                            <td>
                                <button class="btn btn-info btn-block" type="submit" >
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{ Form::close() }}

            </div>
        </div>

        <div id="ivdetalle">
            @include('admin.proyectos.ivdetalle')
        </div>

    </div>
</div>
