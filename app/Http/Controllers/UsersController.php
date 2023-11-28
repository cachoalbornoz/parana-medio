<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\CiudadAll;
use App\Models\Pais;

use App\Models\Provincia;
use App\Models\Role;
use App\User;
use Auth;
use Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Image;
use Session;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = User::orderBy('apellido', 'Asc')->get();

            return Datatables::of($user)
                ->editColumn('id', function ($user) {
                    return $edit = '<a href= "' . route('users.edit', $user->id) . '">' . $user->id . '</a>';
                })
                ->editColumn('ciudad', function ($user) {
                    return (isset($user->Ciudad)) ? $user->Ciudad->nombre : null;
                })
                ->editColumn('created_at', function ($user) {
                    $date = date('Y-m-d H:m:s', strtotime($user->created_at));
                    return $date;
                })
                ->addColumn('rol', function ($user) {
                    return $user->tieneRol();
                })
                ->addColumn('borrar', function ($user) {
                    return '<a href="javascript:void(0)" title="Elimina solicitante"><i class="fas fa-trash text-danger borrar" id="' . $user['id'] . '"></i></a>';
                })
                ->rawColumns(['id', 'borrar', 'rol', 'created_at'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function store(Request $request)
    {
        Validator::make($request, [
            'apellido'     => ['required', 'string', 'max:255'],
            'nombre'       => ['required', 'string', 'max:255'],
            'dni'          => ['required', 'string', 'min:7', 'max:10', 'unique:users'],
            'nacionalidad' => ['required'],
            'direccion'    => ['required', 'string', 'max:255'],
            'ciudad'       => ['required'],
            'cp'           => ['required'],
            'codarea'      => ['required'],
            'telefono'     => ['required'],
            'fechanac'     => ['required', 'date'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'apellido'     => $data['apellido'],
            'nombre'       => $data['nombre'],
            'dni'          => $data['dni'],
            'habilitado'   => 1,
            'nacionalidad' => $data['nacionalidad'],
            'direccion'    => $data['direccion'],
            'ciudad'       => $data['ciudad'],
            'cp'           => $data['cp'],
            'codarea'      => $data['codarea'],
            'telefono'     => $data['telefono'],
            'fechanac'     => $data['fechanac'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
        ]);
    }

    public function edit(User $user)
    {
        $idprovincia = (isset($user->ciudad)) ? $user->Ciudad->Departamento->provincia : 7;
        $roles       = Role::get();
        $ciudad      = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia   = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $pais        = Pais::all()->sortBy('nombre')->pluck('nombre', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'ciudad', 'provincia', 'idprovincia', 'pais'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->habilitado = (isset($request->habilitado)) ? 1 : null;
        $user->save();

        //actualizar roles
        $user->roles()->sync($request->get('roles'));

        $notification = [
            'message'    => 'Datos actualizados correctamente !',
            'alert-type' => 'success',
        ];

        return redirect('/home')->with($notification);
    }

    public function editprofile()
    {
        $user = Auth::user();
        return view('admin.users.editprofile', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $user = Auth::user();

        if ($request->file()) {
            $path = public_path() . '/images/upload/usuarios/';

            if (\File::exists($path . $user->image)) {
                \File::delete($path . $user->image);
            }

            $file = $request->file('image');
            $name = $file->getClientOriginalName();

            $img = Image::make($file->getRealPath());

            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $name);
        } else {
            $name = $user->image;
        }

        $user->fill($request->all());
        $user->image = $name;
        $user->save();

        $notification = [
            'message'    => 'Datos actualizados correctamente !',
            'alert-type' => 'success',
        ];

        return redirect('/home')->with($notification);
    }

    public function editclave()
    {
        return view('admin.users.editclave');
    }

    public function updateclave(Request $request)
    {
        if ($request->nueva_clave !== $request->nueva_clave_confirmation) {
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'La clave nueva no coincide con su confirmación. Intente nuevamente');
            Session::flash('alert-type', 'error');
        } else {
            if (strlen($request->nueva_clave) < 8 or strlen($request->nueva_clave_confirmation) < 8) {
                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', 'Clave actual debe tener al menos 6 caracteres. Intente nuevamente');
                Session::flash('alert-type', 'error');
            } else {
                if (!(Hash::check($request->get('clave_actual'), Auth::user()->password))) {
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message', 'Clave actual ingresada es incorrecta. Intente nuevamente');
                    Session::flash('alert-type', 'error');
                } else {
                    if (strcmp($request->get('clave_actual'), $request->get('nueva_clave')) == 0) {
                        Session::flash('alert-class', 'alert-danger');
                        Session::flash('message', 'La clave actual no puede ser la anterior. Por favor elija una diferente');
                        Session::flash('alert-type', 'error');
                    } else {
                        $user           = Auth::user();
                        $user->password = bcrypt($request->get('nueva_clave'));
                        $user->save();

                        Session::flash('message', 'Clave modificada correctamente !');
                        Session::flash('alert-class', 'alert-success');
                        Session::flash('alert-type', 'success');
                    }
                }
            }
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return response()->json();
    }
}
