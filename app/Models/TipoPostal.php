<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPostal extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_postal';

    protected $fillable = ['id', 'postal'];
}