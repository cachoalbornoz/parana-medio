<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoEmisor;

use Yajra\DataTables\Facades\DataTables;

class TipoEmisorController extends Controller{

    public function index(Request $request){

        if ($request->ajax()) {

            $emisor = TipoEmisor::orderBy('emisor');

            return Datatables::of($emisor)
            ->addIndexColumn()
            ->addColumn('edit', function ($emisor){
                return '<a href="javascript:void(0)" id="'.$emisor['id'].'" class="text-info editar"> <i class="fas fa-pencil-alt"></i> </a>';
            })
            ->addColumn('borrar', function ($emisor){
                return '<a href="javascript:void(0)" id="'.$emisor['id'].'" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>';
            })
            ->rawColumns(['edit', 'borrar'])
            ->make(true);

        }

        return view('admin.parametros.emisor');
    }

    public function edit($id){

        $TipoEmisor = TipoEmisor::find($id);

        return $TipoEmisor;
    }

    public function accion(Request $request){

        if($request->accion == 'guardar'){

            $TipoEmisor = TipoEmisor::create($request->all());
            $codigo = 200;

        }else{

            if($request->accion == 'editar'){

                $TipoEmisor = TipoEmisor::find($request->id);
                $TipoEmisor->emisor = $request->emisor;
                $TipoEmisor->save();

                $codigo = 300;

            }else{

                if($request->accion == 'borrar'){

                    $TipoEmisor = TipoEmisor::find($request->id);
                    $TipoEmisor->delete();
                    $codigo = 204;
                }
            }
        }

        return $codigo;
    }






}
