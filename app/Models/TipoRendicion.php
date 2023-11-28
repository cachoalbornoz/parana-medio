<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRendicion extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_rendicion';

    protected $fillable = ['id', 'rendicion'];

    public function setComprobanteAttribute($value)
    {
        $this->attributes['comprobante'] = strtoupper($value);
    }
}