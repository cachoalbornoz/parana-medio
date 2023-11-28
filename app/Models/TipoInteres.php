<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoInteres extends Model {

    public $timestamps = false;

    protected $table = 'tipo_interes';

    protected $fillable = ['id', 'interes'];

}
