<div class="card border mb-2">
    <div class="card-header bg-secondary p-3">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 text-white">
                <h5>Planilla de resultados</h5>
                <small>
                    Cálculo en base con la proyección de ingresos por ventas y a los costos estructurales y proporcionales declarados para los próximos dos años el resultado de los ingresos menos egresos.
                </small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <table class="table table-sm text-center" id="ingresostotales">
                    <thead>
                        <tr>
                            <th>INGRESOS</th>
                            <th style="width: 10%">Año 1</th>
                            <th style="width: 10%">AÑO 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">Ingresos x ventas</td>
                            <td>{{ $ingresoventa->where('ivano', '=', '1')->sum('ivtotal') }} </td>
                            <td>{{ $ingresoventa->where('ivano', '=', '2')->sum('ivtotal') }} </td>
                        </tr>
                        <tr>
                            <td class="text-left">Ingresos x Otras Fuentes</td>
                            <td>{{ $fuentefinanciacion->where('ffano', '=', '1')->sum('ffmonto') }} </td>
                            <td>{{ $fuentefinanciacion->where('ffano', '=', '2')->sum('ffmonto') }} </td>
                        </tr>
                        <tr>
                            <td class="text-left">Ingresos Totales</td>
                            <td class=" font-weight-bold">{{ $ingresoventa->where('ivano', '=', '1')->sum('ivtotal') + $fuentefinanciacion->where('ffano', '=', '1')->sum('ffmonto') }} </td>
                            <td class=" font-weight-bold">{{ $ingresoventa->where('ivano', '=', '2')->sum('ivtotal') + $fuentefinanciacion->where('ffano', '=', '2')->sum('ffmonto')}} </td>
                        </tr>
                        <tr>
                            <td colspan="3"> </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-sm text-center" id="egresostotales">
                    <thead>
                        <tr>
                            <th>EGRESOS</th>
                            <th style="width: 10%"> </th>
                            <th style="width: 10%"> </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">Costos Fijos </td>
                            <td>{{ $costofijo->where('cfano', '=', '1')->sum('cfcosto')}} </td>
                            <td>{{ $costofijo->where('cfano', '=', '2')->sum('cfcosto')}} </td>
                        </tr>
                        <tr>
                            <td class="text-left">Costos Variables </td>
                            <td>{{ $costovariable->where('cvano', '=', '1')->sum('cvcosto')}}  </td>
                            <td>{{ $costovariable->where('cvano', '=', '2')->sum('cvcosto')}}  </td>
                        </tr>
                        <tr>
                            <td class="text-left">Egresos totales </td>
                            <td class=" font-weight-bold"> {{ $costofijo->where('cfano', '=', '1')->sum('cfcosto') + $costovariable->where('cvano', '=', '1')->sum('cvcosto') }} </td>
                            <td class=" font-weight-bold"> {{ $costofijo->where('cfano', '=', '2')->sum('cfcosto') + $costovariable->where('cvano', '=', '2')->sum('cvcosto') }} </td>
                        </tr>
                        <tr>
                            <td colspan="3"> </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-sm text-center" id="egresostotales">
                    <thead>
                        <tr class=" bg-warning">
                            <th class="text-left">RESULTADO FINAL</th>
                            <th style="width: 10%" class=" font-weight-bold">
                                {{ $ingresoventa->where('ivano', '=', '1')->sum('ivtotal')
                                + $fuentefinanciacion->where('ffano', '=', '1')->sum('ffmonto')
                                - ($costofijo->where('cfano', '=', '1')->sum('cfcosto') + $costovariable->where('cvano', '=', '1')->sum('cvcosto')) }}
                            </th>
                            <th style="width: 10%" class=" font-weight-bold">
                                {{ $ingresoventa->where('ivano', '=', '2')->sum('ivtotal')
                                + $fuentefinanciacion->where('ffano', '=', '2')->sum('ffmonto')
                                - ($costofijo->where('cfano', '=', '2')->sum('cfcosto') + $costovariable->where('cvano', '=', '2')->sum('cvcosto')) }}
                            </th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>
