<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Permiso;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $permiso = Permiso::all();

            return Datatables::of($permiso)
                ->addIndexColumn()
                ->editColumn('name', function ($permiso) {

                    $edit  = 'permisos/edit/' . $permiso->id;
                    return $edit = '<a href= "' . $edit . '">' . $permiso->name . '</a>';
                })
                ->addColumn('borrar', function ($permiso) {

                    $btn    = '<a href="javascript:void(0)" title="Elimina permiso"><i class="fas fa-trash text-danger borrar" id="' . $permiso['id'] . '"></i></a>';
                    return $btn;
                })
                ->rawColumns(['name', 'borrar'])
                ->make(true);
        }
        return view('admin.permisos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permisos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permiso = Permiso::create($request->all());

        $notification = array(
            'message' => 'Permiso creado !',
            'alert-type' => 'success'
        );

        return redirect()->route('permisos.index')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = Permiso::find($id);
        return view('admin.permisos.show', compact('permiso'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permiso       = Permiso::find($id);
        return view('admin.permisos.edit', compact('permiso'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permiso = Permiso::find($id);
        $permiso->update($request->all());

        $notification = array(
            'message' => 'Permiso actualizado !',
            'alert-type' => 'success'
        );

        return redirect()->route('permisos.edit', $permiso->id)->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Permiso::find($request->id)->delete();

        return response()->json();
    }
}
