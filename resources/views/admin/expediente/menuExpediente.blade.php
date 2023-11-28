<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <a class="btn btn-secondary" title="Detalles del Expediente" href={{route('expediente.edit', $expediente->id)}}>EX</a>
        <a class="btn btn-secondary" title="Listado Emprendedores" href={{route('proyecto.asociados', $expediente->proyecto)}}>LE</a>
        <a class="btn btn-secondary" title="Ubicación" href={{route('ubicacion.index', $expediente->id)}}>UB</a>
        <a class="btn btn-secondary" title="Rendición" href={{route('rendicion.index', $expediente->id)}}>RE</a>
        <a class="btn btn-secondary" title="Estado" href={{route('estado.index', $expediente->id)}}>ES</a>
        <a class="btn btn-secondary" title="Notificaciones" href={{route('notificacion.index', $expediente->id)}}>NO</a>
        <a class="btn btn-secondary" title="Visitas" href={{route('visita.index', $expediente->id)}}>VI</a>
        <a class="btn btn-secondary" title="Forma pago" href={{route('cuota.index', $expediente->id)}}>FP</a>
        <a class="btn btn-secondary" title="Pagos" href={{route('pago.index', $expediente->id)}}>PA</a>
        <a class="btn btn-warning" title="Imprimir Proyecto" href={{route('print.proyecto', $expediente->proyecto)}}>PR</a>
    </div>
</div>