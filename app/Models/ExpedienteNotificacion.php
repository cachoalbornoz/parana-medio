<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteNotificacion extends Model
{

    public $timestamps = false;

    protected $table = 'expediente_notificacion';

    protected $fillable = [
        'fecha',
        'expediente',
        'asociado',
        'parentesco',
        'notificacion',
        'tipopostal',
        'monto',
        'recibe',
        'dni'
    ];

    public function expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function asociado()
    {
        return $this->belongsTo(\App\User::class, 'asociado', 'id');
    }

    public function parentesco()
    {
        return $this->belongsTo(\App\Models\TipoParentesco::class, 'parentesco', 'id');
    }

    public function notificacion()
    {
        return $this->belongsTo(\App\Models\TipoNotificacion::class, 'notificacion', 'id');
    }

    public function tipopostal()
    {
        return $this->belongsTo(\App\Models\TipoPostal::class, 'tipopostal', 'id');
    }
}