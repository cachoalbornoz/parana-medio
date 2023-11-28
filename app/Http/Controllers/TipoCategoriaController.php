<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoCategoria;

use Yajra\DataTables\Facades\DataTables;

class TipoCategoriaController extends Controller{

    public function index(Request $request){

        if ($request->ajax()) {

            $categoria = TipoCategoria::all();

            return Datatables::of($categoria)
            ->addIndexColumn()
            ->addColumn('edit', function ($categoria){
                return '<a href="javascript:void(0)" id="'.$categoria['id'].'" class="text-info editar"> <i class="fas fa-pencil-alt"></i> </a>';
            })
            ->addColumn('borrar', function ($categoria){
                return '<a href="javascript:void(0)" id="'.$categoria['id'].'" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>';
            })
            ->rawColumns(['edit', 'borrar'])
            ->make(true);

        }

        return view('admin.parametros.categoria');
    }

    public function edit($id){

        $tipoCategoria = TipoCategoria::find($id);

        return $tipoCategoria;
    }

    public function accion(Request $request){

        if($request->accion == 'guardar'){

            $tipoCategoria = TipoCategoria::create($request->all());
            $codigo = 200;

        }else{

            if($request->accion == 'editar'){

                $tipoCategoria = TipoCategoria::find($request->id);
                $tipoCategoria->categoria = $request->categoria;
                $tipoCategoria->save();

                $codigo = 300;

            }else{

                if($request->accion == 'borrar'){

                    $tipoCategoria = TipoCategoria::find($request->id);
                    $tipoCategoria->delete();
                    $codigo = 204;
                }
            }
        }

        return $codigo;
    }






}
