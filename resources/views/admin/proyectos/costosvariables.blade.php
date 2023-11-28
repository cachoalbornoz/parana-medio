<div class="card border mb-2">
    <div class="card-header bg-info p-3">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                <h5>Detalle de costos variables <small>(cv)</small></h5>
                <small>
                    Costos previstos de producción, costo de la materia prima, mano de obra directa, servicios y de máquinas y herramientas necesarias para la producción; gastos de comercialización y costo de publicidad y promoción, comisiones por venta, transporte, etc.
                </small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-xs-12 col-md-12 col-lg-12">
                {!! Form::open(['route' => ['cv.insert'], 'id' => 'formcv'] )  !!}
                <table class="table table-sm table-borderless text-center">
                    <thead>
                        <tr>
                            <th>Descripción </th>
                            <th style="width: 10%">Año</th>
                            <th style="width: 10%">Monto</th>
                            <th style="width: 10%"></th>
                            <th style="width: 10%">Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                {!! Form::text('cvdescripcion', null, ['id' =>'cvdescripcion', 'required', 'class' => 'form-control']) !!}
                            </td>
                            <td>
                                <select name="cvano" id="cvano" class="form-control text-center" >
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                </select>
                            </td>
                            <td>
                                {!! Form::number('cvcosto', 1, ['id' =>'cvcosto', 'required', 'class' => 'form-control text-center', 'min' => 1, 'max' => '99999999999', 'onkeyup' => 'imposeMinMax(this)']) !!}
                            </td>
                            <td>

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

        <div id="cvdetalle">
            @include('admin.proyectos.cvdetalle')
        </div>

    </div>
</div>
