@if($fuentefinanciacion->count('id') > 0)
    <table class="table table-sm table-borderless table-hover text-center" id="fuentefinanciacion">
    <tr>
        <th> </th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
    </tr>
    @foreach ($fuentefinanciacion as $fuente)
    <tr>
        <td class="text-left">
            {!! $fuente->ffdescripcion !!}
        </td>
        <td>
            {!! $fuente->ffano !!}
        </td>
        <td>
            {!! $fuente->ffmonto !!}
        </td>
        <td>

        </td>
        <td>
            <a href="javascript:void(0)" title="Elimina item" onclick="eliminaff('{{ $fuente->id }}')">
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
