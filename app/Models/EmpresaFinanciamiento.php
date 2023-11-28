<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaFinanciamiento extends Model
{

    public $timestamps = false;

    protected $table = 'empresa_financiamiento';

    protected $fillable = ['empresa', 'financiamiento'];

    public function empresa()
    {

        return $this->belongsTo(\App\Models\Empresa::class, 'empresa', 'id');
    }

    public function financiamiento()
    {

        return $this->belongsTo(\App\Models\TipoFinanciamiento::class, 'financiamiento', 'id');
    }
}
