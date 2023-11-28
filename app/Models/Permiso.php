<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model {

    public $timestamps = true;

    protected $table = 'permissions';
    
    protected $fillable = ['id', 'name', 'guard_name'];

}
