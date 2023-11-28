<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostoVariable extends Model {

    public $timestamps = false;

    protected $table = 'costo_variable';

    protected $fillable = ['proyecto', 'cvdescripcion', 'cvcosto', 'cvano'];

    public function Proyecto() {

        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto', 'id');
    }

}
