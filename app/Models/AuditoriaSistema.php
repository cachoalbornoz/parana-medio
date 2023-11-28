<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditoriaSistema extends Model {

    public $timestamps = false;

    protected $table = 'auditoria_sistema';

    protected $fillable = ['id', 'codigo', 'tabla', 'usuario', 'created_at'];

    public function codigo(){

        return $this->belongsTo(\App\Models\TipoAuditoria::class, 'codigo', 'id');
    }

    public function usuario(){

        return $this->belongsTo(\App\User::class, 'usuario', 'id');
    }




}
