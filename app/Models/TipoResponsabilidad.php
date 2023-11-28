<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoResponsabilidad extends Model {

    public $timestamps = false;

    protected $table = 'tipo_responsabilidad';

    protected $fillable = ['id', 'responsabilidad'];



}
