<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostoFijo extends Model {

    public $timestamps = false;

    protected $table = 'costo_fijo';

    protected $fillable = ['proyecto', 'cfdescripcion', 'cfcosto', 'cfano'];

    public function Proyecto() {

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

}
