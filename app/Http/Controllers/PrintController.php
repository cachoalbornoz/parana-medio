<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User,
    App\Models\Empresa,
    App\Models\ResumenPresupuestario,
    App\Models\CostoFijo,
    App\Models\CostoVariable,
    App\Models\FuenteFinanciacion,
    App\Models\IngresoVenta,
    App\Models\Evaluacion,
    App\Models\Proyecto;

use DB, PDF;

class PrintController extends Controller
{



    public function printProyecto($id)
    {

        $proyecto           = Proyecto::find($id);
        $resumen            = ResumenPresupuestario::where('proyecto', '=', $id)->get();
        $costofijo          = CostoFijo::where('proyecto', '=', $id)->get();
        $costovariable      = CostoVariable::where('proyecto', '=', $id)->get();
        $fuentefinanciacion = FuenteFinanciacion::where('proyecto', '=', $id)->get();
        $ingresoventa       = IngresoVenta::where('proyecto', '=', $id)->get();

        $asociados  = $proyecto->users()->where('users.id', '!=', $proyecto->titular)->orderBy('apellido')->get();

        $pdf = PDF::loadView('admin.print.proyecto', compact('asociados', 'proyecto', 'resumen', 'costofijo', 'costovariable', 'fuentefinanciacion', 'ingresoventa'));

        return $pdf->stream('proyecto.pdf');
    }

    public function printEvaluacion($id)
    {

        $evaluacion = Evaluacion::find($id);

        $pdf        = PDF::loadView('admin.print.evaluacion', compact('evaluacion'));

        return $pdf->stream('evaluacion.pdf');
    }
}
