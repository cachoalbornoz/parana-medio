@if($costofijo->count('id') > 0)
<table class="table table-sm table-borderless table-hover text-center" id="costofijo">
    <tr>
        <th> </th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
    </tr>

    @foreach ($costofijo as $costo)

    <tr>
        <td class="text-left">
            {!! $costo->cfdescripcion !!}
        </td>
        <td>
            {!! $costo->cfano !!}
        </td>
        <td>
            {!! $costo->cfcosto !!}
        </td>
        <td>

        </td>
        <td>
            <a href="javascript:void(0)" title="Elimina item" onclick="eliminacf('{{ $costo->id }}')">
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
