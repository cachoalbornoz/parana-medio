<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'apellido',
        'nombre',
        'dni',
        'fechanac',
        'nacionalidad',
        'email',
        'direccion',
        'ciudad',
        'cp',
        'codarea',
        'telefono',
        'password',
        'image',
        'habilitado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->assignRole('user');
        });
    }

    public function setApellidoAttribute($value)
    {
        $this->attributes['apellido'] = strtoupper($value);
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function getNombreCompletoAttribute($value)
    {
        return $this->apellido . ', ' . $this->nombre;
    }

    public function puedeEditar()
    {
        $proyectos = $this->proyectos;

        $bandera = true;

        foreach ($proyectos as $proyecto) {
            if ($proyecto->estado == 24) {
                $bandera = false;
                break;
            }
        }

        return $bandera;
    }

    public function tieneRol()
    {
        $roles = ' ';
        foreach ($this->roles as $role) {
            $roles = $roles . $role->name . ' ';
        }
        return $roles;
    }

    public function ciudad()
    {
        return $this->belongsTo(\App\Models\CiudadAll::class, 'ciudad');
    }

    public function proyectos()
    {
        return $this->belongsToMany(\App\Models\Proyecto::class, 'proyecto_user');
    }

    public function empresas()
    {
        return $this->belongsToMany(\App\Models\Empresa::class, 'empresa_user');
    }

    public function expedientes()
    {
        return $this->belongsToMany(\App\Models\Expediente::class, 'expediente_user');
    }

    public function programas()
    {
        return $this->belongsToMany(\App\Models\UserPrograma::class, 'user_programa', 'user', 'programa');
    }
}