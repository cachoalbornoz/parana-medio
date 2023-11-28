<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaEmpleoUpdateRequest;

use App\Models\CiudadAll;
use App\Models\DocumentacionEmpleo;
use App\Models\EmpresaEmpleo;
use App\Models\Provincia;
use App\Models\TipoCategoria;
use App\Models\TipoPyme;
use App\Models\TipoResponsabilidad;
use App\Models\TipoSociedad;
use App\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mail;
use Yajra\DataTables\Facades\DataTables;

class EmpresaEmpleoController extends Controller
{

    // Listado de empresa pensado en ADMINISTRADORES
    public function indexAdmin(Request $request)
    {
        //return $documento = DocumentacionEmpleo::whereNotNull('empleado')->get();

        if ($request->ajax()) {
            $documento = DocumentacionEmpleo::whereNotNull('empleado')->orderByDesc('updated_at')->get();

            if ($documento) {
                return Datatables::of($documento)
                    ->addIndexColumn()
                    ->editColumn('id', function ($documento) {
                        return '<a href= "' . route('documentacione.edit', $documento->id) . '"><i class="fas fa-eye"></i></a>';
                    })
                    ->editColumn('empleado', function ($documento) {
                        return (isset($documento->empleado)) ? $documento->empleado : null;
                    })
                    ->editColumn('empresa', function ($documento) {
                        return (isset($documento->empresa)) ? $documento->Empresa->razon_social : null;
                    })
                    ->addColumn('estado', function ($documento) {
                        return ($documento->estado) ? $documento->Estado->estado: null;
                    })
                    ->addColumn('icono', function ($documento) {
                        return ($documento->estado) ? $documento->Estado->icono: null;
                    })
                    ->addColumn('habilitar', function ($documento) {
                        return '<a href="javascript:void(0)" title="Permite empresa modificar sus datos"><i class="fas fa-exclamation text-warning habilitar" id="' . $documento['id'] . '"></i></a>';
                    })
                    ->rawColumns(['id', 'empleado', 'empresa', 'estado', 'icono', 'habilitar'])
                    ->make(true);
            } else {
                return Datatables::of($documento)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        return view('admin.empresasEmpleo.indexAdmin');
    }

    public function vincular(Request $request)
    {
        $usuario    = Auth::user();
        $empresa    = EmpresaEmpleo::where('titular', $usuario->id)->first();
        $documentos = DocumentacionEmpleo::where('Empresa', $empresa->id)->get();

        return view('admin.empresasEmpleo.vincularEmpresa', \compact('usuario', 'empresa', 'documentos'));
    }

    public function createAsociar(Request $request)
    {
        $empresa = EmpresaEmpleo::where('titular', Auth::user()->id)->first();

        if (!$empresa) {
            $empresa = EmpresaEmpleo::create([
                'razon_social' => 'Nueva empresa ',
                'titular'      => $request->usuario,
            ]);
        }
        DocumentacionEmpleo::create(['empresa' => $empresa->id]);
        return redirect()->route('empresa.vincular');
    }

    public function edit($empresa)
    {
        $empresa = EmpresaEmpleo::find($empresa);

        $usuario = (Auth::user()->hasRole(['user']))
        ? User::where('id', '=', Auth::user()->id)->get()->pluck('nombrecompleto', 'id')
        : User::orderBy('apellido')->get()->pluck('NombreCompleto', 'id');

        $sociedad        = TipoSociedad::all()->sortBy('sociedad')->pluck('sociedad', 'id');
        $responsabilidad = TipoResponsabilidad::all()->sortBy('responsabilidad')->pluck('responsabilidad', 'id');

        $ciudad      = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia   = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $idprovincia = isset($empresa->Ciudad) ? $empresa->Ciudad->Departamento->provincia : 7;

        $tipopyme  = TipoPyme::all()->sortBy('id')->pluck('pyme', 'id');
        $categoria = TipoCategoria::where('id', '=', 7)->get()->pluck('categoria', 'id');

        return view('admin.empresasEmpleo.edit', \compact('empresa', 'usuario', 'sociedad', 'responsabilidad', 'ciudad', 'provincia', 'idprovincia', 'tipopyme', 'categoria'));
    }

    public function update(EmpresaEmpleoUpdateRequest $request, $id)
    {
        $empresa = EmpresaEmpleo::find($id);
        $empresa->fill($request->all());
        isset($request->activo) ? $empresa->activo = 1 : $empresa->activo = 0;
        $empresa->save();

        if (Auth::user()->hasRole(['user'])) {
            return redirect()->route('empresa.vincular');
        }
        return redirect()->route('empresaEmpleo.indexAdmin');
    }

    public function habilitar(Request $request)
    {
        $empresa         = EmpresaEmpleo::find($request->id);
        $empresa->estado = 20;
        $empresa->save();

        $documentacion         = DocumentacionEmpleo::where('empresa', '=', $request->id)->first();
        $documentacion->estado = 20;
        $documentacion->save();

        return response()->json();
    }

    public function enviar(Request $request)
    {
        $documentacion         = DocumentacionEmpleo::find($request->id);
        $documentacion->estado = 24;
        $documentacion->save();

        $empresa = EmpresaEmpleo::find($documentacion->empresa);

        /////////////////////////////////////////////////////////////////////////////////////
        $titular      = User::find($empresa->titular);
        $destinatario = $titular->nombre . ' ' . $titular->apellido;
        $email        = $titular->email;
        $denominacion = $empresa->razon_social;
        $data         = ['destinatario' => $destinatario, 'denominacion' => $denominacion];
        $mensaje      = 'Su documentacion se ha enviado correctamente !';

        Mail::send('email.envioproyecto', $data, function ($message) use ($destinatario, $email) {
            $message->to($email, $destinatario)->subject('Envío de documentacion');
        });
        /////////////////////////////////////////////////////////////////////////////////////

        $usuario    = Auth::user();
        $empresa    = EmpresaEmpleo::where('titular', $usuario->id)->first();
        $documentos = DocumentacionEmpleo::where('Empresa', $empresa->id)->get();

        $view = view('admin.empresasEmpleo.detalleDocumentacion', compact('documentos'))->render();

        return new JsonResponse([
            'view'    => $view,
            'message' => '<b>Datos enviados</b>',
            'type'    => 'error',
        ]);
    }

    public function desvinculaEmpresa(Request $request)
    {
        // Eliminar
        DocumentacionEmpleo::where('empresa', '=', $request->id)->delete();
        EmpresaEmpleo::find($request->id)->delete();

        // Obtener empresas
        $usuario  = User::find($request->usuario);
        $empresas = EmpresaEmpleo::where('titular', $usuario->id)->get();

        $view = view('admin.empresasEmpleo.detalleEmpresa', compact('empresas'))->render();

        return response()->json($view);
    }

    public function destroy(Request $request)
    {
        $empresa = EmpresaEmpleo::find($request->id);
        $empresa->delete();

        return response()->json();
    }
}
