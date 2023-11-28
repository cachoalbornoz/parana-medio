<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User,
    App\Models\TipoRendicion,
    App\Models\ExpedienteRendicion,
    App\Models\Expediente;

use Yajra\DataTables\Facades\DataTables;

class RendicionController extends Controller
{

    public function index(Request $request)
    {
        $expediente     = Expediente::find($request->id);
        $rendiciones    = ExpedienteRendicion::where('expediente', $request->id)->orderBy('id', 'desc')->get();
        $tiporendicion  = TipoRendicion::orderBy('rendicion')->pluck('rendicion', 'id');

        return view('admin.rendicion.index', compact('expediente', 'rendiciones', 'tiporendicion'));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        $rendicion      = ExpedienteRendicion::create($request->all());
        $rendiciones    = ExpedienteRendicion::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();
        $expediente     = Expediente::find($request->expediente);

        $view           = view('admin.rendicion.detalle', compact('expediente', 'rendiciones'))->render();

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
        ExpedienteRendicion::findOrFail($request->id)->delete();

        $rendiciones    = ExpedienteRendicion::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();
        $expediente     = Expediente::find($request->expediente);

        $view   = view('admin.rendicion.detalle', compact('expediente', 'rendiciones'))->render();

        return response()->json($view);
    }
}