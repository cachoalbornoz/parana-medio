<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\NuevoUsuario;

use App\User,
    App\Models\UserPrograma,
    App\Models\Role,
    App\Models\TipoPrograma,
    App\Models\CiudadAll,
    App\Models\Provincia,
    App\Models\Pais;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return  Validator::make($data, [
            'apellido'          => ['required', 'string', 'max:255'],
            'nombre'            => ['required', 'string', 'max:255'],
            'dni'               => ['required', 'string', 'min:7', 'max:10', 'unique:users'],
            'direccion'         => ['required', 'string', 'max:255'],
            'ciudad'            => ['required'],
            'cp'                => ['required'],
            'codarea'           => ['required'],
            'telefono'          => ['required'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            recaptchaFieldName() => recaptchaRuleName()
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'apellido'      => $data['apellido'],
            'nombre'        => $data['nombre'],
            'dni'           => $data['dni'],
            'nacionalidad'  => $data['nacionalidad'],
            'direccion'     => $data['direccion'],
            'ciudad'        => $data['ciudad'],
            'cp'            => $data['cp'],
            'codarea'       => $data['codarea'],
            'telefono'      => $data['telefono'],
            'fechanac'      => $data['fechanac'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
        ]);

        $userpPrograma =  UserPrograma::create([

            'user'      => $user->id,
            'programa'  => $data['tipo_programa']
        ]);

        //// NOTIFICAR AL USUARIO QUE SE REGISTRO CORRECTAMENTE

        $datos = [
            'apellido'  => $user->apellido,
            'nombre'    => $user->nombre,
        ];

        $user->notify(new NuevoUsuario($datos));

        return $user;
    }

    public function showRegistrationForm()
    {

        $ciudad     = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia  = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $pais       = Pais::all()->sortBy('nombre')->pluck('nombre', 'id');
        $financia   = TipoPrograma::where('tipoPrograma', 1)->pluck('programa', 'id');
        $asesora    = TipoPrograma::where('tipoPrograma', 2)->orderBy('programa')->pluck('programa', 'id');
        

        return view('auth.register', compact('ciudad', 'provincia', 'pais', 'financia', 'asesora'));
    }
}