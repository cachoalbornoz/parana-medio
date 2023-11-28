<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    public $timestamps = true;

    protected $table = 'expediente';

    protected $fillable = [
        'id',
        'titular',
        'proyecto',
        'nro_expediente',
        'nro_exp_madre',
        'nro_exp_control',
        'monto',
        'monto_devolver',
        'saldo',
        'rubro',
        'estado',
        'observaciones',
        'fecha_otorgamiento',
        'ciudad'
    ];

    public function titular()
    {
        return $this->belongsTo(\App\User::class, 'titular', 'id');
    }

    public function proyecto()
    {
        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

    public function rubro()
    {
        return $this->belongsTo(\App\Models\TipoRubro::class, 'rubro', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function ciudad()
    {
        return $this->belongsTo(\App\Models\CiudadAll::class, 'ciudad', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(\App\User::class, 'expediente_user', 'expediente_id', 'user_id');
    }

    public function ubicaciones()
    {
        return $this->belongsToMany(\App\Models\TipoUbicacion::class, 'expediente_ubicacion', 'expediente', 'ubicacion');
    }
}
