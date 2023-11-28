<?php

namespace App\Http\Controllers;

use App\Models\AuditoriaSistema;
use App\Models\CostoFijo;

use App\Models\CostoVariable;
use App\Models\Documentacion;
use App\Models\Empresa;
use App\Models\Evaluacion;
use App\Models\FuenteFinanciacion;
use App\Models\IngresoVenta;
use App\Models\Proyecto;
use App\Models\ProyectoPlanilla;
use App\Models\ProyectoUser;
use App\Models\ResumenPresupuestario;
use App\User;
use Auth;

use Illuminate\Http\Request;
use Mail;

use Session;

use Yajra\DataTables\Facades\DataTables;

class ProyectoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                $proyecto = Proyecto::all();
            } else {
                $user     = Auth::user();
                $proyecto = Proyecto::where('titular', '=', $user->id)->get();
            }

            if ($proyecto) {
                return Datatables::of($proyecto)
                    ->addIndexColumn()
                    ->editColumn('denominacion', function ($proyecto) {
                        $titulo = ($proyecto->denominacion) ? mb_substr($proyecto->denominacion, 0, 15) : 'PROYECTO';

                        if (Auth::user()->hasRole(['user'])) {
                            return ($proyecto->canEdit()) ? '<a href= "' . route('proyecto.edit', $proyecto->id) . '">' . $titulo . '</a>' : $titulo;
                        }
                        return '<a href= "' . route('proyecto.edit', $proyecto->id) . '">' . $titulo . '</a>';
                    })
                    ->editColumn('titular', function ($proyecto) {
                        return ($proyecto->Titular) ? substr($proyecto->Titular->NombreCompleto, 0, 35) : 'Titular';
                    })
                    ->editColumn('empresa', function ($proyecto) {
                        return ($proyecto->Empresa) ? substr($proyecto->Empresa->razon_social, 0, 35) : 'Empresa';
                    })
                    ->editColumn('estado', function ($proyecto) {
                        return $proyecto->Estado->icono . ' ' . $proyecto->Estado->estado;
                    })
                    ->editColumn('estadoplanilla', function ($proyecto) {
                        return $proyecto->Planilla->Estado->icono . ' ' . $proyecto->Planilla->Estado->estado;
                    })
                    ->addColumn('integrantes', function ($proyecto) {
                        $integrantes = count($proyecto->users()->get());

                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            return '<a href="' . route('proyecto.asociados', $proyecto->id) . '" title="Integrantes">' . $integrantes . ' (socio/s)</a>';
                        }

                        return ($proyecto->canEdit()) ? '<a href="' . route('proyecto.asociados', $proyecto->id) . '" title="Integrantes">' . $integrantes . ' (socio/s)</a>' : $integrantes . ' (socio/s)';
                    })
                    ->addColumn('enviar', function ($proyecto) {
                        $estadoproyecto      = ($proyecto->estado == 19);
                        $estadoplanilla      = ($proyecto->planilla->estado == 19);
                        $estadodocumentacion = ($proyecto->documentacion->estado == 19);

                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            return ($proyecto->estado == 24 && $proyecto->planilla->estado == 24 && $proyecto->documentacion->estado == 24) ?
                                '<a href="javascript:rehabilitar(' . $proyecto->id . ')" title="Rehabilitar proyecto"><i class="fas fa-recycle text-success"></i></a>' : null;
                        }

                        return ($estadoproyecto && $estadoplanilla && $estadodocumentacion) ? '<a href= "javascript:enviar(' . $proyecto->id . ')" title="Envía y bloquea el proyecto para que se evalúe">' . '<i class="fas fa-share text-danger"></i>' . '</a>' : null;
                    })
                    ->addColumn('print', function ($proyecto) {
                        $print = 'print/proyecto/' . $proyecto->id;
                        $btn   = '<a href="' . $print . '" title="Imprime proyecto"><i class="fas fa-print text-primary"></i></a>';
                        return $btn;
                    })
                    ->addColumn('borrar', function ($proyecto) {
                        if (Auth::user()->hasRole(['superadmin', 'admin'])) {
                            return '<a href="javascript:void(0)" title="Elimina proyecto"><i class="fas fa-trash text-danger borrar" id="' . $proyecto['id'] . '"></i></a>';
                        }
                        return ($proyecto->titular == Auth::user()->id) ? '<a href="javascript:void(0)" title="Elimina proyecto"><i class="fas fa-trash text-danger borrar" id="' . $proyecto['id'] . '"></i></a>' : null;
                    })
                    ->rawColumns(['titular', 'empresa', 'denominacion', 'estado', 'integrantes', 'estadoplanilla', 'enviar', 'print', 'borrar'])
                    ->make(true);
            } else {
                return Datatables::of($proyecto)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        return view('admin.proyectos.index');
    }

    public function create()
    {
        /////// SI NO TIENE EMPRESAS, GENERA UNA NUEVA
        $empresa = Empresa::create([
            'razon_social' => 'Nueva empresa ',
            'titular'      => Auth::user()->id,
        ]);

        $proyecto = Proyecto::create([
            'denominacion' => 'NUEVO PROYECTO',
            'titular'      => Auth::user()->id,
            'empresa'      => $empresa->id,
        ]);

        ProyectoUser::create([
            'proyecto_id' => $proyecto->id,
            'user_id'     => Auth::user()->id,
        ]);

        ProyectoPlanilla::create(['proyecto' => $proyecto->id]);

        Documentacion::create(['proyecto' => $proyecto->id]);

        Evaluacion::create(['proyecto' => $proyecto->id]);

        return redirect()->route('proyecto.edit', $proyecto->id);
    }

    public function edit($proyecto)
    {
        $proyecto = Proyecto::find($proyecto);

        $usuarios = (Auth::user()->hasRole(['superadmin', 'admin']))
            ? User::orderBy('apellido')->get()->pluck('nombrecompleto', 'id')
            : User::where('id', '=', Auth::user()->id)->get()->pluck('nombrecompleto', 'id');

        $empresas = (Auth::user()->hasRole(['superadmin', 'admin']))
            ? Empresa::orderBy('razon_social')->get()->pluck('razon_social', 'id')
            : Empresa::where('titular', '=', Auth::user()->id)->orderBy('razon_social')->pluck('razon_social', 'id');

        return view('admin.proyectos.edit', compact('proyecto', 'usuarios', 'empresas'));
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->fill($request->all());
        $proyecto->save();

        if (!$proyecto->TieneVacios()) {
            $proyecto->estado = 19;
        }

        $proyecto->save();

        $view = view('admin.proyectos.estado', compact('proyecto'))->render();
        return response()->json($view);
    }

    public function editaplanillas($id)
    {
        $proyecto           = Proyecto::find($id);
        $planilla           = ProyectoPlanilla::where('proyecto', '=', $id)->first();
        $resumen            = ResumenPresupuestario::where('proyecto', '=', $id)->get();
        $costofijo          = CostoFijo::where('proyecto', '=', $id)->get();
        $costovariable      = CostoVariable::where('proyecto', '=', $id)->get();
        $fuentefinanciacion = FuenteFinanciacion::where('proyecto', '=', $id)->get();
        $ingresoventa       = IngresoVenta::where('proyecto', '=', $id)->get();

        return view(
            'admin.proyectos.editplanillas',
            compact('proyecto', 'planilla', 'resumen', 'costofijo', 'costovariable', 'fuentefinanciacion', 'ingresoventa')
        );
    }

    public function asociados(Request $request)
    {
        $proyecto  = Proyecto::find($request->id);
        $asociados = $proyecto->users;

        return view('admin.proyectos.vinculaAsociado', compact('asociados', 'proyecto'));
    }

    public function vincularasociado(Request $request)
    {
        $asociado = User::where('dni', '=', $request->dni)->get();
        $proyecto = Proyecto::find($request->proyecto);

        if (count($asociado) > 0) {
            $proyecto->users()->attach($asociado);
        }

        $asociados = $proyecto->users;
        $view      = view('admin.asociados.detalleasociados', compact('proyecto', 'asociados'))->render();

        return response()->json($view);
    }

    public function desvincularasociado(Request $request)
    {
        $asociado = $request->id;
        $proyecto = Proyecto::find($request->proyecto);

        if (isset($asociado)) {
            $proyecto->users()->detach($asociado);
        }

        $asociados = $proyecto->users;

        $view = view('admin.asociados.detalleasociados', compact('proyecto', 'asociados'))->render();

        return response()->json($view);
    }

    public function cambioestado(Request $request)
    {
        $proyecto         = Proyecto::find($request->id);
        $proyecto->estado = $request->estado;
        $proyecto->save();

        $evaluacion         = $proyecto->evaluacion;
        $evaluacion->estado = 20; // CARGANDO
        $evaluacion->save();

        return response()->json();
    }

    public function enviar($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->enviado();

        $documentacion = $proyecto->documentacion;
        $documentacion->enviado();

        $planilla = $proyecto->planilla;
        $planilla->enviado();

        $empresa = $proyecto->Empresa;
        $empresa->enviado();

        /////////////////////////////////////////////////////////////////////////////////////

        $destinatario = $proyecto->Titular->nombre . ' ' . $proyecto->Titular->apellido;
        $email        = $proyecto->Titular->email;
        $denominacion = $proyecto->denominacion;

        $data = ['destinatario' => $destinatario, 'denominacion' => $denominacion];

        $mensaje = 'Su proyecto se ha enviado correctamente !';
        $class   = 'alert-success';
        $type    = 'success';

        Mail::send('email.envioproyecto', $data, function ($message) use ($destinatario, $email) {
            $message->to($email, $destinatario)->subject('Envío de proyecto');
        });

        Session::flash('message', $mensaje);
        Session::flash('alert-class', $class);
        Session::flash('alert-type', $type);

        return view('admin.proyectos.enviado', compact('proyecto'));
    }

    public function rehabilitar($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->cargando();

        $documentacion = $proyecto->documentacion;
        $documentacion->cargando();

        $planilla = $proyecto->planilla;
        $planilla->cargando();

        $empresa = $proyecto->Empresa;
        $empresa->cargando();

        $mensaje = 'Proyecto se ha rehabilitado correctamente !';
        $class   = 'alert-success';
        $type    = 'success';

        Session::flash('message', $mensaje);
        Session::flash('alert-class', $class);
        Session::flash('alert-type', $type);

        return redirect()->route('proyecto.index');
    }

    public function destroy(Request $request)
    {
        $proyecto = Proyecto::find($request->id);
        $proyecto->delete();

        // AUDITORIA
        AuditoriaSistema::create(['codigo' => 4, 'tabla' => 'PROYECTO', 'usuario' => Auth::user()->id, 'created_at' => date(now())]);
        //

        return response()->json();
    }
}
