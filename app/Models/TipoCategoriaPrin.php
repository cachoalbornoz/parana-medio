<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCategoriaPrin extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_categoria';

    protected $fillable = ['id', 'categoria'];
}