<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model {

    public $timestamps = false;

    protected $table = 'pais';

    protected $fillable = ['id', 'iso', 'nombre'];


}
