<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoNotificacion extends Model
{

    public $timestamps = false;

    protected $table = 'tipo_notificacion';

    protected $fillable = ['id', 'notificacion'];
}