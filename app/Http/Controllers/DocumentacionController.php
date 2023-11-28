<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use App\Models\Empresa;
use App\Models\Proyecto;
use App\Models\TipoSociedad;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class DocumentacionController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                $documentacion = Documentacion::all();
            } else {

                $proyectos = Proyecto::where('titular', '=', Auth::user()->id)->get();
                $documentacion = new Collection;

                foreach ($proyectos as $proyecto) {
                    $documento = Documentacion::where('proyecto', '=', $proyecto->id)->first();
                    $documentacion->push($documento);
                }
            }

            if ($documentacion) {

                return Datatables::of($documentacion)
                    ->addIndexColumn()
                    ->addColumn('titular', function ($documentacion) {
                        return ($documentacion->Proyecto->titular) ? $documentacion->Proyecto->Titular->apellido . ' ' . $documentacion->Proyecto->Titular->nombre : null;
                    })
                    ->addColumn('denominacion', function ($documentacion) {
                        $denominacion = $documentacion->Proyecto->denominacion;
                        return ($documentacion->canEdit()) ? '<a href= "' . route('documentacion.edit', $documentacion->id) . '">' . $denominacion . '</a>' : $denominacion;
                    })

                    ->addColumn('revision', function ($documentacion) {

                        return '<a href= "' . route('documentacion.revisar', $documentacion->id) . '">Observaciones</a>';
                    })

                    ->addColumn('tiposociedad', function ($documentacion) {

                        return ($documentacion->Proyecto->Empresa) ? $documentacion->Proyecto->Empresa->Tiposociedad->sociedad : null;
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

        $documentacion = Documentacion::find($documentacion);

        return view('admin.documentacion.revisar', \compact('documentacion'));
    }

    public function update(Request $request, $id)
    {

        $documentacion = Documentacion::find($id);

        $documentacion->fill($request->all());
        $documentacion->save();

        $notification = array(
            'message' => 'Documentación actualizada !',
            'alert-type' => 'success',
        );

        return redirect()->route('documentacion.index')->with($notification);
    }

    public function edit($documentacion)
    {

        $documentacion = Documentacion::find($documentacion);

        return view('admin.documentacion.edit', \compact('documentacion'));
    }

    public function estado(Request $request)
    {

        $documentacion = Documentacion::find($request->id);
        $documentacion->estado = ($documentacion->personaCompleta() == 1) ? 19 : 20;
        $documentacion->save();

        $view = view('admin.documentacion.estado', compact('documentacion'))->render();
        return response()->json($view);
    }

    public function estadocontable(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'estadocontable' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('estadocontable');
            $extension = $file->getClientOriginalExtension();
            $estadocontable = $documentacion->id . "estadocontable." . $extension;

            $request->file('estadocontable')->move(public_path('images/upload/documentacion'), $estadocontable);

            $documentacion->estadocontable = $estadocontable;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->estadocontable,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function personeria(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'personeria' => 'required|mimes:pdf|max:1000000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('personeria');
            $extension = $file->getClientOriginalExtension();
            $personeria = $documentacion->id . "personeria." . $extension;

            $request->file('personeria')->move(public_path('images/upload/documentacion'), $personeria);

            $documentacion->personeria = $personeria;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->personeria,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function poder(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'poder' => 'required|mimes:pdf|max:1000000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('poder');
            $extension = $file->getClientOriginalExtension();
            $poder = $documentacion->id . "poder." . $extension;

            $request->file('poder')->move(public_path('images/upload/documentacion'), $poder);

            $documentacion->poder = $poder;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->poder,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function acta(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'acta' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('acta');
            $extension = $file->getClientOriginalExtension();
            $acta = $documentacion->id . "acta." . $extension;

            $request->file('acta')->move(public_path('images/upload/documentacion'), $acta);

            $documentacion->acta = $acta;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->acta,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function estatuto(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'estatuto' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('estatuto');
            $extension = $file->getClientOriginalExtension();
            $estatuto = $documentacion->id . "estatuto." . $extension;

            $request->file('estatuto')->move(public_path('images/upload/documentacion'), $estatuto);

            $documentacion->estatuto = $estatuto;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->estatuto,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function ater(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'ater' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('ater');
            $extension = $file->getClientOriginalExtension();
            $ater = $documentacion->id . "ater." . $extension;

            $request->file('ater')->move(public_path('images/upload/documentacion'), $ater);

            $documentacion->ater = $ater;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->ater,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function mipyme(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'mipyme' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('mipyme');
            $extension = $file->getClientOriginalExtension();
            $mipyme = $documentacion->id . "mipyme." . $extension;

            $request->file('mipyme')->move(public_path('images/upload/documentacion'), $mipyme);

            $documentacion->mipyme = $mipyme;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->mipyme,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function muni(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'muni' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('muni');
            $extension = $file->getClientOriginalExtension();
            $muni = $documentacion->id . "muni." . $extension;

            $request->file('muni')->move(public_path('images/upload/documentacion'), $muni);

            $documentacion->muni = $muni;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->muni,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function afip(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'afip' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('afip');
            $extension = $file->getClientOriginalExtension();
            $afip = $documentacion->id . "afip." . $extension;

            $request->file('afip')->move(public_path('images/upload/documentacion'), $afip);

            $documentacion->afip = $afip;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->afip,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function domiciliolegal(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'domiciliolegal' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('domiciliolegal');
            $extension = $file->getClientOriginalExtension();
            $domiciliolegal = $documentacion->id . "domiciliolegal." . $extension;

            $request->file('domiciliolegal')->move(public_path('images/upload/documentacion'), $domiciliolegal);

            $documentacion->domiciliolegal = $domiciliolegal;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->domiciliolegal,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function dnidorso(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'dnidorso' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('dnidorso');
            $extension = $file->getClientOriginalExtension();
            $dnidorso = $documentacion->id . "dnidorso." . $extension;

            $request->file('dnidorso')->move(public_path('images/upload/documentacion'), $dnidorso);

            $documentacion->dnidorso = $dnidorso;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->dnidorso,
            ]);
        } else {
            return response()->json([
                'message' => $validator->errors()->all(),

            ]);
        }
    }

    public function dnifrente(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'documentacion' => 'required',
            'dnifrente' => 'required|mimes:pdf|max:10000000',
        ]);

        if ($validator->passes()) {

            $documentacion = Documentacion::find($request->documentacion);

            $file = $request->file('dnifrente');
            $extension = $file->getClientOriginalExtension();
            $dnifrente = $documentacion->id . "dnifrente." . $extension;

            $request->file('dnifrente')->move(public_path('images/upload/documentacion'), $dnifrente);

            $documentacion->dnifrente = $dnifrente;

            $documentacion->save();

            return response()->json([
                'message' => 'Pdf subido',
                'success' => true,
                'imagen' => $documentacion->dnifrente,
            ]);
        } else {

            return response()->json(['message' => $validator->errors()->all()]);
        }
    }
}
