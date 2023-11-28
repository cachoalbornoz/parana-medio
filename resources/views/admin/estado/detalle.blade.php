<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm text-center" style="font-size: smaller" id="estadoes">
        <thead>
            <tr class=" bg-secondary text-white">
                <th>Fecha</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($estados as $estado)

            <tr>
                <td class="w-25">{{date('d-m-Y', strtotime($estado->fecha))}}</td>
                <td class="w-25">{{$estado->Estado->estado}}</td>
                <td class="w-25">
                    <a href="javascript:borrar({{$estado->id}})" title="Elimina">
                        <i class="fas fa-trash text-danger"></i>
                    </a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>