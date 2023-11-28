<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumenPresupuestario extends Model {

    public $timestamps = false;

    protected $table = 'resumen_presupuestario';

    protected $fillable = ['proyecto', 'rpdescripcion', 'rpcantidad', 'rpcosto', 'rptotal'];

    public function Proyecto() {

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::saving(function($model){
            $model->rptotal = $model->rpcosto * $model->rpcantidad;
        });
    }

}
