<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\AuditoriaSistema;

use Yajra\DataTables\Facades\DataTables;

class AuditoriaController extends Controller{

    public function index(Request $request){

        if ($request->ajax()) {

            $auditoria = AuditoriaSistema::all();

            return Datatables::of($auditoria)
            ->addIndexColumn()
            ->addColumn('borrar', function ($auditoria){
                return '<a href="javascript:void(0)" id="'.$auditoria['id'].'" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>';
            })
            ->editColumn('codigo', function($auditoria){

                return ($auditoria->codigo)?$auditoria->Codigo->tipo:null;
            })
            ->editColumn('usuario', function($auditoria){

                return ($auditoria->usuario)?$auditoria->Usuario->nombrecompleto:null;
            })
            ->rawColumns(['codigo', 'user', 'borrar'])
            ->make(true);
        }

        return view('admin.auditoria.index');
    }

    public function accion(Request $request){

        if($request->accion == 'borrar'){

            $AuditoriaSistema = AuditoriaSistema::find($request->id);
            $AuditoriaSistema->delete();
            $codigo = 204;
        }

        return $codigo;
    }

}
