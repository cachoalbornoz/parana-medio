<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteEmpresa extends Model {

    public $timestamps = false;

    protected $table = 'expediente_empresa';

    protected $fillable = ['expediente', 'empresa'];

    public function expediente(){

        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function empresa(){

        return $this->belongsTo(\App\Models\Empresa::class, 'empresa', 'id');
    }



}