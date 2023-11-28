<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteRendicion extends Model
{

    public $timestamps = false;

    protected $table = 'expediente_rendicion';

    protected $fillable = ['expediente', 'rendicion', 'fecha', 'importe'];

    public function expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function rendicion()
    {
        return $this->belongsTo(\App\Models\TipoRendicion::class, 'rendicion', 'id');
    }
}