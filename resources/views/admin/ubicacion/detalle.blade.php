<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="ubicaciones">
        <thead>
            <tr class=" bg-secondary text-white">
                <th>Fecha</th>
                <th>Ubicacion</th>
                <th>Motivo / Respuesta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($ubicaciones as $ubicacion)

            <tr>
                <td class="w-25">{{date('d-m-Y', strtotime($ubicacion->fecha))}}</td>
                <td class="w-25">{{$ubicacion->Ubicacion->ubicacion}}</td>
                <td class="w-25">{{$ubicacion->observacion}}</td>
                <td class="w-25">
                    <a href="javascript:borrar({{$ubicacion->id}})" title="Elimina">
                        <i class="fas fa-trash text-danger"></i>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>