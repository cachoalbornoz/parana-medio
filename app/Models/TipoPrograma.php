<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPrograma extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_programa';

    protected $fillable = ['programa', 'tipoPrograma', 'activo'];
}