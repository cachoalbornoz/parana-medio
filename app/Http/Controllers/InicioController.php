<?php

namespace App\Http\Controllers;

use App\Models\CiudadAll;

use App\Models\Pais;

use App\Models\Provincia;
use App\Models\Tasa;

use App\Models\TipoPrograma;

use App\Models\UserPrograma;
use App\Notifications\NuevoUsuario;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InicioController extends Controller
{
    public function index()
    {
        return view('base.home');
    }

    public function frontend()
    {
        $noticias = DB::table('noticia')->take(3)->orderByDesc('id')->get();
        return view('base.frontend', compact('noticias'));
    }

    public function registro()
    {
        $ciudad    = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $pais      = Pais::all()->sortBy('nombre')->pluck('nombre', 'id');
        $milemple  = TipoPrograma::where('tipoPrograma', 3)->pluck('programa', 'id');

        return view('auth.registro', compact('ciudad', 'provincia', 'pais', 'milemple'));
    }

    protected function createEmp(Request $request)
    {
        $request->validate([
            'apellido'           => ['required', 'string', 'max:255'],
            'nombre'             => ['required', 'string', 'max:255'],
            'dni'                => ['required', 'string', 'min:7', 'max:10', 'unique:users'],
            'direccion'          => ['required', 'string', 'max:255'],
            'ciudad'             => ['required'],
            'cp'                 => ['required'],
            'codarea'            => ['required'],
            'telefono'           => ['required'],
            'email'              => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'           => ['required', 'string', 'min:8', 'confirmed'],
            recaptchaFieldName() => recaptchaRuleName(),
        ]);

        $user = User::create([
            'nombre'       => $request['nombre'],
            'dni'          => $request['dni'],
            'nacionalidad' => $request['nacionalidad'],
            'direccion'    => $request['direccion'],
            'apellido'     => $request['apellido'],
            'ciudad'       => $request['ciudad'],
            'cp'           => $request['cp'],
            'codarea'      => $request['codarea'],
            'telefono'     => $request['telefono'],
            'fechanac'     => $request['fechanac'],
            'email'        => $request['email'],
            'password'     => Hash::make($request['password']),
        ]);

        $userpPrograma = UserPrograma::create([

            'user'     => $user->id,
            'programa' => $request['tipo_programa'],
        ]);

        //// NOTIFICAR AL USUARIO QUE SE REGISTRO CORRECTAMENTE

        $datos = [
            'apellido' => $user->apellido,
            'nombre'   => $user->nombre,
        ];

        $user->notify(new NuevoUsuario($datos));

        auth()->login($user);

        return redirect()->to('/home');
    }

    public function programareactivacion()
    {
        return view('base.frontendpr');
    }

    public function programasp()
    {
        return view('base.frontendsp');
    }

    public function pafinanciera()
    {
        return view('base.frontendaf');
    }

    public function patecnica()
    {
        return view('base.frontendat');
    }

    public function pcapitalTrabajo()
    {
        return view('base.frontendcapital_trabajo');
    }

    public function pEstrategicos()
    {
        return view('base.proyecto_estrategico');
    }

    public function pcooperativas()
    {
        return view('base.frontendcoop');
    }

    public function verificaDni(Request $request)
    {
        $user = User::where('dni', $request->dni)->get();
        if (count($user) > 0) {
            return new JsonResponse([
                'msj'  => '<b>Dni registrado</b>, por favor <b>no</b> continúe cargando datos. Diríjase al menú <b>INGRESAR</b>',
                'type' => 'error',
            ]);
        }
    }

    public function desarrollo()
    {
        $financia = TipoPrograma::where('tipoPrograma', 1)->pluck('programa', 'id');
        $asesora  = TipoPrograma::where('tipoPrograma', 2)->orderBy('programa')->pluck('programa', 'id');

        return view('base.desarrollo', compact('financia', 'asesora'));
    }

    public function calculadora()
    {
        $tasa = Tasa::first()->pluck('tasa');
        $tasa = $tasa[0];

        return view('partials.calculadora', compact('tasa'));
    }

    public function calcular(Request $request)
    {
        if ($request->ajax()) {
            $parametros = [
                'monto'      => $request->monto,
                'interes'    => $request->interes,
                'frecuencia' => $request->frecuencia,
                'mesamor'    => $request->mesamor,
                'cuotas'     => $request->cuotas,
            ];

            $view = view('partials.resultado', with($parametros))->render();

            return response()->json($view);
        }
    }

    public function somos()
    {
        return view('base.somos');
    }

    public function limpiar()
    {
        Artisan::call('optimize');
        Artisan::call('route:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        print Artisan::output() . 'Sistema limpio !';
    }
}
