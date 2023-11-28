<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="empresa">
        <thead>
            <tr>
                <th>Persona</th>
                <th>Documentacion</th>
                <th>Requisitos</th>
                <th>Enviar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr>
                    <td>
                        <a href="{{ route('documentacione.edit', $documento->id) }}">
                        @if (!$documento->empleado)
                            <span class=" text-danger">Complete datos de la persona</span>
                        @else
                            {{ $documento->empleado }}
                        @endif
                        </a>
                    </td>
                    <td>
                        @if ($documento->estado == 24)
                            Datos enviados
                        @else
                            <a href="{{ route('documentacione.edit', $documento->id) }}"
                                title="Carga y modifica documentación de la empresa">
                                @if ($documento->personaCompleta() == 0)
                                    <span class=" text-danger">
                                        Falta Documentación ...
                                    </span>
                                @else
                                    <span class=" text-success">
                                        Documentación completa
                                    </span>
                                @endif
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($documento->personaCompleta() == 0)
                            <span class="text-danger">Incompletos</span>
                        @else
                            <span class="text-success">Completos</span>
                        @endif
                    </td>
                    <td>
                        @if ($documento->personaCompleta() == 1 && $documento->estado != 24)
                            <a href="javascript:enviar({{ $documento->id }})" class="btn btn-success btn-sm"
                                title="Envía datos de la empresa junto a la documentación para que se evalúen">
                                Enviar datos
                            </a>
                        @else
                            @if ($documento->estado == 24)
                                <button class=" btn btn-secondary btn-sm"
                                    title="La empresa ha enviado sus datos junto a la documentación ">
                                    Datos enviados
                                </button>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
