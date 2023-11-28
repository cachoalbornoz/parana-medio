<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentacionEmpleo extends Model
{
    public $timestamps = true;

    protected $table = 'documentacion_empleo';

    protected $fillable = [
        'id',
        'empresa',
        'empleado',
        'estado',
        'fondep',
        'cbu',
        'attrabajador',
        'certdiscapacidad',
    ];

    public function empresa()
    {
        return $this->belongsTo(\App\Models\EmpresaEmpleo::class, 'empresa', 'id');
    }

    public function setEmpleadoAttribute($value)
    {
        $this->attributes['empleado'] = strtoupper($value);
    }

    public function estado()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function completa()
    {
        $columns    = $this->getFillable();
        $attributes = $this->getAttributes();
        $arrTabla   = [];

        foreach ($attributes as $campo) {
            if (is_null($campo) || strlen($campo) == 0) {
                $arrTabla[] = $campo;
            }
        }
        return (count($arrTabla) == 0) ? true : false;
    }

    public function personaCompleta()
    {
        return (!empty($this->empleado) && !empty($this->fondep) && !empty($this->cbu) && !empty($this->attrabajador)) ? 1 : 0;
    }

    public function canEdit()
    {
        if ($this->estado == 19 or $this->estado == 20) {
            return true;
        }
        return false;
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
