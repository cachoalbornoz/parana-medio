<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model {

    public $timestamps = false;

    protected $table = 'ciudad';

    protected $fillable = ['id', 'nombre', 'departamento'];


}
