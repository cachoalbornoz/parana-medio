<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CiudadAll extends Model {

    public $timestamps = false;

    protected $table = 'ciudad_all';

    protected $fillable = ['id', 'nombre', 'departamento'];

    public function departamento() {
        return $this->belongsTo(\App\Models\Departamento::class, 'departamento', 'id');
    }

}
