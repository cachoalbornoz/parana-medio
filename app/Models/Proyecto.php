<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    public $timestamps = true;

    protected $table = 'proyecto';

    protected $fillable = [

        'titular',
        'empresa',
        'estado',
        'denominacion',
        'resumenejecutivo',
        'monto',
        'destino',
        'esliderMujer',
        'descripcion',
        'objetivos',
        'oportunidad',
        'desarrollo',
        'historia',
        'presente',
        'propio',
        'alquilado',
        'ctecnicas',
        'ctecnologicas',
        'pproductivos',
        'mprimas',
        'subprocesos',
        'mercado',
        'clientes',
        'competencia',
        'proveedores',
        'riesgos',
        'destinomonto',
        'personal',
        'impacto',
        'precios',
        'fortalezas',
        'oportunidades',
        'debilidades',
        'amenazas',
        'activo'
    ];

    public function setDenominacionAttribute($value)
    {
        $this->attributes['denominacion'] = strtoupper($value);
    }

    public function titular()
    {
        return $this->belongsTo(\App\User::class, 'titular', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function documentacion()
    {
        return $this->hasOne(\App\Models\Documentacion::class, 'proyecto');
    }

    public function planilla()
    {
        return $this->hasOne(\App\Models\ProyectoPlanilla::class, 'proyecto');
    }

    public function evaluacion()
    {
        return $this->hasOne(\App\Models\Evaluacion::class, 'proyecto');
    }

    public function users()
    {
        return $this->belongsToMany(\App\User::class, ProyectoUser::class);
    }

    public function TieneVacios()
    {
        $attributes = $this->getAttributes();
        $vacios     = array();
        foreach ($attributes as $key => $value) {
            if (is_null($value)) {
                $vacios[] = $value;
                break;
            }
        }
        return (count($vacios) > 0) ? true : false;
    }

    public function canEdit()
    {
        if ($this->estado == 19 or $this->estado == 20) {
            return true;
        }
        return false;
    }

    public function enviado()
    {
        $this->estado = 24;
        $this->save();
    }

    public function cargando()
    {
        $this->estado = 19;
        $this->save();
    }

    public function getDenominacionCompletaAttribute($value)
    {
        return $this->Titular->NombreCompleto . '(' . $this->Titular->dni . ') ' . $this->denominacion;
    }
}
