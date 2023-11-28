<?php

namespace App\Http\Controllers;

use App\Models\TipoFinanciamiento;
use Illuminate\Http\Request;

use Session;

use App\User,
    App\Models\Empresa,
    App\Models\TipoOrigen,
    App\Models\TipoEstado,
    App\Models\TipoEstadoSeguimiento,
    App\Models\EmpresaSeguimiento;

use Image;

use Yajra\DataTables\Facades\DataTables;

use Auth;


class SeguimientoController extends Controller
{

    public function seguimiento(Request $request)
    {

        if ($request->ajax()) {

            $empresa = $request->id;

            $seguimiento    = EmpresaSeguimiento::where('empresa', '=', $empresa)
                ->orderBy('fecha_registro', 'DESC')
                ->orderBy('id', 'DESC')
                ->get();

            if ($seguimiento) {

                return Datatables::of($seguimiento)
                    ->editColumn('respuesta', function ($seguimiento) {

                        return '<a href="' . route('seguimiento.edit', $seguimiento->id) . '">' . $seguimiento->respuesta . '</a>';
                    })
                    ->editColumn('tipo', function ($seguimiento) {

                        return $seguimiento->Tipo->origen;
                    })
                    ->editColumn('financiamiento', function ($seguimiento) {

                        return (isset($seguimiento->financiamiento)) ? $seguimiento->Financiamiento->financiamiento : null;
                    })
                    ->editColumn('estadoTipo', function ($seguimiento) {

                        return ($seguimiento->estadoTipo) ? $seguimiento->Estadotipo->estado : null;
                    })
                    ->editColumn('envia', function ($seguimiento) {

                        return ($seguimiento->envia == 0) ? '<button class="btn btn-sm bg-secondary text-white-50">Recepción</button>' : '<button class="btn btn-sm bg-primary text-white">Envío</button>';
                    })
                    ->editColumn('usuario', function ($seguimiento) {

                        return (isset($seguimiento->usuario)) ? $seguimiento->Usuario->nombrecompleto : null;
                    })
                    ->addColumn('borrar', function ($seguimiento) {

                        return '<a href="javascript:void(0)" title="Elimina seguimiento"><i class="fas fa-trash text-danger borrar" id="' . $seguimiento->id . '"></i></a>';
                    })

                    ->rawColumns(['respuesta', 'tipo', 'envia', 'estadoTipo', 'usuario', 'borrar'])
                    ->make(true);
            } else {

                return Datatables::of($seguimiento)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        $empresa = Empresa::find($request->id);

        return view('admin.seguimiento.index', compact('empresa'));
    }

    public function create($id)
    {

        $empresa            = Empresa::find($id);
        $tipoorigen         = TipoOrigen::all()->sortBy('id')->pluck('origen', 'id');
        $tipoestado         = TipoEstado::whereBetween('id', [30, 40])->get()->pluck('estado', 'id');
        $tipofinanciamiento = TipoFinanciamiento::all()->sortBy('financiamiento')->pluck('financiamiento', 'id');

        return view('admin.seguimiento.create', \compact('empresa', 'tipoorigen', 'tipoestado', 'tipofinanciamiento'));
    }

    public function store(Request $request)
    {

        EmpresaSeguimiento::create($request->all());

        Session::flash('message', 'Seguimiento cargado');
        Session::flash('alert-class', 'alert-success');
        Session::flash('alert-type', 'success');

        return redirect()->route('seguimiento.index', $request->empresa);
    }

    public function edit($id)
    {

        $seguimiento        = EmpresaSeguimiento::find($id);
        $empresa            = Empresa::find($seguimiento->empresa);
        $tipoorigen         = TipoOrigen::all()->sortBy('id')->pluck('origen', 'id');
        $tipoestado         = TipoEstado::whereBetween('id', [30, 40])->get()->pluck('estado', 'id');
        $tipofinanciamiento = TipoFinanciamiento::all()->sortBy('financiamiento')->pluck('financiamiento', 'id');

        return view('admin.seguimiento.edit', \compact('empresa', 'seguimiento', 'tipoorigen', 'tipoestado', 'tipofinanciamiento'));
    }

    public function update(Request $request, $id)
    {

        $seguimiento = EmpresaSeguimiento::find($id);

        $seguimiento->update($request->all());

        Session::flash('message', 'Seguimiento actualizado');
        Session::flash('alert-class', 'alert-success');
        Session::flash('alert-type', 'success');

        return redirect()->route('seguimiento.index', $seguimiento->empresa);
    }

    public function destroy(Request $request)
    {

        $seguimiento = EmpresaSeguimiento::find($request->id);
        $seguimiento->delete();

        return response()->json();
    }
}