@if($resumen->count('id') > 0)
    <table class="table table-sm table-hover table-borderless text-center" id="resumen">
        <tr>
            <th> </th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
            <th style="width: 10%"></th>
        </tr>

        @foreach ($resumen as $resu)

        <tr>
            <td class="text-left">
                {!! $resu->rpdescripcion !!}
            </td>
            <td>
                {!! $resu->rpcantidad !!}
            </td>
            <td>
                {!! $resu->rpcosto !!}
            </td>
            <td>
                {!! $resu->rptotal !!}
            </td>
            <td>
                <a href="javascript:void(0)" title="Elimina item" onclick="eliminarp('{{ $resu->id }}')">
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
