<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('inicio', function ($trail) {
    $trail->push('Inicio', route('home'));
});

//// CUOTA
Breadcrumbs::for('cuota', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Forma pago', route('cuota.index', $expediente->id));
});

//// NOTICIAS
Breadcrumbs::for('noticia', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Noticias', route('noticias.index'));
});

//// PAGO
Breadcrumbs::for('pago', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Pagos', route('pago.index', $expediente->id));
});

//// VISITA
Breadcrumbs::for('visita', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Visita', route('visita.index', $expediente->id));
});

//// NOTIFICACION
Breadcrumbs::for('notificacion', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Notificacion', route('notificacion.index', $expediente->id));
});

//// ESTADO EXPEDIENTE
Breadcrumbs::for('estado', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Estado', route('estado.index', $expediente->id));
});

//// RENDICION
Breadcrumbs::for('rendicion', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Rendicion', route('rendicion.index', $expediente->id));
});

//// UBICACION
Breadcrumbs::for('ubicacion', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Ubicacion', route('ubicacion.index', $expediente->id));
});

//// EMPRENDEDOR
Breadcrumbs::for('emprendedor', function ($trail, $expediente) {
    $trail->parent('inicio');
    $trail->push('Emprendedor', route('emprendedor.index', $expediente->id));
});

//// EXPEDIENTE
Breadcrumbs::for('expediente', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Expediente', route('expediente.index'));
});

Breadcrumbs::for('expediente.create', function ($trail) {
    $trail->parent('expediente');
    $trail->push('Editar ', route('expediente.index'));
});

///// TASA
Breadcrumbs::for('editasa', function ($trail) {
    $trail->push('Tasa', route('home'));
});

//// EVALUACION
Breadcrumbs::for('evaluacion', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Evaluacion', route('evaluacion.index'));
});

Breadcrumbs::for('evaluacion.edit', function ($trail, $evaluacion) {
    $trail->parent('evaluacion');
    $trail->push($evaluacion->id);
    $trail->push('Editar', route('evaluacion.edit', $evaluacion->id));
});

//// DOCUMENTACION
Breadcrumbs::for('documentacion', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Documentacion', route('documentacion.index'));
});

Breadcrumbs::for('documentacion.edit', function ($trail, $documentacion) {
    $trail->parent('documentacion');
    $trail->push($documentacion->id);
    $trail->push('Editar', route('documentacion.edit', $documentacion->id));
});

//// PROYECTO
Breadcrumbs::for('proyecto', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Proyecto', route('proyecto.index'));
});

Breadcrumbs::for('proyecto.create', function ($trail) {
    $trail->parent('proyecto');
    $trail->push('Crear', route('proyecto.create'));
});

Breadcrumbs::for('proyecto.edit', function ($trail, $proyecto) {
    $trail->parent('proyecto');
    $trail->push($proyecto->id);
    $trail->push('Editar', route('proyecto.edit', $proyecto->id));
});

Breadcrumbs::for('proyecto.send', function ($trail, $proyecto) {
    $trail->parent('proyecto');
    $trail->push($proyecto->id);
    $trail->push('Estado envio', route('proyecto.index'));
});

//// ASOCIADO
Breadcrumbs::for('asociado', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Asociado', route('asociado.index'));
});

Breadcrumbs::for('asociado.create', function ($trail) {
    $trail->parent('asociado');
    $trail->push('Crear', route('asociado.create'));
});

Breadcrumbs::for('asociado.edit', function ($trail, $asociado) {
    $trail->parent('asociado');
    $trail->push($asociado->id);
    $trail->push('Editar', route('asociado.edit', $asociado->id));
});

//// EMPRESA ADMIN
Breadcrumbs::for('empresaadmin', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Empresa ', route('empresa.indexAdmin'));
});

Breadcrumbs::for('empresa.Admin', function ($trail) {
    $trail->parent('empresaadmin');
    $trail->push('Listar', route('home'));
});

Breadcrumbs::for('empresa.createAdmin', function ($trail) {
    $trail->parent('empresaadmin');
    $trail->push('Crear empresa', route('home'));
});

Breadcrumbs::for('empresa.editAdmin', function ($trail, $empresa) {
    $trail->parent('empresaadmin');
    $trail->push($empresa->id);
    $trail->push('Editar', route('empresa.edit', $empresa->id));
});

//// EMPRESA
Breadcrumbs::for('empresa', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Empresa ', route('empresa.index'));
});

Breadcrumbs::for('empresa.create', function ($trail) {
    $trail->parent('empresa');
    $trail->push('Crear empresa', route('home'));
});

Breadcrumbs::for('empresa.edit', function ($trail, $empresa) {
    $trail->parent('empresa');
    $trail->push($empresa->id);
    $trail->push('Editar', route('empresa.edit', $empresa->id));
});

//// PERMISOS
Breadcrumbs::for('permisos', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Permisos', route('permisos.index'));
});

Breadcrumbs::for('permisos.create', function ($trail) {
    $trail->parent('permisos');
    $trail->push('Crear', route('permisos.create'));
});

Breadcrumbs::for('permisos.edit', function ($trail, $permiso) {
    $trail->parent('permisos');
    $trail->push($permiso->id);
    $trail->push('Editar', route('permisos.edit', $permiso->id));
});

//// ROLES
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles');
    $trail->push('Crear', route('roles.create'));
});

Breadcrumbs::for('roles.edit', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push($role->id);
    $trail->push('Editar', route('roles.edit', $role->id));
});

//// USUARIOS
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Usuarios', route('users.index'));
});

Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users');
    $trail->push('Crear', route('users.create'));
});

Breadcrumbs::for('users.edit', function ($trail, $users) {
    $trail->parent('inicio');
    $trail->push($users->id);
    $trail->push('Editar', route('users.edit', $users->id));
});

Breadcrumbs::for('users.profile', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Cambio imagen', route('users.index'));
});

Breadcrumbs::for('users.clave', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Cambio clave', route('users.index'));
});
