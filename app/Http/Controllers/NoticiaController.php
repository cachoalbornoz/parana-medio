<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Models\Noticia;

use App\Models\NoticiaCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $noticia = Noticia::all()->sortByDesc('fecha_publicacion')->sortByDesc('id');

            return Datatables::of($noticia)
                ->addIndexColumn()
                ->addColumn('fecha', function ($noticia) {
                    return (isset($noticia->fecha_publicacion)) ? date('d-m-Y', strtotime($noticia->fecha_publicacion)) : date('d-m-Y', strtotime(now()));
                })
                ->addColumn('estado', function ($noticia) {
                    $active = ($noticia->active == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-ban text-danger"></i>';
                    return '<a href="javascript:publicar('.$noticia->id.')" title="Publica o no noticia">' . $active . '</a>';
                })
                ->addColumn('editar', function ($noticia) {
                    return '<a href="' . route('noticias.edit', ['id' => $noticia->id]) . '" title="Modifica noticia"> <i class="fa fa-pen"></i> </a>';
                })
                ->addColumn('borrar', function ($noticia) {
                    return '<a href="' . route('noticias.destroy', ['id' => $noticia->id]) . '" title="Elimina noticia"> <i class="fa fa-trash text-danger"></i> </a>';
                })
                ->rawColumns(['fecha', 'titulo', 'estado', 'editar', 'borrar'])
                ->make(true);
        }
        return view('admin.noticias.index');
    }

    public function create()
    {
        $noticia    = null;
        $categorias = NoticiaCategoria::orderBy('categoria')->pluck('categoria', 'id');
        return view('admin.noticias.form', compact('noticia', 'categorias'));
    }

    public function store(NoticiaRequest $request)
    {
        $noticia = Noticia::create($request->except('imagen'));

        $nombre = null;

        if ($request->file()) {
            $path      = public_path() . '/images/upload/noticias';
            $file      = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $nombre    = $noticia->id . 'noticia.' . $extension;
            $request->file('imagen')->move($path, $nombre);
        }

        $noticia->active = ($request->exists('active')) ? 1 : 0;
        $noticia->imagen = $nombre;
        $noticia->save();

        $notification = [
            'message'    => 'Noticia creado !',
            'alert-type' => 'success',
        ];
        return redirect()->route('noticias.index')->with($notification);
    }

    public function edit(Request $request)
    {
        $noticia    = Noticia::find($request->id);
        $categorias = NoticiaCategoria::orderBy('categoria')->pluck('categoria', 'id');
        return view('admin.noticias.form', compact('noticia', 'categorias'));
    }

    public function update(NoticiaRequest $request)
    {
        $noticia = Noticia::find($request->noticia_id);

        if ($request->file()) {
            $path = public_path() . '/images/upload/noticias';
            if (File::exists($path . $noticia->imagen)) {
                File::delete($path . $noticia->imagen);
            }
            $file      = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $nombre    = $noticia->id . 'noticia.' . $extension;
            $request->file('imagen')->move(public_path('images/upload/noticias'), $nombre);
        } else {
            $nombre = $noticia->imagen;
        }

        $noticia->fill($request->all());
        $noticia->active = ($request->exists('active')) ? 1 : 0;
        $noticia->imagen = $nombre;
        $noticia->save();

        $notification = [
            'message'    => 'Noticia actualizada !',
            'alert-type' => 'success',
        ];

        return redirect()->route('noticias.index', $noticia->id)->with($notification);
    }

    public function destroy(Request $request)
    {
        Noticia::find($request->id)->delete();
        return response()->json();
    }

    public function publicacion()
    {
        $noticias = DB::table('noticia')->take(3)->orderByDesc('id')->get();
        return view('base.frontendnoticias', compact('noticias'));
    }

    public function publicar(Request $request)
    {
        Noticia::find($request->id)->toggleActive();
        return response()->json();
    }
}
