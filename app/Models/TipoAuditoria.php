<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAuditoria extends Model {

    public $timestamps = false;

    protected $table = 'tipo_auditoria';

    protected $fillable = ['id', 'tipo'];

    public function setTipoAttribute($value)
    {
        $this->attributes['tipo'] = strtoupper($value);
    }

}
