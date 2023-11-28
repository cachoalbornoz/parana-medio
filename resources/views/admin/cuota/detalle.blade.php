<div class="row text-center mt-3">
    <div class="col-xs-12 col-sm-1 col-xs-1">

    </div>
    <div class="col-xs-12 col-sm-1 col-xs-1 text-bold">
        NroCuota
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2 text-bold">
        Vencimiento
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2 text-bold">
        Importe
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2 text-bold">
        Estado
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2 text-bold">
        Ent Parcial
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2 text-bold">

    </div>
</div>

@foreach ($cuotas as $cuota)

<div class="row text-center mt-3 hover">
    <div class="col-xs-12 col-sm-1 col-xs-1">
        <a href="javascript:borrar({{$cuota->id}})" title="Elimina">
            <i class="fas fa-trash text-danger"></i>
        </a>
    </div>
    <div class="col-xs-12 col-sm-1 col-xs-1">
        {{$cuota->nroCuota}}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{date('d-m-Y',strtotime($cuota->fechaVcto)) }}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{ number_format($cuota->monto,2,',', '') }}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2 {{ ($cuota->estado==0)?'text-danger':'text-success' }}">
        {{ ($cuota->estado == '0')?'Debe':'Pagada' }}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{ number_format($cuota->entregaParcial,2) }}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
</div>

@endforeach