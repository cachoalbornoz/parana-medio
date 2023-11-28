<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User,
    App\Models\ExpedienteVisita,
    App\Models\Expediente;

use Yajra\DataTables\Facades\DataTables;

class VisitaController extends Controller
{

    public function index(Request $request)
    {
        $expediente = Expediente::find($request->id);
        $visitas    = ExpedienteVisita::orderBy('id', 'Desc');

        return view('admin.visita.index', compact('expediente', 'visitas'));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        $visita     = ExpedienteVisita::create($request->all());
        $visitas    = ExpedienteVisita::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();

        $view           = view('admin.visita.detalle', compact('visitas'))->render();

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
        ExpedienteVisita::findOrFail($request->id)->delete();

        $visitas     = ExpedienteVisita::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();

        $view               = view('admin.visita.detalle', compact('visitas'))->render();

        return response()->json($view);
    }
}