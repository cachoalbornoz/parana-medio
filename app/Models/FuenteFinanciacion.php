<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuenteFinanciacion extends Model {

    public $timestamps = false;

    protected $table = 'fuente_financiacion';

    protected $fillable = ['proyecto', 'ffdescripcion', 'ffmonto', 'ffano'];

    public function Proyecto() {

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

}
