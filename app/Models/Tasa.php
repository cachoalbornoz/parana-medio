<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasa extends Model {

    public $timestamps = false;

    protected $table = 'tasa';

    protected $fillable = ['id', 'descripcion', 'tasa'];


}
