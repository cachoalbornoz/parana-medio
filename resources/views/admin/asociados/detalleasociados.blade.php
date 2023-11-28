<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="asociados">
        <thead>
            <tr>
                <th class="text-center">Editar</th>
                <th>Asociado</th>
                <th class="text-center">Dni</th>
                <th>Email</th>
                <th class="text-center">Ciudad</th>
                <th class="text-center">Creado</th>
                <th class="text-center">Desvincular</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($asociados as $asociado)
            <tr>
                <td class="text-center">
                    <a href={{route('users.edit', $asociado->id)}}>
                        {{$asociado->id}}
                    </a>
                </td>
                <td>{{$asociado->nombre_completo}}</td>
                <td class="text-center">{{$asociado->dni}}</td>
                <td>{{$asociado->email}}</td>
                <td class="text-center">{{$asociado->Ciudad->nombre}}</td>
                <td class="text-center">{{$asociado->updated_at}}</td>
                <td class="text-center">

                    @if ($asociado->id !== $proyecto->titular)

                    <button class="btn btn-sm btn-warning" onclick="desvincula({{$asociado->id}})">
                        <i class="fas fa-unlink"></i>
                    </button>

                    @endif

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>