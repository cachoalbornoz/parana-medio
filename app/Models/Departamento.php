<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

    public $timestamps = false;

    protected $table = 'departamento';

    protected $fillable = ['id', 'nombre', 'provincia'];


    public function provincia() {
        return $this->belongsTo(\App\Models\Provincia::class, 'provincia', 'id');
    }

}
