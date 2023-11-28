<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="rendiciones">
        <thead>
            <tr class=" bg-secondary text-white">
                <th>Fecha</th>
                <th>Importe</th>
                <th>Comprobante</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($rendiciones as $rendicion)

            <tr>
                <td class="w-25">{{date('d-m-Y', strtotime($rendicion->fecha))}}</td>
                <td class="w-25">{{$rendicion->importe}}</td>
                <td class="w-25">{{$rendicion->Rendicion->rendicion}}</td>
                <td class="w-25">
                    <a href="javascript:borrar({{$rendicion->id}})" title="Elimina">
                        <i class="fas fa-trash text-secondary"></i>
                    </a>
                </td>
            </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr class=" bg-light">
                <th class="w-25"></th>
                <th class="w-25">Total rendido</th>
                <th class="w-25">Porcentaje</th>
                <th class="w-25">Evaluación rendición</th>
            </tr>
            <tr>
                <th></th>
                <th>{{ number_format($rendiciones->sum('importe'), 2)}}</th>
                <th>
                    @if ((($rendiciones->sum('importe') / $expediente->monto)*100) >= 100)
                        100
                    @else
                        {{ number_format(($rendiciones->sum('importe') / $expediente->monto)*100, 2)}}    
                    @endif
                    %
                </th>
                <th @if (($rendiciones->sum('importe') / $expediente->monto) > 0.74)
                    class="bg-success"
                    @else
                    @if (($rendiciones->sum('importe') / $expediente->monto) > 0.50)
                    class="bg-warning"
                    @else
                    class="bg-danger"
                    @endif
                    @endif
                    >

                    @if (($rendiciones->sum('importe') / $expediente->monto) > 0.74)
                    Total
                    @else
                    @if (($rendiciones->sum('importe') / $expediente->monto) > 0.50)
                    Parcial
                    @else
                    @if (($rendiciones->sum('importe') / $expediente->monto) > 0.50)
                    Insuficiente
                    @else
                    Sin rendición
                    @endif
                    @endif
                    @endif

                </th>
            </tr>
        </tfoot>
    </table>
</div>