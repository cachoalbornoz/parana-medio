<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoParentesco extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_parentesco';

    protected $fillable = ['id', 'parentesco'];
}