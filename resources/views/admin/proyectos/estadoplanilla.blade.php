<label>Estado</label>
@if ($planilla->camposVacios() == 0)
    <a class="btn btn-info" href="#" title="Estado planillas del proyecto">
        <span>Completa</span>
    </a>
@else
    <a class="btn btn-info" href="#" title="Estado planillas del proyecto">
        <span>Incompleta</span>
    </a>
@endif

