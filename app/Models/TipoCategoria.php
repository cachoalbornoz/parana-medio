<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCategoria extends Model {

    public $timestamps = false;

    protected $table = 'tipo_categoria';

    protected $fillable = ['id', 'categoria'];

    public function setCategoriaAttribute($value)
    {
        $this->attributes['categoria'] = strtoupper($value);
    }

}
