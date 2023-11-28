<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoOrigen;

use Yajra\DataTables\Facades\DataTables;

class TipoOrigenController extends Controller{

    public function index(Request $request){

        if ($request->ajax()) {

            $origen = TipoOrigen::all();

            return Datatables::of($origen)
            ->addIndexColumn()
            ->addColumn('edit', function ($origen){
                return '<a href="javascript:void(0)" id="'.$origen['id'].'" class="text-info editar"> <i class="fas fa-pencil-alt"></i> </a>';
            })
            ->addColumn('borrar', function ($origen){
                return '<a href="javascript:void(0)" id="'.$origen['id'].'" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>';
            })
            ->rawColumns(['edit', 'borrar'])
            ->make(true);

        }

        return view('admin.parametros.origen');
    }

    public function edit($id){

        $TipoOrigen = TipoOrigen::find($id);

        return $TipoOrigen;
    }

    public function accion(Request $request){

        if($request->accion == 'guardar'){

            $TipoOrigen = TipoOrigen::create($request->all());
            $codigo = 200;

        }else{

            if($request->accion == 'editar'){

                $TipoOrigen = TipoOrigen::find($request->id);
                $TipoOrigen->origen = $request->origen;
                $TipoOrigen->save();

                $codigo = 300;

            }else{

                if($request->accion == 'borrar'){

                    $TipoOrigen = TipoOrigen::find($request->id);
                    $TipoOrigen->delete();
                    $codigo = 204;
                }
            }
        }

        return $codigo;
    }






}
