<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Proyecto,
    App\Models\CostoFijo,
    App\Models\CostoVariable,
    App\Models\FuenteFinanciacion,
    App\Models\IngresoVenta,
    App\Models\ResumenPresupuestario,
    App\Models\ProyectoPlanilla;

use Validator;

class PlanillaController extends Controller{

    public function estado(Request $request){

        $id             = $request->id;

        $planilla       = ProyectoPlanilla::where('proyecto','=', $id)->first();
        $planilla->rp   = (ResumenPresupuestario::where('proyecto','=', $id)->count() > 0)?1:null;
        $planilla->cf   = (CostoFijo::where('proyecto','=', $id)->count() > 0)?1:null;
        $planilla->cv   = (CostoVariable::where('proyecto','=', $id)->count() > 0)?1:null;
        $planilla->ff   = (FuenteFinanciacion::where('proyecto','=', $id)->count() > 0)?1:null;
        $planilla->iv   = (IngresoVenta::where('proyecto','=', $id)->count() > 0)?1:null;

        $planilla->estado = ($planilla->camposVacios() == 0)?19:20;

        $planilla->save();

        $view       = view('admin.proyectos.estadoplanilla', compact('planilla'))->render();
        return response()->json($view);

    }

    public function actualiza(Request $request){

        $id  = $request->id;

        $costofijo          = CostoFijo::where('proyecto','=', $id)->get();
        $costovariable      = CostoVariable::where('proyecto','=', $id)->get();
        $fuentefinanciacion = FuenteFinanciacion::where('proyecto','=', $id)->get();
        $ingresoventa       = IngresoVenta::where('proyecto','=', $id)->get();
        $view               = view('admin.proyectos.planillaresultado', compact('costofijo', 'costovariable', 'fuentefinanciacion', 'ingresoventa'))->render();
        return response()->json($view);

    }

    public function ivInsert(Request $request){

        $validator = Validator::make($request->all(), [
            'ivcantidad'=> 'numeric|min:1|max:999999999999',
            'ivcosto'   => 'numeric|min:1|max:999999999999',

        ]);

        if ($validator->passes()) {

            $ingresoventa = IngresoVenta::create($request->all());
            $ingresoventa = IngresoVenta::where('proyecto', '=', $request->proyecto)->get();
            $view         = view('admin.proyectos.ivdetalle', compact('ingresoventa'))->render();

            return response()->json([ 'success'  => true, 'view' => $view ]);
        }

        return response()->json(['message'=>$validator->errors()->all()]);
    }

    public function ivDestroy(Request $request){

        $ingresoventa = IngresoVenta::find($request->id);
        $ingresoventa->delete();
        $ingresoventa = IngresoVenta::where('proyecto', '=', $request->proyecto)->get();

        $view           = view('admin.proyectos.ivdetalle', compact('ingresoventa'))->render();
        return response()->json($view);
    }

    public function ffInsert(Request $request){

        $validator = Validator::make($request->all(), [
            'ffmonto' => 'numeric|min:1|max:999999999999',
        ]);

        if ($validator->passes()) {

            $fuentefinanciacion = FuenteFinanciacion::create($request->all());
            $fuentefinanciacion = FuenteFinanciacion::where('proyecto', '=', $request->proyecto)->get();
            $view               = view('admin.proyectos.ffdetalle', compact('fuentefinanciacion'))->render();

            return response()->json([ 'success'  => true, 'view' => $view ]);
        }

        return response()->json(['message'=>$validator->errors()->all()]);
    }

    public function ffDestroy(Request $request){

        $fuentefinanciacion = FuenteFinanciacion::find($request->id);
        $fuentefinanciacion->delete();
        $fuentefinanciacion = FuenteFinanciacion::where('proyecto', '=', $request->proyecto)->get();

        $view           = view('admin.proyectos.ffdetalle', compact('fuentefinanciacion'))->render();
        return response()->json($view);
    }

    public function cvInsert(Request $request){

        $validator = Validator::make($request->all(), [
            'cvcosto' => 'numeric|min:1|max:999999999999',
        ]);

        if ($validator->passes()) {

            $costovariable  = CostoVariable::create($request->all());
            $costovariable  = CostoVariable::where('proyecto', '=', $request->proyecto)->get();
            $view           = view('admin.proyectos.cvdetalle', compact('costovariable'))->render();

            return response()->json([ 'success'  => true, 'view' => $view ]);
        }

        return response()->json(['message'=>$validator->errors()->all()]);
    }

    public function cvDestroy(Request $request){

        $costovariable = CostoVariable::find($request->id);
        $costovariable->delete();
        $costovariable  = CostoVariable::where('proyecto', '=', $request->proyecto)->get();

        $view           = view('admin.proyectos.cvdetalle', compact('costovariable'))->render();
        return response()->json($view);
    }

    public function cfInsert(Request $request){

        $validator = Validator::make($request->all(), [
            'cfcosto' => 'numeric|min:1|max:999999999999',
        ]);

        if ($validator->passes()) {

            $costofijo  = CostoFijo::create($request->all());
            $costofijo  = CostoFijo::where('proyecto', '=', $request->proyecto)->get();
            $view       = view('admin.proyectos.cfdetalle', compact('costofijo'))->render();

            return response()->json([ 'success'  => true, 'view' => $view ]);
        }

        return response()->json(['message'=>$validator->errors()->all()]);

    }

    public function cfDestroy(Request $request){

        $costofijo = CostoFijo::find($request->id);
        $costofijo->delete();

        $costofijo  = CostoFijo::where('proyecto', '=', $request->proyecto)->get();
        $view       = view('admin.proyectos.cfdetalle', compact('costofijo'))->render();
        return response()->json($view);
    }

    public function resumenInsert(Request $request){

        $validator = Validator::make($request->all(), [
            'rpcantidad' => 'numeric|min:1|max:999999999999',
            'rpcosto' => 'numeric|min:1|max:999999999999',
        ]);

        if ($validator->passes()) {

            $resumen    = ResumenPresupuestario::create($request->all());
            $resumen    = ResumenPresupuestario::where('proyecto', '=', $request->proyecto)->get();
            $view       = view('admin.proyectos.rpdetalle', compact('resumen'))->render();

            return response()->json([ 'success'  => true, 'view' => $view ]);
        }

        return response()->json(['message'=>$validator->errors()->all()]);


    }

    public function resumenDestroy(Request $request){

        $resumen = ResumenPresupuestario::find($request->id);
        $resumen->delete();

        $resumen    = ResumenPresupuestario::where('proyecto', '=', $request->proyecto)->get();
        $view       = view('admin.proyectos.rpdetalle', compact('resumen'))->render();
        return response()->json($view);
    }

}
