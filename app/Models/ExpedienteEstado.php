<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteEstado extends Model
{

    public $timestamps = false;

    protected $table = 'expediente_estado';

    protected $fillable = ['expediente', 'estado', 'estadoAnt', 'fecha'];

    public function expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function estadoAnt()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estadoAnt', 'id');
    }
}