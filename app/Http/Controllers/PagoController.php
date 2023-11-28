<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\ExpedienteCuota;
use App\Models\ExpedienteEstado;
use App\Models\ExpedientePago;
use App\Models\TipoPago;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PagoController extends Controller
{
    public function resumenCta()
    {
        return view('admin.pago.resumenCta');
    }

    public function getPagos(Request $request)
    {
        $totalData     = ExpedientePago::select('id', 'fecha', 'expediente', 'monto', 'cuenta', 'tipopago', 'nro_operacion')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $pagos = ExpedientePago::select('id', 'fecha', 'expediente', 'monto', 'cuenta', 'tipopago', 'nro_operacion')
                ->offset($start)
                ->limit($limit)
                ->orderBy('fecha', 'desc')
                ->get();
        } else {
            $search = $request->input('search.value');

            $pagos = ExpedientePago::join('expediente', 'expediente.id', '=', 'expediente_pago.expediente')
                ->join('users', 'users.id', '=', 'expediente.titular')
                ->where("users.apellido", "LIKE", "%{$search}%")
                ->orWhere("users.nombre", "LIKE", "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('fecha', 'asc')
                ->get();

            $totalFiltered = ExpedientePago::join('expediente', 'expediente.id', '=', 'expediente_pago.expediente')
                ->join('users', 'users.id', '=', 'expediente.titular')
                ->where("users.apellido", "LIKE", "%{$search}%")
                ->orWhere("users.nombre", "LIKE", "%{$search}%")
                ->count();
        }

        $data = [];
        if (!empty($pagos)) {
            foreach ($pagos as $pago) {
                // Datos de los pagos
                $anio = date('Y', strtotime($pago->Expediente->fecha_otorgamiento));
                $expediente = $pago->Expediente->proyecto.'/'.$anio;

                $titular    = $pago->Expediente->Titular->apellido .', '.$pago->Expediente->Titular->nombre;

                $tipopago   = $pago->Tipopago->pago;

                $Data['id']             = $pago->id;
                $Data['fecha']          = $pago->fecha;
                $Data['expediente']     = $expediente;
                $Data['titular']        = $titular;
                $Data['monto']          = $pago->monto;
                $Data['cuenta']         = $pago->cuenta;
                $Data['tipopago']       = $tipopago;
                $Data['nro_operacion']  = $pago->nro_operacion;
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

    public function index(Request $request)
    {
        $expediente = Expediente::find($request->id);
        $pagos      = ExpedientePago::where('expediente', $request->id)->orderBy('fecha', 'desc')->orderBy('id', 'desc')->get();
        $tipopago   = TipoPago::orderByDesc('pago')->pluck('pago', 'id');

        return view('admin.pago.index', compact('expediente', 'pagos', 'tipopago'));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Schema::disableForeignKeyConstraints();
            // Cargar el pago
            $expedientePago = ExpedientePago::create($request->all());
            // Obtengo todos los pagos realizados
            $pagos = ExpedientePago::where('expediente', $request->expediente)->orderBy('fecha', 'desc')->get();
            // Calcula el total pagado
            $total_cobrado = $pagos->sum('monto');
            // Recorre las cuotas del plan de pago y asigna sin están pagadas completamente o ' pago parcial '
            $cuotas = ExpedienteCuota::where('expediente', $request->expediente)->orderBy('nroCuota', 'asc')->get();

            foreach ($cuotas as $cuota) {
                if ($total_cobrado >= $cuota->monto) {
                    $cuota->pago           = $cuota->nroCuota;
                    $cuota->estado         = 1;
                    $cuota->entregaParcial = 0;
                    $cuota->save();
                } else {
                    if ($total_cobrado >= 0) {
                        $cuota->estado         = 0;
                        $cuota->entregaParcial = $total_cobrado;
                        $cuota->save();
                    }
                    break;
                }
                $total_cobrado = $total_cobrado - $cuota->monto;
            }

            // // Reviso el pago total e informo
            $expediente = Expediente::find($request->expediente);
            if (($expediente->monto_devolver - $pagos->sum('monto') > 0)) {
                $expediente->saldo = $expediente->monto_devolver - $pagos->sum('monto');
                $expediente->save();
            } else {
                $expediente->estado = 3;
                $expediente->saldo  = 0;
                $expediente->save();
                // Obtengo el estado que tenia
                $estado    = ExpedienteEstado::where('expediente', $request->expediente)->orderBy('fecha', 'desc')->first();
                $estadoAnt = ($estado->estadoAnt) ? $estado->estadoAnt : 1;
                ExpedienteEstado::create([
                    'expediente' => $request->expediente,
                    'estado'     => 3,
                    'estadoAnt'  => $estadoAnt,
                    'fecha'      => $request->fecha,
                ]);
            }
            DB::commit();
            Schema::enableForeignKeyConstraints();

            $view = view('admin.pago.detalle', compact('expediente', 'pagos'))->render();
            return response()->json($view);
        } catch (\Exception $e) {
            DB::rollback();
            Schema::enableForeignKeyConstraints();
            return new JsonResponse(['msj' => $e->getMessage(), 'type' => 'error']);
        }
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request)
    {
        ExpedientePago::findOrFail($request->id)->delete();


        ///////////////////////////////////////
        $pagos = ExpedientePago::where('expediente', $request->expediente)->orderBy('fecha', 'desc')->get();
        $total_cobrado = $pagos->sum('monto');
        $cuotas = ExpedienteCuota::where('expediente', $request->expediente)->orderBy('nroCuota', 'asc')->get();

        foreach ($cuotas as $cuota) {
            if ($total_cobrado >= $cuota->monto) {
                $cuota->pago           = $cuota->nroCuota;
                $cuota->estado         = 1;
                $cuota->entregaParcial = 0;
                $cuota->save();
            } else {
                $cuota->estado         = 0;
                $cuota->entregaParcial = ($total_cobrado >= 0)?$total_cobrado:0;
                $cuota->save();
            }
            $total_cobrado = $total_cobrado - $cuota->monto;
        }
        ///////////////////////////////////////

        $expediente = Expediente::find($request->expediente);
        $expediente->saldo = $expediente->monto_devolver - $total_cobrado;
        $expediente->save();
        
        $view = view('admin.pago.detalle', compact('expediente', 'pagos'))->render();

        return response()->json($view);
    }
}
