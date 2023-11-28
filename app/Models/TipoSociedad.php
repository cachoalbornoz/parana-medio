<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSociedad extends Model
{
    public $timestamps = false;

    protected $table = 'tipo_sociedad';

    protected $fillable = ['id', 'sociedad'];
}
