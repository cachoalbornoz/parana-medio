
<div class="btn-group bg-secondary" role="group">
    @if (isset($proyecto->empresa))

        <a class="btn btn-secondary" href="{{ route('proyecto.editplanillas', $proyecto->id)}}" title="Planillas contables">
            Planillas
        </a>
        <a class="btn btn-secondary" href="{{ route('empresa.edit', $proyecto->empresa ) }}">
            Empresa
        </a>
        <a class="btn btn-secondary" href="{{ route('documentacion.edit', $proyecto->documentacion->id ) }}">
            Documentación
        </a>

    @else

        <a class="btn btn-secondary" href="#" title="Planillas contables">
            Planillas
        </a>
        <a class="btn btn-secondary" href="#">
            Empresa
        </a>
        <a class="btn btn-secondary" href="#">
            Documentación
        </a>

    @endif

    @if(Auth::user()->hasRole(['superadmin', 'admin']))
        <a class="btn btn-secondary" href="{{ route('evaluacion.edit', $proyecto->evaluacion->id ) }}">
            Evaluación
        </a>
    @endif
</div>
