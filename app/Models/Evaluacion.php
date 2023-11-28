<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model {

    public $timestamps = true;

    protected $table = 'evaluacion';

    protected $fillable = [
        'id',
        'proyecto',
        'evaluador',
        'estado',
        'fecha',
        'resultado',
        'comentario',
        'puntaje1',
        'observacion1',
        'puntaje2',
        'observacion2',
        'puntaje3',
        'observacion3',
        'puntaje4',
        'observacion4',
        'puntaje5',
        'observacion5',
        'puntaje6',
        'observacion6',
        'puntaje7',
        'observacion7',
        'puntaje8',
        'observacion8',
    ];

    public function proyecto(){

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

    public function evaluador(){

        return $this->belongsTo(\App\User::class, 'evaluador', 'id');
    }

    public function estado() {

        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function enviado(){
        $this->estado = 24;
        $this->save();
    }

    public function cargando(){
        $this->estado = 19;
        $this->save();
    }

}
