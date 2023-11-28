<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Models\Provincia,
    App\Models\CiudadAll,
    App\Models\Departamento;

use DB;

class CiudadController extends Controller{

    public function buscarciudad($id) {

        $ciudad = DB::table('ciudad_all as t1')
        ->join('departamento as t2', 't1.departamento', '=', 't2.id')
        ->select('t1.*')
        ->orderBy('t1.nombre', 'ASC')
        ->where('provincia', '=', $id)->get();

        return response()->json(['ciudad'=>$ciudad]);
    }

    public function buscarciudadn($id)
    {

        $ciudad = DB::table('ciudad_all as t1')
            ->join('departamento as t2', 't1.departamento', '=', 't2.id')
            ->select('t1.*')
            ->orderBy('t1.nombre', 'ASC')
            ->where('t2.id', '=', $id)->get();

        return response()->json(['ciudad' => $ciudad]);
    }

    public function buscardepartamento($id)
    {

        $departamento = DB::table('departamento as t1')
            ->join('provincia as t2', 't1.provincia', '=', 't2.id')
            ->select('t1.*')
            ->orderBy('t1.nombre', 'ASC')
            ->where('provincia', '=', $id)->get();

        return response()->json(['departamento' => $departamento]);
    }


    public function create()
    {
        $ciudad         = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia      = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $departamento   = Departamento::all()->sortBy('nombre')->pluck('nombre', 'id');

        return view('admin.parametros.ciudad', compact('ciudad', 'departamento', 'provincia'));
    }

    public function insert(Request $request)
    {

        CiudadAll::create([
            'nombre'        => strtoupper($request->ciudad),
            'departamento'  => $request->departamenton
        ]);

        return response()->json();
    }

}

