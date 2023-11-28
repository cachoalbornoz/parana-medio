<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticiaCategoria extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_noticia';
    protected $fillable = ['id', 'categoria', 'active'];
}
