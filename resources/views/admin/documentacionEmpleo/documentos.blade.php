<table class="table table-striped table-hover">
    <tr>
        <td style=" width: 35%">
            - Nombres y apellido de la persona
        </td>

        <td style=" width: 15%">
            <form id="formEmpleado" action="" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="empleado" id="empleado" class="form-control" required>
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            <i class=" fa fa-save" id="guardar"></i> 
                        </span>
                    </div>
                </div>
            </form>
        </td>
        <td style=" width: 30%">
            {{ $documentacion->empleado }}
        </td>
        <td style=" width: 20%">
            @if (Str::length($documentacion->empleado))
                <span class=" text-success"><i class="far fa-check-circle"></i> Documentación subida
                @else
                    <span class=" text-danger">
                        <i class="far fa-circle"></i> Falta documentación...
                    </span>
            @endif
        </td>
    </tr>

    <tr>
        <td>
            - Solicitud de Acceso al FONDEP
        </td>

        <td>
            <form id="formfondep" action="" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="file" name="fondep" id="fondep" accept="application/pdf" required>
            </form>
        </td>
        <td>
            @if (Str::length($documentacion->fondep))
                <a
                    href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->fondep) }}?codeimg={{ time() }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @else
                <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @endif
        </td>
        <td>
            @if (Str::length($documentacion->fondep))
                <span class=" text-success"><i class="far fa-check-circle"></i> Documentación subida
                @else
                    <span class=" text-danger">
                        <i class="far fa-circle"></i> Falta documentación...
                    </span>
            @endif
        </td>
    </tr>

    <tr>
        <td>
            - Constancia de la Clave Bancaria Uniforme (CBU) de titularidad del Solicitante, acreditando el tipo y
            número de cuenta y sucursal.
        </td>
        <td>
            <form id="formcbu" action="" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="file" name="cbu" id="cbu" accept="application/pdf" required>
            </form>
        </td>
        <td>
            @if (Str::length($documentacion->cbu))
                <a
                    href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->cbu) }}?codeimg={{ time() }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @else
                <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @endif
        </td>
        <td>
            @if (Str::length($documentacion->cbu))
                <span class=" text-success"><i class="far fa-check-circle"></i> Documentación subida
                @else
                    <span class=" text-danger">
                        <i class="far fa-circle"></i> Falta documentación...
                    </span>
            @endif
        </td>
    </tr>

    {{-- Alta temprana --}}

    <tr>
        <td>
            - Alta temprana de la/s persona/s contratada/s ante la ADMINISTRACIÓN FEDERAL DE INGRESOS PÚBLICOS
            (AFIP).
        </td>
        <td>
            <form id="formattrabajador" action="" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="file" name="attrabajador" id="attrabajador" accept="application/pdf" required>
            </form>
        </td>
        <td>
            @if (Str::length($documentacion->attrabajador))
                <a
                    href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->attrabajador) }}?codeimg={{ time() }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @else
                <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @endif
        </td>
        <td>
            @if (Str::length($documentacion->attrabajador))
                <span class="text-success">
                    <span class=" text-success"><i class="far fa-check-circle"></i> Documentación subida
                    </span>
                @else
                    <span class="text-danger">
                        <i class="far fa-circle"></i> Falta documentación...
                    </span>
            @endif
        </td>
    </tr>

    <tr>
        <td>
            - Certificado de discapacidad de los/las trabajadores/as contratados/as. (<b>Si corresponde</b>)
        </td>
        <td>
            <form id="formcertdiscapacidad" action="" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="file" name="certdiscapacidad" id="certdiscapacidad" accept="application/pdf" required>
            </form>
        </td>
        <td>
            @if (Str::length($documentacion->certdiscapacidad))
                <a
                    href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->certdiscapacidad) }}?codeimg={{ time() }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @else
                <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                    <i class="far fa-file-pdf"></i>
                </a>
            @endif
        </td>
        <td>
            @if (Str::length($documentacion->certdiscapacidad))
                <span class=" text-success">
                    <i class="far fa-check-circle"></i> Documentación subida
                </span>
            @else
                <span class=" text-danger">
                    <i class="far fa-circle"></i> Falta documentación...
                </span>
            @endif
        </td>
    </tr>
</table>
