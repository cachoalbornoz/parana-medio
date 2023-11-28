<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaUser extends Model
{

    public $timestamps = false;

    protected $table = 'empresa_user';

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\user::class);
    }
}
