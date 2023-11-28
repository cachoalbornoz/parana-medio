<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoFinanciamiento extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_financiamiento';

    protected $fillable = ['id', 'financiamiento'];
}