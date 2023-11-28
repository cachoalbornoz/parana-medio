<?php

namespace App\Http\Controllers;

use App\Notifications\NuevaHabilitacion;

use Illuminate\Http\Request;
use App\Http\Requests\AsociadoStoreRequest;
use App\Http\Requests\AsociadoUpdateRequest;

use App\Http\Requests\AsociadoStoreAdminRequest;

use Illuminate\Support\Collection;

use App\User,
    App\Models\Proyecto,
    App\Models\UserPrograma,
    App\Models\TipoPrograma,
    App\Models\Empresa,
    App\Models\Pais,
    App\Models\CiudadAll,
    App\Models\Provincia,
    App\Models\Ciudad;

use Image;

use Yajra\DataTables\Facades\DataTables;

use Auth, Session;

class AsociadoController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $roles      = ['user'];

            $asociado   = User::whereHas('roles', static function ($query) use ($roles) {
                return $query->whereIn('name', $roles);
            })->get();

            if (isset($asociado)) {

                return Datatables::of($asociado)
                    ->addIndexColumn()

                    ->editColumn('id', function ($asociado) {

                        return '<a href= "' . route('asociado.edit', $asociado->id) . '"><i class="fas fa-pencil-alt"></i></a>';
                    })
                    ->editColumn('apellido', function ($asociado) {

                        return (isset($asociado->nombre_completo)) ? $asociado->nombre_completo : $asociado->apellido;
                    })
                    ->addColumn('programa', function ($asociado) {

                        $programa = UserPrograma::where('user', '=', $asociado->id)->orderBy('id', 'desc')->first();
                        return ($programa) ? $programa->Programa->programa : null;
                    })
                    ->addColumn('proyecto', function ($asociado) {

                        return $asociado->proyectos->first();
                    })
                    ->editColumn('ciudad', function ($asociado) {

                        return (isset($asociado->Ciudad->nombre)) ? $asociado->Ciudad->nombre : null;
                    })
                    ->addColumn('borrar', function ($asociado) {

                        return '<a href="javascript:void(0)" title="Elimina asociado"><i class="fas fa-trash text-danger borrar" id="' . $asociado['id'] . '"></i></a>';
                    })
                    ->editColumn('habilitado', function ($asociado) {

                        return ($asociado->habilitado == 1) ? 'Si' : null;
                    })
                    ->editColumn('created_at', function ($asociado) {
                        $date = date("Y-m-d H:m:s", strtotime($asociado->created_at));
                        return $date;
                    })

                    ->rawColumns(['id', 'apellido', 'programa', 'ciudad', 'borrar', 'habilitado', 'created_at'])
                    ->make(true);
            } else {

                return Datatables::of($asociado)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        return view('admin.asociados.index');
    }

    public function create()
    {

        $ciudad = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $pais = Pais::all()->sortBy('nombre')->pluck('nombre', 'id');
        return view('admin.asociados.create', \compact('ciudad', 'provincia', 'pais'));
    }

    public function store(AsociadoStoreRequest $request)
    {
        $asociado = User::create($request->all());
        $asociado->password = bcrypt($request->password);
        $asociado->save();

        $notification = array(
            'message' => 'Usuario creado !',
            'alert-type' => 'success'
        );

        return redirect()->route('empresa.create', $asociado->id)->with($notification);
    }


    public function edit($id)
    {
        $asociado = User::find($id);
        $ciudad = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $idprovincia = (isset($asociado->ciudad)) ? $asociado->Ciudad->Departamento->provincia : 7;
        $pais = Pais::all()->sortBy('nombre')->pluck('nombre', 'id');
        $programa = TipoPrograma::orderBy('programa')->pluck('programa', 'id');
        $selectpPrograma = UserPrograma::where('user', '=', $asociado->id)->orderBy('id', 'desc')->first();
        $idprograma = ($selectpPrograma) ? $selectpPrograma->programa : 1;

        return view('admin.asociados.edit', \compact('asociado', 'ciudad', 'provincia', 'idprovincia', 'pais', 'programa', 'idprograma'));
    }

    public function update(AsociadoUpdateRequest $request, $id)
    {

        $user = User::find($request->asociado);

        if (isset($request->habilitado)) {

            $user->habilitado = 1;

            //// NOTIFICAR AL USUARIO QUE SE HABILITO

            // $user->notify(new NuevaHabilitacion());

        } else {

            $user->habilitado = null;
        }

        $user->save();

        $selectpPrograma = UserPrograma::where('user', '=', $request->asociado)->orderBy('id', 'desc')->first();

        if ($selectpPrograma) {

            $selectpPrograma->programa = $request->tipo_programa;
            $selectpPrograma->save();
        } else {

            $userpPrograma =  UserPrograma::create([
                'user'      => $request->asociado,
                'programa'  => $request->tipo_programa
            ]);
        }

        $notification = array(
            'message' => 'Asociado actualizado !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy(Request $request)
    {

        $asociado = User::find($request->id);
        $asociado->delete();

        return response()->json();
    }
}