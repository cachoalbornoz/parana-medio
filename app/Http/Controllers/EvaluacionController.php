<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User,
    App\Models\TipoEstado,
    App\Models\Evaluacion;

use Auth;



use Yajra\DataTables\Facades\DataTables;


class EvaluacionController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                // Traer los proyectos con estado ENVIADO = 24
                $evaluacion = Evaluacion::all();
            } else {
                $evaluacion = Evaluacion::whereHas('proyecto', function ($query) {
                    $query->where('titular', '=', Auth::user()->id);
                })->get();
            }

            if ($evaluacion) {
                return Datatables::of($evaluacion)
                    ->addIndexColumn()
                    ->addColumn('denominacion', function ($evaluacion) {
                        $denominacion = $evaluacion->Proyecto->denominacion;
                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            $edit   = route('evaluacion.edit', $evaluacion->id);
                            $edit   = '<a href= "' . $edit . '">' . $denominacion . '</a>';
                        } else {
                            $edit  = $denominacion;
                        }
                        return $edit;
                    })
                    ->addColumn('titular', function ($evaluacion) {
                        return ($evaluacion->Proyecto->Titular)?$evaluacion->Proyecto->Titular->nombre_completo:null;
                    })
                    ->addColumn('razonsocial', function ($evaluacion) {
                        return ($evaluacion->Proyecto->Empresa)?$evaluacion->Proyecto->Empresa->razon_social:null;
                    })
                    ->editColumn('estado', function ($evaluacion) {

                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            return ($evaluacion->estado) ? $evaluacion->Estado->icono . ' ' . $evaluacion->Estado->estado : null;
                        } else {
                            return ($evaluacion->estado == 26) ? $evaluacion->Estado->icono . ' ' . $evaluacion->Estado->estado : null;
                        }
                    })
                    ->editColumn('resultado', function ($evaluacion) {
                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            return $evaluacion->resultado;
                        } else {
                            return ($evaluacion->estado == 26) ? $evaluacion->resultado : null;
                        }
                    })
                    ->editColumn('evaluador', function ($evaluacion) {
                        return ($evaluacion->evaluador) ? $evaluacion->Evaluador->nombre_completo : null;
                    })
                    ->addColumn('print', function ($evaluacion) {

                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            return  '<a href="' . route('print.evaluacion', $evaluacion->id) . '" title="Imprime evaluación del proyecto"><i class="fas fa-print text-primary"></i></a>';
                        } else {
                            return ($evaluacion->estado == 26) ? '<a href="' . route('print.evaluacion', $evaluacion->id) . '" title="Imprime evaluación del proyecto"><i class="fas fa-print text-primary"></i></a>' : null;
                        }
                    })
                    ->rawColumns(['titular', 'denominacion', 'razonsocial', 'estado', 'evaluador', 'print'])
                    ->make(true);
            } else {

                return Datatables::of($evaluacion)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        return view('admin.evaluacion.index');
    }

    public function edit($evaluacion)
    {

        $evaluacion = Evaluacion::find($evaluacion);

        $evaluador  = User::selectRaw("CONCAT (apellido, ' ', nombre) as nombres, id")->whereHas('roles', function ($query) {
            $query->where('name', '=', 'admin');
        })->pluck('nombres', 'id');

        $estado = TipoEstado::all()->where('id', '>', 18)->sortBy('estado')->pluck('estado', 'id');

        return view('admin.evaluacion.edit', \compact('evaluacion', 'evaluador', 'estado'));
    }

    public function update(Request $request, $id)
    {

        $evaluacion = Evaluacion::find($id);
        $evaluacion->fill($request->all());

        $evaluacion->resultado =
            $request->puntaje1 + $request->puntaje2 + $request->puntaje3 + $request->puntaje4 +
            $request->puntaje5 + $request->puntaje6 + $request->puntaje7 + $request->puntaje8;

        $evaluacion->save();

        /////// CARGANDO

        if ($request->estado == 20) {

            $proyecto       = $evaluacion->Proyecto;
            $proyecto->cargando();

            $documentacion  = $proyecto->documentacion;
            $documentacion->cargando();

            $planilla       = $proyecto->planilla;
            $planilla->cargando();

            $empresa        = $proyecto->Empresa;
            $empresa->cargando();
        }

        return redirect()->back();
    }
}