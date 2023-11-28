<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;


use App\Models\Tasa;


class TasaController extends Controller{

    public function editasa() {

        $tasa = Tasa::all()->first();

        return view('admin.parametros.edit', compact('tasa'));
    }

    public function updatetasa(Request $request) {

        $tasa = Tasa::all()->first();
        $tasa->update($request->all());

        Session::flash('message', 'Tasa actualizada !' );
        Session::flash('alert-class', 'alert-success');
        Session::flash('alert-type', 'success');

        return view('admin.parametros.edit', compact('tasa'));

    }

}
