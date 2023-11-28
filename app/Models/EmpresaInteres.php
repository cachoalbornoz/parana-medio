<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaInteres extends Model
{

    public $timestamps = false;

    protected $table = 'empresa_interes';

    protected $fillable = ['empresa', 'interes', 'fecha'];

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa', 'id');
    }

    public function intereses()
    {        
        $interes = TipoInteres::find($this->interes);
        return ($interes) ? $interes : null;
    }
}