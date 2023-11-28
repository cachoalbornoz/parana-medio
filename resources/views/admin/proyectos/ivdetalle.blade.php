@if($ingresoventa->count('id') > 0)
    <table class="table table-sm table-borderless table-hover text-center" id="ingresoventa">
        <tr>
            <th> </th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
        </tr>

        @foreach ($ingresoventa as $ingreso)
        <tr>
            <td class="text-left">
                {!! $ingreso->ivdescripcion !!}
            </td>
            <td>
                {!! $ingreso->ivano !!}
            </td>
            <td>
                {!! $ingreso->ivcantidad !!}
            </td>
            <td>
                {!! $ingreso->ivcosto !!}
            </td>
            <td>
                {!! $ingreso->ivtotal !!}
            </td>
            <td>
                <a href="javascript:void(0)" title="Elimina item" onclick="eliminaiv('{{ $ingreso->id }}')">
                    <i class="fas fa-trash text-danger"></i>
                </a>
            </td>
        </tr>

        @endforeach
    </table>
@else
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

        </div>
    </div>
@endif
