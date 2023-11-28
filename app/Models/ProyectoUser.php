<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoUser extends Model
{
    public $timestamps = false;

    protected $table = 'proyecto_user';

    protected $fillable = [
        'proyecto_id',
        'user_id',
    ];

    public function proyectos()
    {
        return $this->belongsTo(\App\Models\Proyecto::class);
    }

    public function users()
    {
        return $this->belongsTo(\App\User::class);
    }

}
