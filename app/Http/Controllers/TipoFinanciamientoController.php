<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoFinanciamiento;

use Yajra\DataTables\Facades\DataTables;

class TipoFinanciamientoController extends Controller{

    public function index(Request $request){

        if ($request->ajax()) {

            $financiamiento = TipoFinanciamiento::all();

            return Datatables::of($financiamiento)
            ->addIndexColumn()
            ->addColumn('edit', function ($financiamiento){
                return '<a href="javascript:void(0)" id="'.$financiamiento['id'].'" class="text-info editar"> <i class="fas fa-pencil-alt"></i> </a>';
            })
            ->addColumn('borrar', function ($financiamiento){
                return '<a href="javascript:void(0)" id="'.$financiamiento['id'].'" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>';
            })
            ->rawColumns(['edit', 'borrar'])
            ->make(true);

        }

        return view('admin.parametros.financiamiento');
    }

    public function edit($id){

        $TipoFinanciamiento = TipoFinanciamiento::find($id);

        return $TipoFinanciamiento;
    }

    public function accion(Request $request){

        if($request->accion == 'guardar'){

            $TipoFinanciamiento = TipoFinanciamiento::create($request->all());
            $codigo = 200;

        }else{

            if($request->accion == 'editar'){

                $TipoFinanciamiento = TipoFinanciamiento::find($request->id);
                $TipoFinanciamiento->financiamiento = $request->financiamiento;
                $TipoFinanciamiento->save();

                $codigo = 300;

            }else{

                if($request->accion == 'borrar'){

                    $TipoFinanciamiento = TipoFinanciamiento::find($request->id);
                    $TipoFinanciamiento->delete();
                    $codigo = 204;
                }
            }
        }

        return $codigo;
    }






}