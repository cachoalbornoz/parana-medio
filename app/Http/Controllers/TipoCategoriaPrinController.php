<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoCategoriaPrin;

use Yajra\DataTables\Facades\DataTables;

class TipoCategoriaPrinController extends Controller{

    public function index(Request $request){

        if ($request->ajax()) {

            $categoria = TipoCategoriaPrin::all();

            return Datatables::of($categoria)
            ->addIndexColumn()
            ->addColumn('edit', function ($categoria){
                return '<span id='.$categoria->id.'" class="text-info edit"> <i class="fas fa-pencil-alt"></i> </span>';
            })
            ->addColumn('borrar', function ($categoria){
                return '<span id='.$categoria->id.'" class="text-danger borrar"> <i class="fas fa-trash"></i> </span>';
            })
            ->rawColumns(['edit', 'borrar'])
            ->make(true);

        }

        return view('admin.parametros.categoriasprin');
    }

    public function store(Request $request){

        $tipoCategoriaP = TipoCategoriaPrin::create($request->all());

        return 200;
    }

    public function edit($id){

        return TipoCategoriaPrin::findOrFail($id);
    }

    public function update(Request $request, $id){

        $tipoCategoriaP = TipoCategoriaPrin::findOrFail($id);
        $tipoCategoriaP->update($request->all());

        return $tipoCategoriaP;
    }

    public function destroy(Request $request, $id){

        $tipoCategoriaP = TipoCategoriaPrin::findOrFail($id);
        $tipoCategoriaP->delete();

        return 204;
    }




}
