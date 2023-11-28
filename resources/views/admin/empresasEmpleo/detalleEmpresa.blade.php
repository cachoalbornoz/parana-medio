<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="empresa">
        <thead>
            <tr>
                <th>RazónSocial </th>
                <th class=" text-center">Requisitos empresa</th>
                <th>Cuit</th>
                <th>TipoPyme</th>
                <th>Documentación</th>
                <th class=" text-center">Requisitos documentación</th>
                <th>Ciudad</th>
                <th class="text-center">Accion</th>
                <th class="text-center">Borrar</th>
            </tr>
        </thead>
        <tbody>
            @if ($empresas)

                @foreach ($empresas as $empresa)
                    <tr>
                        <td>
                            @if ($empresa->estado != 24)
                                <a href="{{ route('empresaEmpleo.edit', $empresa->id) }}"
                                    title="Carga y modifica información de la empresa">
                                    {{ $empresa->razon_social }}
                                </a>
                            @else
                                {{ $empresa->razon_social }}
                            @endif
                        </td>
                        <td class=" text-center">
                            @if (!$empresa->completa())
                                <span class="text-danger">Incompletos</span>
                            @else
                                <span class="text-success">Completos</span>
                            @endif
                        </td>
                        <td>{{ $empresa->cuit }}</td>
                        <td>{{ $empresa->tipopyme ? $empresa->Tipopyme->pyme : null }}</td>

                        <td>
                            @if ($empresa->documentacion->personaCompleta() == 0)
                                <a href="{{ route('documentacione.edit', $empresa->id) }}"
                                    title="Carga y modifica documentación de la empresa">
                                    <span class=" text-danger">
                                        Falta Documentación ...
                                    </span>
                                </a>
                            @else
                                <a href="{{ route('documentacione.edit', $empresa->id) }}"
                                    title="Carga y modifica documentación de la empresa">
                                    <span class=" text-success">
                                        Documentación completa
                                    </span>
                                </a>
                            @endif
                        </td>


                        <td>
                            @if ($empresa->Documentacion->personaCompleta() == 0)
                                <span class="text-danger">Incompletos</span>
                            @else
                                <span class="text-success">Completos</span>
                            @endif
                        </td>
                        <td>{{ $empresa->ciudad ? $empresa->Ciudad->nombre : null }}</td>
                        <td class=" text-center">

                            @if ($empresa->estado == 20 && $empresa->completa() && $empresa->Documentacion->personaCompleta() == 1)
                                <a href="javascript:enviar({{ $empresa->id }})" class="btn btn-success btn-sm"
                                    title="Envía datos de la empresa junto a la documentación para que se evalúen">
                                    Enviar datos
                                </a>
                            @else
                                @if ($empresa->estado == 24)
                                    <button class=" btn btn-secondary btn-sm"
                                        title="La empresa ha enviado sus datos junto a la documentación ">
                                        Datos enviados
                                    </button>
                                @endif
                            @endif


                        </td>
                        <td class=" text-center">

                            @if (Auth::user()->hasRole(['superadmin', 'admin']))
                                @if ($empresa->estado != 24)
                                    <a class="link" onclick="desvincula({{ $empresa->id }})"
                                        title="Elimina la empresa cargada">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                @endif
                            @endif

                        </td>
                    </tr>
                @endforeach

            @endif
        </tbody>
    </table>
</div>
