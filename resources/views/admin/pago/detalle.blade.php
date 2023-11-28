@foreach ($pagos as $pago)

<div class="row text-center mb-5">
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{$pago->monto}}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{ date('d-m-Y', strtotime($pago->fecha)) }}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{$pago->cuenta}}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{$pago->Tipopago->pago}}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{$pago->nro_operacion}}
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        <a href="javascript:borrar({{$pago->id}})" title="Elimina">
            <i class="fas fa-trash text-danger"></i>
        </a>
    </div>
</div>

@endforeach

<hr />


<div class="row text-center mb-2">
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        Total devolver
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{ number_format($expediente->monto_devolver,2) }}
    </div>
</div>

<div class="row text-center mb-2">
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        Total pagado
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        {{ number_format($pagos->sum('monto'),2) }}
    </div>
</div>

<div class="row text-center mb-2">
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">

    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2">
        Saldo
    </div>
    <div class="col-xs-12 col-sm-2 col-xs-2 text-bold text-danger">
        {{ number_format($expediente->monto_devolver - $pagos->sum('monto'),2 ) }}
    </div>
</div>