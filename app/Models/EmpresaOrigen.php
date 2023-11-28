<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaOrigen extends Model {

    public $timestamps = false;

    protected $table = 'empresa_origen';

    protected $fillable = ['empresa', 'origen', 'emisor', 'descripcion', 'fecha'];

    public function empresa(){

        return $this->belongsTo(\App\Models\Empresa::class, 'empresa', 'id');
    }

    public function origen(){

        return $this->belongsTo(\App\Models\TipoOrigen::class, 'origen', 'id');
    }

    public function emisor(){

        return $this->belongsTo(\App\Models\TipoEmisor::class, 'emisor', 'id');
    }

}
