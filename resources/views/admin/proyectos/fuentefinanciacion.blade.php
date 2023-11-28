<div class="card border mb-2">
    <div class="card-header bg-info p-3">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                <h5>Origen de los montos de la fuente financiación prevista <small>(ff)</small></h5>
                <small>
                    Origen de las fuentes de financiación y los montos previstos. Diferenciar entre recursos propios, créditos (ya sea del Programa Jóvenes Emprendedores u otras fuentes), subsidios y otros.
                </small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-xs-12 col-md-12 col-lg-12">

                {!! Form::open(['route' => ['ff.insert'], 'id' => 'formff'] )  !!}
                <table class="table table-sm table-borderless text-center">
                    <thead>
                        <tr>
                            <th>Origen </th>
                            <th style="width: 10%">Año</th>
                            <th style="width: 10%">Monto</th>
                            <th style="width: 10%"></th>
                            <th style="width: 10%">Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                <select name="ffdescripcion" id="ffdescripcion" class="form-control" >
                                    <option value="Recursos Propios" selected>Recursos Propios</option>
                                    <option value="Prestamos solicitados a la Dirección">Prestamos solicitados a la Dirección</option>
                                    <option value="Subsidios">Subsidios</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </td>
                            <td>
                                <select name="ffano" id="ffano" class="form-control text-center" >
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                </select>
                            </td>
                            <td>
                                {!! Form::number('ffmonto', 1, ['id' =>'ffmonto', 'required', 'class' => 'form-control text-center', 'min' => 1, 'max' => '99999999999', 'onkeyup' => 'imposeMinMax(this)']) !!}
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

        <div id="ffdetalle">
            @include('admin.proyectos.ffdetalle')
        </div>

    </div>
</div>
