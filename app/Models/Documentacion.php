<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{

    public $timestamps = true;

    protected $table = 'documentacion';

    protected $fillable = [
        'id',
        'proyecto',
        'estado',
        'dnifrente',
        'dnifrentec',
        'dnidorso',
        'dnidorsoc',
        'domiciliolegal',
        'domiciliolegalc',
        'afip',
        'afipc',
        'ater',
        'aterc',
        'muni',
        'munic',
        'mipyme',
        'mipymec',
        'estatuto',
        'estatutoc',
        'acta',
        'actac',
        'poder',
        'poderc',
        'personeria',
        'personeriac',
        'estadocontable',
        'estadocontablec',
    ];

    public function proyecto()
    {

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

    public function estado()
    {

        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function personaCompleta()
    {

        $tipopersona = $this->Proyecto->Empresa->tipo_sociedad;

        if (in_array($tipopersona, ['0'])) {
            return (!empty($this->dnifrente) && !empty($this->dnidorso)
                && !empty($this->afip) && !empty($this->ater) && !empty($this->muni) && !empty($this->mipyme)) ? 1 : 0;
        } else {
            return (!empty($this->estatuto) && !empty($this->acta) && !empty($this->poder)
                && !empty($this->personeria) && !empty($this->estadocontable) && !empty($this->mipyme)) ? 1 : 0;
        }
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
