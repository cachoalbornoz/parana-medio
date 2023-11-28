<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User,
    App\Models\TipoEstado,
    App\Models\ExpedienteEstado,
    App\Models\Expediente;

use Yajra\DataTables\Facades\DataTables;

class EstadoController extends Controller
{

    public function index(Request $request)
    {
        $expediente = Expediente::find($request->id);
        $estados    = ExpedienteEstado::where('expediente', $request->id)->orderBy('id', 'desc')->get();
        $tipoestado = TipoEstado::orderBy('estado')->pluck('estado', 'id');

        return view('admin.estado.index', compact('expediente', 'estados', 'tipoestado'));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        $estado     = ExpedienteEstado::create($request->all());
        $estados    = ExpedienteEstado::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();

        // Obtengo y cambio de Estado al expediente
        $expediente = Expediente::find($request->expediente);
        $expediente->estado = $request->estado;
        $expediente->save();


        $view       = view('admin.estado.detalle', compact('expediente', 'estados'))->render();

        return response()->json($view);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request)
    {
        $estadoBorrar   = ExpedienteEstado::find($request->id);
        $estadoAnt      = $estadoBorrar->estadoAnt;
        $estadoBorrar->delete();

        $estados        = ExpedienteEstado::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();

        // Obtengo y cambio de Estado al expediente
        $expediente = Expediente::find($request->expediente);
        $expediente->estado = $estadoAnt;
        $expediente->save();

        $view   = view('admin.estado.detalle', compact('expediente', 'estados'))->render();

        return response()->json($view);
    }
}