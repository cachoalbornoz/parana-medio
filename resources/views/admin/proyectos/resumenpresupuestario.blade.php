<div class="card border mb-2">
    <div class="card-header bg-info p-3">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                <h5>Resumen presupuestario <small>(rp)</small></h5>
                <small>
                    Detalle de gastos a cubrir por el crédito y/otras fuentes.
                </small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-xs-12 col-md-12 col-lg-12">
                {!! Form::open(['route' => ['resumen.insert'], 'id' => 'formrp'] ) !!}
                <table class="table table-sm table-borderless text-center">
                    <thead>
                        <tr>
                            <th>Descripción </th>
                            <th style="width: 10%">Cantidad</th>
                            <th style="width: 10%">Costo</th>
                            <th style="width: 10%">Total</th>
                            <th style="width: 10%">Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                {!! Form::text('rpdescripcion', null, ['id' =>'prdescripcion', 'class' => 'form-control empty', 'required']) !!}
                            </td>
                            <td>
                                {!! Form::number('rpcantidad', 1, ['id' =>'rpcantidad', 'class' => 'form-control text-center', 'required', 'min' => 1, 'max' => '99999999999', 'onkeyup' => 'imposeMinMax(this)' ]) !!}
                            </td>
                            <td>
                                {!! Form::number('rpcosto', 1, ['id' =>'rpcosto', 'class' => 'form-control text-center', 'required', 'min' => 1, 'max' => '99999999999', 'onkeyup' => 'imposeMinMax(this)']) !!}
                            </td>
                            <td>
                                {!! Form::number('rptotal', 0, ['id' =>'rptotal', 'class' => 'form-control text-center', 'disabled' => true]) !!}
                            </td>
                            <td>
                                <button class="btn btn-info btn-block" type="submit">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{ Form::close() }}
            </div>
        </div>

        <div id="rpdetalle">
            @include('admin.proyectos.rpdetalle')
        </div>

    </div>
</div>