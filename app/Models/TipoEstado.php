<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model {

    public $timestamps = false;

    protected $table = 'tipo_estado';

    protected $fillable = ['id', 'estado', 'icono'];



}
