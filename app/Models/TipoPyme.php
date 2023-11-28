<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPyme extends Model {

    public $timestamps = false;

    protected $table = 'tipo_pyme';

    protected $fillable = ['id', 'pyme'];



}
