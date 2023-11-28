<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\TipoNotificacion;
use App\Models\TipoPostal;
use App\Models\TipoParentesco;
use App\Models\ExpedienteNotificacion;
use App\Models\Expediente;

use Yajra\DataTables\Facades\DataTables;

class NotificacionController extends Controller
{
    public function index(Request $request)
    {
        $expediente         = Expediente::find($request->id);
        $asociados          = $expediente->Proyecto->users()->orderBy('apellido')->get()->pluck('nombrecompleto', 'id');
        $notificaciones     = ExpedienteNotificacion::where('expediente', $request->id)->orderBy('id', 'desc')->get();
        $tiponotificacion   = TipoNotificacion::orderBy('notificacion')->pluck('notificacion', 'id');
        $tipoparentesco     = TipoParentesco::orderBy('id')->pluck('parentesco', 'id');
        $tipopostal         = TipoPostal::orderBy('postal')->pluck('postal', 'id');

        return view('admin.notificacion.index', compact(
            'expediente',
            'asociados',
            'notificaciones',
            'tiponotificacion',
            'tipoparentesco',
            'tipopostal'
        ));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        $notificacion   = ExpedienteNotificacion::create($request->all());
        $notificaciones = ExpedienteNotificacion::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();

        $view           = view('admin.notificacion.detalle', compact('notificaciones'))->render();

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
        ExpedienteNotificacion::findOrFail($request->id)->delete();

        $notificaciones     = ExpedienteNotificacion::where('expediente', $request->expediente)->orderBy('id', 'desc')->get();

        $view               = view('admin.notificacion.detalle', compact('notificaciones'))->render();

        return response()->json($view);
    }
}
