<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRubro extends Model {

    public $timestamps = false;

    protected $table = 'tipo_rubro';

    protected $fillable = ['id', 'rubro'];

}