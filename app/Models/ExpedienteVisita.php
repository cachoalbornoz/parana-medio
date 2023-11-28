<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteVisita extends Model
{

    public $timestamps = false;

    protected $table = 'expediente_visita';

    protected $fillable = [
        'fecha',
        'expediente',
        'fecha',
        'motivo',
        'responsable',
        'resultado',
    ];

    public function expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }
}