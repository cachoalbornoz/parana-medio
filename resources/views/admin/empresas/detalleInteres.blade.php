@if (isset($intereses))
    <table class=" table table-striped table-hover table-sm">
        @foreach ($intereses as $interes)
            <tr>
                <td>
                    {{ $interes->id }}
                </td>
                <td>
                    @if(isset($interes->interes))
                        {{ $interes->intereses()->interes }}
                    @else
                        No especificado
                    @endif
                </td>
                <td class=" text-center" style="width: 150px">
                    <a href="javascript:void(0)" title="Elimina interés">
                        <i class="fas fa-trash text-danger borrarinteres" id="{{ $interes->id }}"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <div class="row mb-5">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <span class="text-danger">No se ha cargado ningún interés.</span>
        </div>
    </div>
@endif
