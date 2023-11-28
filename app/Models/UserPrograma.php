<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrograma extends Model
{

    public $timestamps = true;

    protected $table = 'user_programa';

    protected $fillable = ['user', 'programa', 'habilitado'];

    public function user()
    {
        return $this->belongsToMany(\App\User::class, 'user_programa', 'user', 'programa')
            ->withPivot('habilitado')
            ->withTimestamps();
    }

    public function programa()
    {
        return $this->belongsTo(\App\Models\TipoPrograma::class, 'programa', 'id');
    }
}