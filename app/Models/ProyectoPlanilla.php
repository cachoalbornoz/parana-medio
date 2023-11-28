<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoPlanilla extends Model
{

    public $timestamps = false;

    protected $table = 'proyecto_planilla';

    protected $fillable = ['proyecto', 'estado', 'rp', 'cf', 'cv', 'ff', 'iv'];

    public function proyecto()
    {

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

    public function estado()
    {

        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function camposVacios()
    {

        $attributes = $this->getAttributes();
        $vacios     = array();
        foreach ($attributes as $key => $value) {
            if (is_null($value)) {
                $vacios[] = $value;
                break;
            }
        }
        return count($vacios);
    }

    public function enviado()
    {
        $this->estado = 24;
        $this->save();
    }

    public function cargando()
    {
        $this->estado = 19;
        $this->save();
    }
}