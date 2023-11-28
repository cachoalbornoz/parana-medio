<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteUser extends Model
{

    public $timestamps = false;

    protected $table = 'expediente_user';

    protected $fillable = ['id', 'expediente_id', 'user_id'];

    public function expediente()
    {
        return $this->belongsTo(\App\Models\Expediente::class, 'expediente', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user', 'id');
    }
}