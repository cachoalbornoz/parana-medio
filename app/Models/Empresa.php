<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class Empresa extends Model
{
    public $timestamps = true;
    protected $table = 'empresa';

    protected $fillable = [
        'id',
        'razon_social',
        'titular',
        'estado',
        'cuit',
        'email',
        'tipo_sociedad',
        'tipopyme',
        'categoria1',
        'codigoafip1',
        'actividad1',
        'categoria2',
        'codigoafip2',
        'actividad2',
        'fecha_inscripcion',
        'fecha_inicio',
        'codarea',
        'telefono',
        'direccion',
        'ciudad',
        'direccion_actividad',
        'ciudad_actividad',
        'representante',
        'url',
        'observaciones',
        'activo',
    ];

    public function titular()
    {
        return $this->belongsTo(\App\User::class, 'titular', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(\App\User::class, 'empresa_user', 'empresa_id', 'user_id');
    }

    public function setRazonSocialAttribute($value)
    {
        $this->attributes['razon_social'] = strtoupper($value);
    }

    public function intereses()
    {	
        $interes = DB::table('empresa')
            ->join('empresa_interes', 'empresa.id', '=', 'empresa_interes.empresa')
            ->join('tipo_interes', 'tipo_interes.id', '=', 'empresa_interes.interes')
            ->where('empresa.id', '=', $this->id)
            ->select('tipo_interes.interes')
            ->orderByDesc('empresa_interes.id')
            ->first();

        return ($interes) ? $interes->interes : null;
    }

    public function financiamientos()
    {
        return $this->belongsToMany(\App\Models\TipoFinanciamiento::class, 'empresa_financiamiento', 'empresa', 'financiamiento');
    }

    public function estado()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function tiposociedad()
    {
        return $this->belongsTo(\App\Models\TipoSociedad::class, 'tipo_sociedad', 'id');
    }

    public function tipopyme()
    {
        return $this->belongsTo(\App\Models\TipoPyme::class, 'tipopyme', 'id');
    }

    public function categoria1()
    {
        return $this->belongsTo(\App\Models\TipoCategoria::class, 'categoria1', 'id');
    }

    public function categoria2()
    {
        return $this->belongsTo(\App\Models\TipoCategoria::class, 'categoria2', 'id');
    }

    public function ciudad()
    {
        return $this->belongsTo(\App\Models\CiudadAll::class, 'ciudad', 'id');
    }

    public function ciudadactividad()
    {
        return $this->belongsTo(\App\Models\CiudadAll::class, 'ciudad_actividad', 'id');
    }

    public function proyectos()
    {
        return $this->hasMany(\App\Models\Proyecto::class, 'empresa');
    }

    public function documentacion()
    {
        return $this->hasManyThrough(\App\Models\Documentacion::class, \App\Models\Proyecto::class);
    }

    public function documentacione()
    {
        return $this->hasMany(\App\Models\DocumentacionEmpleo::class, 'empresa');
    }

    public function completa()
    {
        $columns = $this->getFillable();
        $attributes = $this->getAttributes();
        $arrEmpresa = [];

        foreach ($attributes as $campo) {
            if (is_null($campo) || strlen($campo) == 0) {
                $arrEmpresa[] = $campo;
            }
        }
        return (count($arrEmpresa) == 0) ? true : false;
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
