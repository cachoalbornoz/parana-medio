<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_pago';

    protected $fillable = ['id', 'pago'];
}