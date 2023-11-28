<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstadoSeguimiento extends Model {

    public $timestamps = false;

    protected $table = 'tipo_estado_seguimiento';

    protected $fillable = ['id', 'estado', 'color'];



}
