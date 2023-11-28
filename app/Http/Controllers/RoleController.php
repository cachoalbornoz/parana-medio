<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller {

    public function index(Request $request){

        if ($request->ajax()) {

            $rol = Role::all();

            return Datatables::of($rol)
                ->addIndexColumn()
                ->editColumn('name', function ($rol) {

                    return '<a href= "'.route('roles.edit', $rol->id).'">'.$rol->name.'</a>';
                })
                ->addColumn('borrar', function($rol){

                    return '<a href="javascript:void(0)" title="Elimina rol"><i class="fas fa-trash text-danger borrar" id="'.$rol['id'].'"></i></a>';
                })
                ->rawColumns(['name', 'borrar'])
                ->make(true);
        }
        return view('admin.roles.index');
    }

    public function create(){

        $permissions = Permission::get();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'name'          => 'required|unique:roles,name',
            'permissions'   => 'required',
        ]);

        Role::create(['name' => $request->input('name')])->syncPermissions($request->input('permissions'));

        $notification = array(
            'message' => 'Rol creado !',
            'alert-type' => 'success');

        return redirect()->route('roles.index')->with($notification);
    }

    public function show($id){

        $role = Role::find($id);
        return view('admin.roles.show', compact('role'));
    }

    public function edit($id){

        $role       = Role::find($id);
        $permission = Permission::all();

        return view('admin.roles.edit', compact('role', 'permission'));
    }

    public function update(Request $request, $id){

        $role = Role::find($id);
        $role->name         = $request->name;
        $role->guard_name   = $request->guard_name;
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        $notification = array(
            'message' => 'Rol actualizado !',
            'alert-type' => 'success');

        return redirect()->route('roles.index')->with($notification);
    }

    public function destroy(Request $request) {

        $role   = Role::find($request->id)->delete();

        return response()->json();
    }

}
