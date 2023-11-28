<?php

namespace App\Http\Controllers;

use App\Models\ExpedienteCuota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        return view('admin.ingreso.futuros');
    }

     public function getIngresosFuturos(Request $request)
     {
         $fecha = Carbon::now()->toDateTimeString();

         $totalData = ExpedienteCuota::select(DB::raw('sum(expediente_cuota.monto) as `ingresos`'), DB::raw('YEAR(fechaVcto) anio, MONTH(fechaVcto) mes'))
            ->join('expediente', 'expediente.id', '=','expediente_cuota.expediente')
            ->where('fechaVcto', '>', $fecha)
            ->where('expediente_cuota.estado', '=', 0)
            ->whereIn('expediente.estado', ['1', '6'])
            ->groupby('anio', 'mes')
            ->get()
            ->count();

         $totalFiltered = $totalData;
         $limit         = $request->input('length');
         $start         = $request->input('start');

         if (empty($request->input('search.value'))) {
            $ingresos = ExpedienteCuota::select(DB::raw('sum(expediente_cuota.monto) as `ingresos`'), DB::raw('YEAR(fechaVcto) anio, MONTH(fechaVcto) mes'))
                ->join('expediente', 'expediente.id', '=','expediente_cuota.expediente')
                ->where('fechaVcto', '>', $fecha)
                ->where('expediente_cuota.estado', '=', 0)
                ->whereIn('expediente.estado', ['1', '6'])
                ->offset($start)
                ->limit($limit)
                ->groupby('anio', 'mes')
                ->get();
         }

         $data = [];
         if (!empty($ingresos)) {
             foreach ($ingresos as $ingreso) {
                 $Data['mes']      = $ingreso->mes;
                 $Data['anio']     = $ingreso->anio;
                 $Data['ingresos'] = $ingreso->ingresos;

                 $data[] = $Data;
             }
         }

         $json_data = [
             'draw'            => intval($request->input('draw')),
             'recordsTotal'    => intval($totalData),
             'recordsFiltered' => intval($totalFiltered),
             'data'            => $data,
         ];

         print json_encode($json_data);
     }
}
