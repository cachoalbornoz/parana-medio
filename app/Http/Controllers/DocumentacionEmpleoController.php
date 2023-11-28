<?php

namespace App\Http\Controllers;

use App\Models\DocumentacionEmpleo;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class DocumentacionEmpleoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                $documentacion = DocumentacionEmpleo::all();
            } else {
                $empresas      = Auth::user()->empresas()->get();
                $documentacion = new Collection();

                foreach ($empresas as $empresa) {
                    $documento = DocumentacionEmpleo::where('empresa', '=', $empresa->id)->first();
                    $documentacion->push($documento);
                }
            }

            if ($documentacion) {
                return Datatables::of($documentacion)
                    ->addIndexColumn()
                    ->addColumn('titular', function ($documentacion) {
                        return $documentacion->Proyecto->Titular->apellido . ' ' . $documentacion->Proyecto->Titular->nombre;
                    })
                    ->addColumn('denominacion', function ($documentacion) {
                        $denominacion = $documentacion->Proyecto->denominacion;
                        return ($documentacion->canEdit()) ? '<a href= "' . route('documentacion.edit', $documentacion->id) . '">' . $denominacion . '</a>' : $denominacion;
                    })

                    ->addColumn('revision', function ($documentacion) {
                        return '<a href= "' . route('documentacion.revisar', $documentacion->id) . '">Observaciones</a>';
                    })

                    ->addColumn('tiposociedad', function ($documentacion) {
                        return ($documentacion->Proyecto->Empresa->tiposociedad) ? $documentacion->Proyecto->Empresa->Tiposociedad->sociedad : null;
                    })
                    ->editColumn('estado', function ($documentacion) {
                        return ($documentacion->estado) ? $documentacion->Estado->icono . ' ' . $documentacion->Estado->estado : null;
                    })

                    ->rawColumns(['titular', 'denominacion', 'estado', 'tiposociedad', 'revision'])
                    ->make(true);
            } else {
                return Datatables::of($documentacion)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        return view('admin.documentacion.index');
    }

    public function revisar($documentacion)
    {
        $documentacion = DocumentacionEmpleo::find($documentacion);
        return view('admin.documentacion.revisar', \compact('documentacion'));
    }

    public function habilitar(Request $request)
    {
        $documento         = DocumentacionEmpleo::find($request->id);
        $documento->estado = 20;
        $documento->save();
        return response()->json();
    }

    public function update(Request $request, $id)
    {
        $documentacion = DocumentacionEmpleo::find($id);

        $documentacion->fill($request->all());
        $documentacion->save();

        $notification = [
            'message'    => 'Documentación actualizada !',
            'alert-type' => 'success',
        ];

        return redirect()->route('documentacion.index')->with($notification);
    }

    public function edit($id)
    {
        $documentacion = DocumentacionEmpleo::find($id);
        return view('admin.documentacionEmpleo.edit', \compact('documentacion'));
    }

    public function estado(Request $request)
    {
        $documentacion         = DocumentacionEmpleo::find($request->id);
        $documentacion->estado = ($documentacion->personaCompleta() == 1) ? 19 : 20;
        $documentacion->save();

        $view = view('admin.documentacion.estado', compact('documentacion'))->render();
        return response()->json($view);
    }

    public function mipyme(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'mipyme'        => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('mipyme');
            $extension = $file->getClientOriginalExtension();
            $mipyme    = $documentacion->id . 'mipyme.' . $extension;

            $request->file('mipyme')->move(public_path('images/upload/documentacionEmpresas'), $mipyme);

            $documentacion->mipyme = $mipyme;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->mipyme,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function repsal(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'repsal'        => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('repsal');
            $extension = $file->getClientOriginalExtension();
            $repsal    = $documentacion->id . 'repsal.' . $extension;

            $request->file('repsal')->move(public_path('images/upload/documentacionEmpresas'), $repsal);

            $documentacion->repsal = $repsal;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->repsal,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function cbu(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'cbu'           => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('cbu');
            $extension = $file->getClientOriginalExtension();
            $cbu       = $documentacion->id . 'cbu.' . $extension;

            $request->file('cbu')->move(public_path('images/upload/documentacionEmpresas'), $cbu);

            $documentacion->cbu = $cbu;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->cbu,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function f931(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'f931'          => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('f931');
            $extension = $file->getClientOriginalExtension();
            $f931      = $documentacion->id . 'f931.' . $extension;

            $request->file('f931')->move(public_path('images/upload/documentacionEmpresas'), $f931);

            $documentacion->f931 = $f931;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->f931,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function afip(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'afip'          => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('afip');
            $extension = $file->getClientOriginalExtension();
            $afip      = $documentacion->id . 'afip.' . $extension;

            $request->file('afip')->move(public_path('images/upload/documentacionEmpresas'), $afip);

            $documentacion->afip = $afip;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->afip,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function cuit(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'cuit'          => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('cuit');
            $extension = $file->getClientOriginalExtension();
            $cuit      = $documentacion->id . 'cuit.' . $extension;

            $request->file('cuit')->move(public_path('images/upload/documentacionEmpresas'), $cuit);

            $documentacion->cuit = $cuit;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->cuit,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function dni(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'dni'           => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('dni');
            $extension = $file->getClientOriginalExtension();
            $dni       = $documentacion->id . 'dni.' . $extension;

            $request->file('dni')->move(public_path('images/upload/documentacionEmpresas'), $dni);

            $documentacion->dni = $dni;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->dni,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function autoridades(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'autoridades'   => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file        = $request->file('autoridades');
            $extension   = $file->getClientOriginalExtension();
            $autoridades = $documentacion->id . 'autoridades.' . $extension;

            $request->file('autoridades')->move(public_path('images/upload/documentacionEmpresas'), $autoridades);

            $documentacion->autoridades = $autoridades;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->autoridades,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function estatuto(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'estatuto'      => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('estatuto');
            $extension = $file->getClientOriginalExtension();
            $estatuto  = $documentacion->id . 'estatuto.' . $extension;

            $request->file('estatuto')->move(public_path('images/upload/documentacionEmpresas'), $estatuto);

            $documentacion->estatuto = $estatuto;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->estatuto,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function empleado(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'empleado'      => 'required',
        ]);

        if ($validator->passes()) {
            $documentacion           = DocumentacionEmpleo::find($request->documentacion);
            $documentacion->empleado = $request->empleado;
            $documentacion->save();

            return response()->json([
                'message' => 'Datos de la persona subida',
                'success' => true,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function fondep(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'fondep'        => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('fondep');
            $extension = $file->getClientOriginalExtension();
            $fondep    = $documentacion->id . 'fondep.' . $extension;

            $request->file('fondep')->move(public_path('images/upload/documentacionEmpresas'), $fondep);

            $documentacion->fondep = $fondep;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->fondep,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function memoria(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'memoria'       => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file      = $request->file('memoria');
            $extension = $file->getClientOriginalExtension();
            $memoria   = $documentacion->id . 'memoria.' . $extension;

            $request->file('memoria')->move(public_path('images/upload/documentacionEmpresas'), $memoria);

            $documentacion->memoria = $memoria;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->memoria,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function attrabajador(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'attrabajador'  => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file         = $request->file('attrabajador');
            $extension    = $file->getClientOriginalExtension();
            $attrabajador = $documentacion->id . 'attrabajador.' . $extension;

            $request->file('attrabajador')->move(public_path('images/upload/documentacionEmpresas'), $attrabajador);

            $documentacion->attrabajador = $attrabajador;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->attrabajador,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function djattrabajador(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion'  => 'required',
            'djattrabajador' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file           = $request->file('djattrabajador');
            $extension      = $file->getClientOriginalExtension();
            $djattrabajador = $documentacion->id . 'djattrabajador.' . $extension;

            $request->file('djattrabajador')->move(public_path('images/upload/documentacionEmpresas'), $djattrabajador);

            $documentacion->djattrabajador = $djattrabajador;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->djattrabajador,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }

    public function certdiscapacidad(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'documentacion'    => 'required',
            'certdiscapacidad' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {
            $documentacion = DocumentacionEmpleo::find($request->documentacion);

            $file             = $request->file('certdiscapacidad');
            $extension        = $file->getClientOriginalExtension();
            $certdiscapacidad = $documentacion->id . 'certdiscapacidad.' . $extension;

            $request->file('certdiscapacidad')->move(public_path('images/upload/documentacionEmpresas'), $certdiscapacidad);

            $documentacion->certdiscapacidad = $certdiscapacidad;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen'  => $documentacion->certdiscapacidad,
            ]);
        }
        return response()->json([
            'message' => $validator->errors()->all(),
        ]);
    }
}
