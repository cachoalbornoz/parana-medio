<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoOrigen extends Model {

    public $timestamps = false;

    protected $table = 'tipo_origen';

    protected $fillable = ['id', 'origen'];



}
