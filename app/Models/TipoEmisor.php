<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEmisor extends Model {

    public $timestamps = false;

    protected $table = 'tipo_emisor';

    protected $fillable = ['id', 'emisor'];

    public function setEmisorAttribute($value)
    {
        $this->attributes['emisor'] = strtoupper($value);
    }



}
