<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaStoreRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Models\CiudadAll;
use App\Models\Empresa;
use App\Models\EmpresaInteres;
use App\Models\EmpresaOrigen;
use App\Models\Provincia;
use App\Models\TipoCategoria;
use App\Models\TipoEmisor;
use App\Models\TipoInteres;
use App\Models\TipoOrigen;
use App\Models\TipoPyme;
use App\Models\TipoResponsabilidad;
use App\Models\TipoSociedad;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmpresaController extends Controller
{
    // Listado de empresa pensado en ADMINISTRADORES
    public function indexAdmin(Request $request)
    {
        // if ($request->ajax()) {
        //     $empresa = Empresa::select('id', 'razon_social', 'titular', 'cuit', 'actividad1', 'categoria1', 'ciudad')->get();
        //     return Datatables::of($empresa)
        //         ->addIndexColumn()
        //         ->editColumn('id', function ($empresa) {
        //             return '<a href= "' . route('empresa.edit', $empresa->id) . '"><i class="fas fa-pencil-alt"></i></a>';
        //         })
        //         ->editColumn('razon_social', function ($empresa) {
        //             return (isset($empresa->razon_social)) ? $empresa->razon_social : null;
        //         })
        //         ->addColumn('titular', function ($empresa) {
        //             return (isset($empresa->titular)) ? $empresa->Titular->NombreCompleto : null;
        //         })
        //         ->addColumn('emisor', function ($empresa) {
        //             $origen = EmpresaOrigen::where('empresa', '=', $empresa->id)->first();
        //             return (isset($origen->emisor)) ? $origen->Emisor->emisor : null;
        //         })
        //         ->addColumn('seguimiento', function ($empresa) {
        //             return '<a href= "' . route('seguimiento.index', $empresa->id) . '"><span class="fa fa-eye"></span></a>';
        //         })
        //         ->addColumn('categoria1', function ($empresa) {
        //             return ($empresa->categoria1) ? $empresa->Categoria1->categoria : null;
        //         })
        //         ->editColumn('ciudad', function ($empresa) {
        //             return ($empresa->ciudad) ? $empresa->Ciudad->nombre : null;
        //         })
        //         ->addColumn('borrar', function ($empresa) {
        //             return '<a href="javascript:void(0)" title="Elimina empresa"><i class="fas fa-trash text-danger borrar" id="' . $empresa['id'] . '"></i></a>';
        //         })
        //         ->rawColumns(['id', 'razon_social', 'titular', 'emisor', 'seguimiento', 'categoria', 'borrar'])
        //         ->make(true);
        // }
        return view('admin.empresas.indexAdmin');
    }

    public function getEmpresas(Request $request)
    {
        $totalData     = $empresa = Empresa::select('id', 'razon_social', 'titular', 'cuit', 'actividad1', 'categoria1', 'ciudad')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $empresas = Empresa::select('id', 'razon_social', 'titular', 'cuit', 'actividad1', 'categoria1', 'ciudad')
                ->offset($start)
                ->limit($limit)
                ->orderBy('razon_social', 'asc')
                ->get();
        } else {
            $search = $request->input('search.value');

            $empresas = Empresa::
                select('empresa.id', 'empresa.razon_social', 'empresa.titular', 'empresa.cuit', 'empresa.actividad1', 'empresa.categoria1', 'empresa.ciudad')
                ->leftJoin('tipo_categoria', 'tipo_categoria.id', '=', 'empresa.categoria1')
                ->leftJoin('ciudad_all', 'ciudad_all.id', '=', 'empresa.ciudad')
                ->leftJoin('users', 'users.id', '=', 'empresa.titular')
                ->where('razon_social', 'LIKE', "%{$search}%")
                ->orWhere('cuit', 'LIKE', "%{$search}%")
                ->orWhere('tipo_categoria.categoria', 'LIKE', "%{$search}%")
                ->orWhere('ciudad_all.nombre', 'LIKE', "%{$search}%")
                ->orWhere('users.apellido', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('razon_social', 'asc')
                ->get();

            $totalFiltered = Empresa::
                leftJoin('tipo_categoria', 'tipo_categoria.id', '=', 'empresa.categoria1')
                ->leftJoin('ciudad_all', 'ciudad_all.id', '=', 'empresa.ciudad')
                ->leftJoin('users', 'users.id', '=', 'empresa.titular')
                ->where('razon_social', 'LIKE', "%{$search}%")
                ->orWhere('cuit', 'LIKE', "%{$search}%")
                ->orWhere('tipo_categoria.categoria', 'LIKE', "%{$search}%")
                ->orWhere('ciudad_all.nombre', 'LIKE', "%{$search}%")
                ->orWhere('users.apellido', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];
        if (!empty($empresas)) {
            foreach ($empresas as $empresa) {
                $seguimiento          = route('seguimiento.index', $empresa->id);
                $Data['id']           = "<a href= '" . route('empresa.edit', $empresa->id) . "'><i class='fas fa-pencil-alt'></i></a>";
                $Data['razon_social'] = $empresa->razon_social;
                $Data['cuit']         = $empresa->cuit;
                $Data['titular']      = (isset($empresa->titular)) ? $empresa->Titular->NombreCompleto : null;
                $origen               = EmpresaOrigen::where('empresa', '=', $empresa->id)->first();
                $Data['emisor']       = (isset($origen->emisor)) ? $origen->Emisor->emisor : null;
                $Data['seguimiento']  = "<a href='{$seguimiento}' title='Seguimiento' ><span class='fa fa-eye'></span></a>";
                $Data['categoria1']   = ($empresa->categoria1) ? $empresa->Categoria1->categoria : null;
                $Data['ciudad']       = ($empresa->ciudad) ? $empresa->Ciudad->nombre : null;
                $Data['borrar']       = "<a href='javascript:void(0)' title='Elimina empresa'><i class='fas fa-trash text-danger borrar' id='" . $empresa['id'] . "'></i></a>";

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

    // Listado de empresa pensado en USUARIOS
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                $empresa = Empresa::all();
            } else {
                $empresa = Empresa::where('titular', '=', Auth::user()->id);
            }

            if ($empresa) {
                return Datatables::of($empresa)
                    ->editColumn('razon_social', function ($empresa) {
                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            return '<a href= "' . route('empresa.edit', $empresa->id) . '">' . substr($empresa->razon_social, 0, 35) . '</a>';
                        }
                        return ($empresa->canEdit()) ? '<a href= "' . route('empresa.edit', $empresa->id) . '">' . $empresa->razon_social . '</a>' : $empresa->razon_social;
                    })
                    ->addColumn('titular', function ($empresa) {
                        return ($empresa->titular) ? '<a href= "' . route('asociado.edit', $empresa->titular) . '">' . $empresa->Titular->NombreCompleto . '</a>' : null;
                    })
                    ->addColumn('tipopyme', function ($empresa) {
                        return ($empresa->tipopyme) ? $empresa->Tipopyme->pyme : null;
                    })
                    ->addColumn('categoria1', function ($empresa) {
                        return ($empresa->categoria1) ? $empresa->Categoria1->categoria : null;
                    })
                    ->editColumn('ciudad', function ($empresa) {
                        return ($empresa->ciudad) ? $empresa->Ciudad->nombre : null;
                    })
                    ->addColumn('borrar', function ($empresa) {
                        return '<a href="javascript:void(0)" title="Elimina empresa"><i class="fas fa-trash text-danger borrar" id="' . $empresa['id'] . '"></i></a>';
                    })
                    ->rawColumns(['razon_social', 'titular', 'tipopyme', 'categoria', 'borrar'])
                    ->make(true);
            } else {
                return Datatables::of($empresa)
                    ->make(true);
            }
        }

        return view('admin.empresas.index');
    }

    public function create(Request $request)
    {
        $titular = ($request->asociado) ? $request->asociado : null;

        $usuario = (Auth::user()->hasRole(['user']))
        ? User::where('id', '=', Auth::user()->id)->get()->pluck('nombrecompleto', 'id')
        : User::orderBy('apellido')->get()->pluck('NombreCompleto', 'id');

        $sociedad        = TipoSociedad::where('id', '>', 8)->pluck('sociedad', 'id');
        $responsabilidad = TipoResponsabilidad::all()->sortBy('responsabilidad')->pluck('responsabilidad', 'id');

        $ciudad    = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');

        $tipopyme  = TipoPyme::all()->sortBy('id')->pluck('pyme', 'id');
        $categoria = TipoCategoria::all()->sortBy('id')->pluck('categoria', 'id');

        return view('admin.empresas.create', \compact('titular', 'usuario', 'sociedad', 'responsabilidad', 'ciudad', 'provincia', 'tipopyme', 'categoria'));
    }

    public function store(EmpresaStoreRequest $request)
    {
        $empresa = Empresa::create($request->all());

        EmpresaOrigen::create(['empresa' => $empresa->id]);

        if (Auth::user()->hasRole(['user'])) {
            return redirect()->route('empresa.index');
        }

        return redirect()->route('empresa.edit', $empresa->id);
    }

    public function edit($empresa)
    {
        $empresa = Empresa::find($empresa);

        $usuario = (Auth::user()->hasRole(['user']))
        ? User::where('id', '=', Auth::user()->id)->get()->pluck('nombrecompleto', 'id')
        : User::orderBy('apellido')->get()->pluck('NombreCompleto', 'id');

        $sociedad        = TipoSociedad::all()->sortBy('id')->pluck('sociedad', 'id');
        $responsabilidad = TipoResponsabilidad::all()->sortBy('responsabilidad')->pluck('responsabilidad', 'id');

        $ciudad      = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia   = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $idprovincia = isset($empresa->Ciudad) ? $empresa->Ciudad->Departamento->provincia : 7;

        $tipopyme  = TipoPyme::all()->sortBy('id')->pluck('pyme', 'id');
        $categoria = TipoCategoria::all()->sortBy('id')->pluck('categoria', 'id');
        $interes   = TipoInteres::all()->sortBy('id')->pluck('interes', 'id');
        $intereses = EmpresaInteres::where('empresa', '=', $empresa->id)->OrderBy('id', 'Desc')->get();

        return view('admin.empresas.edit', \compact('empresa', 'usuario', 'sociedad', 'responsabilidad', 'ciudad', 'provincia', 'idprovincia', 'tipopyme', 'categoria', 'interes', 'intereses'));
    }

    public function update(EmpresaUpdateRequest $request, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->fill($request->all());
        isset($request->activo) ? $empresa->activo = 1 : $empresa->activo = 0;
        $empresa->save();

        if (Auth::user()->hasRole(['user'])) {
            return redirect()->route('empresa.index');
        }
        return redirect()->route('empresa.indexAdmin');
    }

    public function addInteres(Request $request)
    {
        $empresa = EmpresaInteres::create([
            'empresa' => $request->empresa,
            'interes' => $request->interes,
        ]);

        $intereses = EmpresaInteres::where('empresa', '=', $request->empresa)->OrderBy('id', 'Desc')->get();

        $view = view('admin.empresas.detalleInteres', compact('intereses'))->render();

        return response()->json($view);
    }

    public function removeInteres(Request $request)
    {
        $empresa = EmpresaInteres::find($request->id);
        $empresa->delete();

        $intereses = EmpresaInteres::where('empresa', '=', $request->empresa)->OrderBy('id', 'Desc')->get();

        $view = view('admin.empresas.detalleInteres', compact('intereses'))->render();

        return response()->json($view);
    }

    public function origenEdit($empresa)
    {
        $empresa    = Empresa::find($empresa);
        $origen     = EmpresaOrigen::where('empresa', '=', $empresa->id)->first();
        $emisor     = TipoEmisor::all()->sortBy('id')->pluck('emisor', 'id');
        $tipoorigen = TipoOrigen::all()->sortBy('id')->pluck('origen', 'id');

        return view('admin.empresas.origenedit', compact('empresa', 'origen', 'emisor', 'tipoorigen'));
    }

    public function origenUpdate(Request $request, $origen)
    {
        $origenEmpresa = EmpresaOrigen::find($origen);

        $origenEmpresa->origen      = $request->origen;
        $origenEmpresa->emisor      = $request->emisor;
        $origenEmpresa->descripcion = $request->descripcion;
        $origenEmpresa->fecha       = $request->fecha;
        $origenEmpresa->save();

        return redirect()->route('empresa.edit', $request->empresa);
    }

    public function destroy(Request $request)
    {
        $empresa = Empresa::find($request->id);
        $empresa->delete();

        return response()->json();
    }
}
