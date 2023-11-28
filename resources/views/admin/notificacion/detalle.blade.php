<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="notificaciones">
        <thead>
            <tr class=" bg-secondary text-white">
                <th>Fecha</th>
                <th>Emprendedor</th>
                <th>Recibe</th>
                <th>Parentesco</th>
                <th>Dni</th>
                <th>Notificacion</th>
                <th>TPostal</th>
                <th>Monto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($notificaciones as $notificacion)

            <tr>
                <td>{{ date('d-m-Y', strtotime($notificacion->fecha)) }}</td>
                <td>{{$notificacion->Asociado->nombrecompleto}}</td>
                <td>{{$notificacion->recibe}}</td>
                <td>{{$notificacion->Parentesco->parentesco}}</td>
                <td>{{$notificacion->dni}}</td>
                <td>{{$notificacion->Notificacion->notificacion}}</td>
                <td>{{$notificacion->Tipopostal->postal}}</td>
                <td>{{$notificacion->monto}}</td>
                <td>
                    <a href="javascript:borrar({{$notificacion->id}})" title="Elimina">
                        <i class="fas fa-trash text-danger"></i>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>