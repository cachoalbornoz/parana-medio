<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaSeguimiento extends Model
{

    public $timestamps = false;

    protected $table = 'empresa_seguimiento';

    protected $fillable = ['empresa', 'fecha_registro', 'fecha_pactada', 'respuesta', 'envia', 'tipo', 'usuario', 'estado', 'estadoTipo', 'financiamiento'];

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa', 'id');
    }

    public function tipo()
    {
        return $this->belongsTo(\App\Models\TipoOrigen::class, 'tipo', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(\App\User::class, 'usuario', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(\App\Models\TipoEstadoSeguimiento::class, 'estado', 'id');
    }

    public function estadotipo()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estadoTipo', 'id');
    }

    public function financiamiento()
    {
        return $this->belongsTo(\App\Models\TipoFinanciamiento::class, 'financiamiento', 'id');
    }
}