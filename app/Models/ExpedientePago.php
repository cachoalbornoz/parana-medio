<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedientePago extends Model
{

    public $timestamps = false;

    protected $table = 'expediente_pago';

    protected $fillable = ['expediente', 'fecha', 'monto', 'nro_operacion', 'cuenta', 'tipopago'];

    public function Expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function Tipopago()
    {
        return $this->belongsTo(\App\Models\TipoPago::class, 'tipopago', 'id');
    }
}
