<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngresoVenta extends Model {

    public $timestamps = false;

    protected $table = 'ingreso_venta';

    protected $fillable = ['proyecto', 'ivdescripcion', 'ivano', 'ivcantidad', 'ivcosto', 'ivtotal'];

    public function Proyecto() {

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::saving(function($model){
            $model->ivtotal = $model->ivcosto * $model->ivcantidad;
        });
    }

}
