<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="notificaciones">
        <thead>
            <tr class=" bg-secondary text-white">
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Responsable</th>
                <th>Resultado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($visitas as $visita)

            <tr>
                <td>{{ date('d-m-Y', strtotime($visita->fecha)) }}</td>
                <td>{{$visita->motivo}}</td>
                <td>{{$visita->responsable}}</td>
                <td>{{$visita->resultado}}</td>
                <td>
                    <a href="javascript:borrar({{$visita->id}})" title="Elimina">
                        <i class="fas fa-trash text-danger"></i>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>