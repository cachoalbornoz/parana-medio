<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User,
    App\Models\TipoUbicacion,
    App\Models\ExpedienteUbicacion,
    App\Models\Expediente;

use Yajra\DataTables\Facades\DataTables;

class UbicacionController extends Controller
{

    public function index(Request $request)
    {
        $expediente     = Expediente::find($request->id);
        $ubicaciones    = ExpedienteUbicacion::where('expediente', $request->id)->orderBy('id', 'desc')->get();
        $tipoubicacion  = TipoUbicacion::orderBy('ubicacion')->pluck('ubicacion', 'id');

        return view('admin.ubicacion.index', compact('expediente', 'ubicaciones', 'tipoubicacion'));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        $ubicacion      = ExpedienteUbicacion::create($request->all());
        $ubicaciones    = ExpedienteUbicacion::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();
        $view           = view('admin.ubicacion.detalle', compact('ubicaciones'))->render();

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
        ExpedienteUbicacion::findOrFail($request->id)->delete();

        $ubicaciones    = ExpedienteUbicacion::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();
        $view   = view('admin.ubicacion.detalle', compact('ubicaciones'))->render();

        return response()->json($view);
    }
}
