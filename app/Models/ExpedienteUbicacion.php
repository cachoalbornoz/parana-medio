<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteUbicacion extends Model
{

    public $timestamps = false;

    protected $table = 'expediente_ubicacion';

    protected $fillable = ['expediente', 'ubicacion', 'fecha', 'observacion'];

    public function setObservacionAttribute($value)
    {
        $this->attributes['observacion'] = strtoupper($value);
    }

    public function expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function ubicacion()
    {
        return $this->belongsTo(\App\Models\TipoUbicacion::class, 'ubicacion', 'id');
    }
}