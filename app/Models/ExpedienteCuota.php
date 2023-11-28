<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteCuota extends Model
{
    public $timestamps = false;

    protected $table = 'expediente_cuota';

    protected $fillable = ['expediente', 'pago', 'nroCuota', 'fechaVcto', 'monto', 'estado', 'manual', 'entregaParcial'];

    public function expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function pago()
    {
        return $this->belongsTo(\App\Models\ExpedientePago::class, 'pago', 'id');
    }
}
