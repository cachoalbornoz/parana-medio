<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMiPyme extends Model {

    public $timestamps = false;

    protected $table = 'tipo_mipyme';

    protected $fillable = ['id', 'mipyme'];



}
