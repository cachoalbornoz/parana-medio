<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'InicioController@frontend')->name('inicio');
Route::get('index', 'InicioController@frontend')->name('inicio');

Route::group(['middleware' => 'preventBackHistory'], function () {
    Route::get('password-reset', 'PasswordController@showForm');
    Route::post('password-reset', 'PasswordController@sendPasswordResetToken')->name('password-reset');
    Route::get('reset-password/{token}', 'PasswordController@showPasswordResetForm');
    Route::post('reset-password/', 'PasswordController@resetPassword')->name('reset-password');

    Auth::routes();

    Route::get('/registro', 'InicioController@registro')->name('registro');

    Route::get('/programareactivacion', 'InicioController@programareactivacion')->name('programarp');
    Route::get('/mipymes', 'InicioController@programasp')->name('programasp');
    Route::get('/pafinanciera', 'InicioController@pafinanciera')->name('pafinanciera');
    Route::get('/patecnica', 'InicioController@patecnica')->name('patecnica');
    Route::get('/lineasbancarias', 'InicioController@pcapitalTrabajo')->name('pcapitalTrabajo');
    Route::get('/lineas/proyectos-estrategicos', 'InicioController@pEstrategicos')->name('pestrategicos');

    Route::get('/pcooperativas', 'InicioController@pcooperativas')->name('pcooperativas');
    Route::get('/noticias', 'NoticiaController@publicacion')->name('noticias.publicacion');

    Route::get('/desarrollo', ['uses' => 'InicioController@desarrollo', 'as' => 'desarrollo']);

    Route::get('/limpiar', ['uses' => 'InicioController@limpiar', 'as' => 'limpiar']);

    Route::post('/calcular', ['uses' => 'InicioController@calcular', 'as' => 'calcular']);
    Route::get('/calculadora', ['uses' => 'InicioController@calculadora', 'as' => 'calculadora']);

    Route::get('/somos', ['uses' => 'InicioController@somos', 'as' => 'somos']);

    Route::get('/verificaDni', ['uses' => 'InicioController@verificaDni', 'as' => 'verificaDni']);

    //////////// CIUDAD
    Route::get('/ciudad/buscarciudad/{id}', 'CiudadController@buscarciudad')->name('ciudad.buscar');
    Route::get('/ciudad/buscarciudadn/{id}', 'CiudadController@buscarciudadn')->name('ciudadn.buscar');
    Route::get('/ciudad/buscardepartamento/{id}', 'CiudadController@buscardepartamento')->name('departamento.buscar');
    Route::get('/ciudad/create', 'CiudadController@create')->name('ciudad.create');
    Route::post('/ciudad/insert', 'CiudadController@insert')->name('ciudad.insert');

    Route::get('/registro', 'InicioController@registro')->name('registro');
    Route::post('/registro/Emp', 'InicioController@createEmp')->name('registroEmp');

    Route::middleware(['auth'])->group(function () {

        //////////// HOME
        Route::get('/home', ['uses' => 'InicioController@index', 'as' => 'home']);

        //////////// NOTICIAS
        Route::get('/noticias/list', 'NoticiaController@index')->name('noticias.index');
        Route::get('/noticias/create', 'NoticiaController@create')->name('noticias.create');
        Route::post('/noticias/store', 'NoticiaController@store')->name('noticias.store');
        Route::get('/noticias/edit', 'NoticiaController@edit')->name('noticias.edit');
        Route::put('/noticias/update', 'NoticiaController@update')->name('noticias.update');
        Route::get('/noticias/publicar', 'NoticiaController@publicar')->name('noticias.publicar');
        Route::post('/noticias/destroy', 'NoticiaController@destroy')->name('noticias.destroy');


        //////////// CUOTAS
        Route::get('/cuota/{id?}', 'CuotaController@index')->name('cuota.index');
        Route::get('/cuota/create/{id?}', 'CuotaController@create')->name('cuota.create');
        Route::post('/cuota/store', 'CuotaController@store')->name('cuota.store');
        Route::post('/cuota/comprobar', 'CuotaController@comprobar')->name('cuota.comprobar');
        Route::get('/cuota/edit/{id}', 'CuotaController@edit')->name('cuota.edit');
        Route::put('/cuota/update/{id}', 'CuotaController@update')->name('cuota.update');
        Route::post('/cuota/destroy', 'CuotaController@destroy')->name('cuota.destroy');
        Route::post('/cuota/borrarPlan/{expediente}', 'CuotaController@borrarPlan')->name('cuota.borrarPlan');

        //////////// PAGOS
        Route::get('/pago/{id?}', 'PagoController@index')->name('pago.index');
        Route::get('/pago/create/{id?}', 'PagoController@create')->name('pago.create');
        Route::post('/pago/store', 'PagoController@store')->name('pago.store');
        Route::get('/pago/edit/{id}', 'PagoController@edit')->name('pago.edit');
        Route::put('/pago/update/{id}', 'PagoController@update')->name('pago.update');
        Route::post('/pago/destroy', 'PagoController@destroy')->name('pago.destroy');

        //////////// VISITAS
        Route::get('/visita/{id?}', 'VisitaController@index')->name('visita.index');
        Route::get('/visita/create/{id?}', 'VisitaController@create')->name('visita.create');
        Route::post('/visita/store', 'VisitaController@store')->name('visita.store');
        Route::get('/visita/edit/{id}', 'VisitaController@edit')->name('visita.edit');
        Route::put('/visita/update/{id}', 'VisitaController@update')->name('visita.update');
        Route::post('/visita/destroy', 'VisitaController@destroy')->name('visita.destroy');

        //////////// NOTIFICACION
        Route::get('/notificacion/{id?}', 'NotificacionController@index')->name('notificacion.index');
        Route::get('/notificacion/create/{id?}', 'NotificacionController@create')->name('notificacion.create');
        Route::post('/notificacion/store', 'NotificacionController@store')->name('notificacion.store');
        Route::get('/notificacion/edit/{id}', 'NotificacionController@edit')->name('notificacion.edit');
        Route::put('/notificacion/update/{id}', 'NotificacionController@update')->name('notificacion.update');
        Route::post('/notificacion/destroy', 'NotificacionController@destroy')->name('notificacion.destroy');

        //////////// ESTADO EXPEDIENTE
        Route::get('/estado/{id?}', 'EstadoController@index')->name('estado.index');
        Route::get('/estado/create/{id?}', 'EstadoController@create')->name('estado.create');
        Route::post('/estado/store', 'EstadoController@store')->name('estado.store');
        Route::get('/estado/edit/{id}', 'EstadoController@edit')->name('estado.edit');
        Route::put('/estado/update/{id}', 'EstadoController@update')->name('estado.update');
        Route::post('/estado/destroy', 'EstadoController@destroy')->name('estado.destroy');

        //////////// RENDICION
        Route::get('/rendicion/{id?}', 'RendicionController@index')->name('rendicion.index');
        Route::get('/rendicion/create/{id?}', 'RendicionController@create')->name('rendicion.create');
        Route::post('/rendicion/store', 'RendicionController@store')->name('rendicion.store');
        Route::get('/rendicion/edit/{id}', 'RendicionController@edit')->name('rendicion.edit');
        Route::put('/rendicion/update/{id}', 'RendicionController@update')->name('rendicion.update');
        Route::post('/rendicion/destroy', 'RendicionController@destroy')->name('rendicion.destroy');

        //////////// UBICACION
        Route::get('/ubicacion/{id?}', 'UbicacionController@index')->name('ubicacion.index');
        Route::get('/ubicacion/create/{id?}', 'UbicacionController@create')->name('ubicacion.create');
        Route::post('/ubicacion/store', 'UbicacionController@store')->name('ubicacion.store');
        Route::get('/ubicacion/edit/{id}', 'UbicacionController@edit')->name('ubicacion.edit');
        Route::put('/ubicacion/update/{id}', 'UbicacionController@update')->name('ubicacion.update');
        Route::post('/ubicacion/destroy', 'UbicacionController@destroy')->name('ubicacion.destroy');

        //////////// EXPEDIENTES
        Route::get('/expediente', 'ExpedienteController@index')->name('expediente.index');
        Route::get('/expediente/create', 'ExpedienteController@create')->name('expediente.create');
        Route::post('/expediente/store', 'ExpedienteController@store')->name('expediente.store');
        Route::get('/expediente/edit/{id}', 'ExpedienteController@edit')->name('expediente.edit');
        Route::put('/expediente/update/{id}', 'ExpedienteController@update')->name('expediente.update');
        Route::post('/expediente/destroy', 'ExpedienteController@destroy')->name('expediente.destroy');

        // 
        Route::get('/resumen/resumen-cuenta', 'PagoController@resumenCta')->name('pago.resumenCta');
        Route::get('/resumen/resumen-cuenta/getpagos', 'PagoController@getPagos')->name('pago.getPagos');

        Route::get('/ingreso/futuro', 'IngresoController@index')->name('ingresos.futuro');
        Route::get('/ingreso/fututo/getingresos', 'IngresoController@getIngresosFuturos')->name('ingresos.getIngresosFuturos');


        //

        //////////// EMISOR
        Route::get('/emisor', 'TipoEmisorController@index')->name('emisor.index');
        Route::get('/emisor/edit/{id?}', 'TipoEmisorController@edit')->name('emisor.edit');
        Route::post('/emisor/accion', 'TipoEmisorController@accion')->name('emisor.accion');

        //////////// ORIGEN
        Route::get('/origen', 'TipoOrigenController@index')->name('origen.index');
        Route::get('/origen/edit/{id?}', 'TipoOrigenController@edit')->name('origen.edit');
        Route::post('/origen/accion', 'TipoOrigenController@accion')->name('origen.accion');

        //////////// AUDITORIA
        Route::get('/auditoria', 'AuditoriaController@index')->name('auditoria.index');
        Route::post('/auditoria/accion', 'AuditoriaController@accion')->name('auditoria.accion');

        //////////// FINANCIAMIENTO
        Route::get('/financiamiento', 'TipoFinanciamientoController@index')->name('financiamiento.index');
        Route::get('/financiamiento/edit/{id?}', 'TipoFinanciamientoController@edit')->name('financiamiento.edit');
        Route::post('/financiamiento/accion', 'TipoFinanciamientoController@accion')->name('financiamiento.accion');

        //////////// CATEGORIA
        Route::get('/categoria', 'TipoCategoriaController@index')->name('categoria.index');
        Route::get('/categoria/edit/{id?}', 'TipoCategoriaController@edit')->name('categoria.edit');
        Route::post('/categoria/accion', 'TipoCategoriaController@accion')->name('categoria.accion');

        //////////// TASA
        Route::get('/tasa/editasa/', 'TasaController@editasa')->name('editasa');
        Route::put('/tasa/updatetasa', 'TasaController@updatetasa')->name('updatetasa');

        /////////// AYUDA
        Route::get('ayuda/', 'AyudaController@index')->name('ayuda');

        ////////// IMPRESIONES
        Route::get('print/evaluacion/{proyecto}', 'PrintController@printEvaluacion')->name('print.evaluacion');
        Route::get('print/proyecto/{proyecto}', 'PrintController@printProyecto')->name('print.proyecto');

        ////////// EVALUACION
        Route::get('evaluacion/', 'EvaluacionController@index')->name('evaluacion.index')->middleware('permission:AdminEvaluacion');
        Route::get('evaluacion/edit/{evaluacion}', 'EvaluacionController@edit')->name('evaluacion.edit')->middleware('permission:AdminEvaluacion');
        Route::put('evaluacion/{evaluacion}', 'EvaluacionController@update')->name('evaluacion.update');

        ////////// DOCUMENTACION
        Route::get('documentacion/revisar/{documentacion}', 'DocumentacionController@revisar')->name('documentacion.revisar');
        Route::put('documentacion/{documentacion}', 'DocumentacionController@update')->name('documentacion.update');
        Route::post('documentacion/estado', 'DocumentacionController@estado')->name('documentacion.estado');
        Route::post('documentacion/estadocontable', 'DocumentacionController@estadocontable')->name('estadocontable');
        Route::post('documentacion/personeria', 'DocumentacionController@personeria')->name('personeria');
        Route::post('documentacion/poder', 'DocumentacionController@poder')->name('poder');
        Route::post('documentacion/acta', 'DocumentacionController@acta')->name('acta');
        Route::post('documentacion/estatuto', 'DocumentacionController@estatuto')->name('estatuto');
        Route::post('documentacion/mipyme', 'DocumentacionController@mipyme')->name('mipyme');
        Route::post('documentacion/muni', 'DocumentacionController@muni')->name('muni');
        Route::post('documentacion/ater', 'DocumentacionController@ater')->name('ater');
        Route::post('documentacion/afip', 'DocumentacionController@afip')->name('afip');
        Route::post('documentacion/domiciliolegal', 'DocumentacionController@domiciliolegal')->name('domiciliolegal');
        Route::post('documentacion/dnidorso', 'DocumentacionController@dnidorso')->name('dnidorso');
        Route::post('documentacion/dnifrente', 'DocumentacionController@dnifrente')->name('dnifrente');
        Route::get('documentacion/edit/{documentacion}', 'DocumentacionController@edit')->name('documentacion.edit');
        Route::get('documentacion/', 'DocumentacionController@index')->name('documentacion.index');

        ////////// PLANILLA
        Route::post('planilla/estado', 'PlanillaController@estado')->name('planilla.estado');
        Route::post('planilla/actualiza', 'PlanillaController@actualiza')->name('planilla.actualiza');

        Route::post('planilla/ivInsert', 'PlanillaController@ivInsert')->name('iv.insert');
        Route::post('planilla/ivDestroy', 'PlanillaController@ivDestroy')->name('iv.destroy');

        Route::post('planilla/ffInsert', 'PlanillaController@ffInsert')->name('ff.insert');
        Route::post('planilla/ffDestroy', 'PlanillaController@ffDestroy')->name('ff.destroy');

        Route::post('planilla/cvInsert', 'PlanillaController@cvInsert')->name('cv.insert');
        Route::post('planilla/cvDestroy', 'PlanillaController@cvDestroy')->name('cv.destroy');

        Route::post('planilla/cfInsert', 'PlanillaController@cfInsert')->name('cf.insert');
        Route::post('planilla/cfDestroy', 'PlanillaController@cfDestroy')->name('cf.destroy');

        Route::post('planilla/resumenInsert', 'PlanillaController@resumenInsert')->name('resumen.insert');
        Route::post('planilla/resumenDestroy', 'PlanillaController@resumenDestroy')->name('resumen.destroy');

        //////////  PROYECTO
        Route::post('proyecto/cambioestado/', 'ProyectoController@cambioestado')->name('proyecto.cambioestado');
        Route::get('proyecto/enviar/{proyecto}', 'ProyectoController@enviar')->name('proyecto.enviar');
        Route::get('proyecto/rehabilitar/{proyecto}', 'ProyectoController@rehabilitar')->name('proyecto.rehabilitar');
        Route::get('proyecto/', 'ProyectoController@index')->name('proyecto.index');
        Route::get('proyecto/create', 'ProyectoController@create')->name('proyecto.create');
        Route::post('proyecto/store', 'ProyectoController@store')->name('proyecto.store');
        Route::get('proyecto/edit/{proyecto}', 'ProyectoController@edit')->name('proyecto.edit');
        Route::put('proyecto/{proyecto}', 'ProyectoController@update')->name('proyecto.update');
        Route::get('proyecto/editAsociados/{proyecto}', 'ProyectoController@editasociados')->name('proyecto.editasociados');
        Route::put('proyecto/updateAsociados/{proyecto}', 'ProyectoController@updateasociados')->name('proyecto.updateasociados');
        Route::get('proyecto/editPlanillas/{proyecto}', 'ProyectoController@editaplanillas')->name('proyecto.editplanillas');
        Route::post('proyecto/destroy', 'ProyectoController@destroy')->name('proyecto.destroy');
        Route::get('proyecto/asociados/{id?}', 'ProyectoController@asociados')->name('proyecto.asociados');
        Route::post('proyecto/vincularasociado', 'ProyectoController@vincularasociado')->name('proyecto.vincularasociado');
        Route::post('proyecto/desvincularasociado', 'ProyectoController@desvincularasociado')->name('proyecto.desvincularasociado');

        //////////  SEGUIMIENTO

        Route::get('seguimiento/{id}', 'SeguimientoController@seguimiento')->name('seguimiento.index');
        Route::get('seguimiento/create/{id}', 'SeguimientoController@create')->name('seguimiento.create');
        Route::post('seguimiento/store', 'SeguimientoController@store')->name('seguimiento.store');
        Route::get('seguimiento/edit/{id}', 'SeguimientoController@edit')->name('seguimiento.edit');
        Route::put('seguimiento/{id}', 'SeguimientoController@update')->name('seguimiento.update');
        Route::post('seguimiento/destroy', 'SeguimientoController@destroy')->name('seguimiento.destroy');

        // EMPRESA EMPLEO
        Route::get('empresa-empleo/indexAdmin', 'EmpresaEmpleoController@indexAdmin')->name('empresaEmpleo.indexAdmin');
        Route::get('empresa-empleo/vincular', 'EmpresaEmpleoController@vincular')->name('empresa.vincular');
        Route::get('empresa-empleo/createAsociar/{usuario}', 'EmpresaEmpleoController@createAsociar')->name('empresaEmpleo.createAsociar');
        Route::post('empresa-empleo/vincula-usuario', 'EmpresaEmpleoController@vinculaUsuario')->name('empresaEmpleo.vinculaUsuario');
        Route::post('empresa-empleo/desvincula', 'EmpresaEmpleoController@desvinculaEmpresa')->name('empresaEmpleo.desvinculaEmpresa');
        Route::get('empresa-empleo/edit/{empresa}', 'EmpresaEmpleoController@edit')->name('empresaEmpleo.edit');
        Route::put('empresa-empleo/{empresa}', 'EmpresaEmpleoController@update')->name('empresaEmpleo.update');
        Route::post('empresa-empleo/destroy', 'EmpresaEmpleoController@destroy')->name('empresaEmpleo.destroy');
        Route::post('empresa-empleo/enviar', 'EmpresaEmpleoController@enviar')->name('empresaEmpleo.enviar');
        Route::post('empresa-empleo/habilitar', 'EmpresaEmpleoController@habilitar')->name('empresaEmpleo.habilitar');

        ////////// DOCUMENTACION EMPLEO
        Route::get('documentacionempleo/revisar/{documentacion}', 'DocumentacionEmpleoController@revisar')->name('documentacione.revisar');
        Route::put('documentacionempleo/{documentacion}', 'DocumentacionEmpleoController@update')->name('documentacione.update');
        Route::post('documentacionempleo/estado', 'DocumentacionEmpleoController@estado')->name('documentacione.estado');
        Route::post('documentacionempleo/empleado', 'DocumentacionEmpleoController@empleado')->name('documentacione.empleado');
        Route::post('documentacionempleo/fondep', 'DocumentacionEmpleoController@fondep')->name('documentacione.fondep');
        Route::post('documentacionempleo/memoria', 'DocumentacionEmpleoController@memoria')->name('documentacione.memoria');
        Route::post('documentacionempleo/estatuto', 'DocumentacionEmpleoController@estatuto')->name('documentacione.estatuto');
        Route::post('documentacionempleo/autoridades', 'DocumentacionEmpleoController@autoridades')->name('documentacione.autoridades');
        Route::post('documentacionempleo/dni', 'DocumentacionEmpleoController@dni')->name('documentacione.dni');
        Route::post('documentacionempleo/cuit', 'DocumentacionEmpleoController@cuit')->name('documentacione.cuit');
        Route::post('documentacionempleo/afip', 'DocumentacionEmpleoController@afip')->name('documentacione.afip');
        Route::post('documentacionempleo/f931', 'DocumentacionEmpleoController@f931')->name('documentacione.f931');
        Route::post('documentacionempleo/cbu', 'DocumentacionEmpleoController@cbu')->name('documentacione.cbu');
        Route::post('documentacionempleo/repsal', 'DocumentacionEmpleoController@repsal')->name('documentacione.repsal');
        Route::post('documentacionempleo/mipyme', 'DocumentacionEmpleoController@mipyme')->name('documentacione.mipyme');
        Route::post('documentacionempleo/attrabajador', 'DocumentacionEmpleoController@attrabajador')->name('documentacione.attrabajador');
        Route::post('documentacionempleo/djattrabajador', 'DocumentacionEmpleoController@djattrabajador')->name('documentacione.djattrabajador');
        Route::post('documentacionempleo/certdiscapacidad', 'DocumentacionEmpleoController@certdiscapacidad')->name('documentacione.certdiscapacidad');

        Route::post('documentacionempleo/habilitar', 'DocumentacionEmpleoController@habilitar')->name('documentacione.habilitar');
        Route::get('documentacionempleo/edit/{documentacion}', 'DocumentacionEmpleoController@edit')->name('documentacione.edit');
        Route::get('documentacionempleo/', 'DocumentacionEmpleoController@index')->name('documentacione.index');

        //////////  EMPRESA

        Route::get('empresa/admin/', 'EmpresaController@indexAdmin')->name('empresa.indexAdmin')->middleware('permission:AdminEmpresaAdmin');
        Route::get('empresa/admin/getEmpresas', 'EmpresaController@getEmpresas')->name('empresa.getEmpresas')->middleware('permission:AdminEmpresaAdmin');
        Route::post('empresa/agregar/interes', 'EmpresaController@addInteres')->name('empresa.addInteres');
        Route::post('empresa/quitar/interes', 'EmpresaController@removeInteres')->name('empresa.removeInteres');
        Route::get('empresa/origen/edit/{origen}', 'EmpresaController@origenEdit')->name('empresa.origenEdit');
        Route::put('empresa/origen/update/{origen}', 'EmpresaController@origenUpdate')->name('empresa.origenUpdate');
        Route::get('empresa/', 'EmpresaController@index')->name('empresa.index');
        Route::get('empresa/create/{asociado?}', 'EmpresaController@create')->name('empresa.create');
        Route::post('empresa/store', 'EmpresaController@store')->name('empresa.store');
        Route::get('empresa/edit/{empresa}', 'EmpresaController@edit')->name('empresa.edit');
        Route::put('empresa/{empresa}', 'EmpresaController@update')->name('empresa.update');
        Route::post('empresa/destroy', 'EmpresaController@destroy')->name('empresa.destroy');

        //////////  ASOCIADO

        Route::get('asociado/', 'AsociadoController@index')->name('asociado.index');
        Route::get('asociado/create', 'AsociadoController@create')->name('asociado.create');
        Route::post('asociado/store', 'AsociadoController@store')->name('asociado.store');
        Route::get('asociado/edit/{asociado}', 'AsociadoController@edit')->name('asociado.edit');
        Route::put('asociado/{asociado}', 'AsociadoController@update')->name('asociado.update');
        Route::post('asociado/destroy', 'AsociadoController@destroy')->name('asociado.destroy');

        //////////  USUARIO
        Route::get('users', 'UsersController@index')->name('users.index')->middleware('permission:AdminUsuario');
        Route::get('users/create', 'UsersController@create')->name('users.create');
        Route::post('users/store', 'UsersController@store')->name('users.store');
        Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');
        Route::put('users/{user}/update', 'UsersController@update')->name('users.update');
        Route::post('users/destroy', 'UsersController@destroy')->name('users.destroy');
        Route::post('users/buscar', 'UsersController@buscar')->name('users.buscar');
        Route::get('user/editclave', 'UsersController@editclave')->name('users.editclave');
        Route::post('user/updateclave', 'UsersController@updateclave')->name('users.updateclave');
        Route::get('user/editprofile', 'UsersController@editprofile')->name('users.editprofile');
        Route::post('user/updateprofile', 'UsersController@updateprofile')->name('users.updateprofile');

        //////////  PERMISO
        Route::get('permisos', 'PermisoController@index')->name('permisos.index')->middleware('permission:AdminPermiso');
        Route::get('permisos/create', 'PermisoController@create')->name('permisos.create');
        Route::post('permisos/store', 'PermisoController@store')->name('permisos.store');
        Route::get('permisos/edit/{permiso}', 'PermisoController@edit')->name('permisos.edit');
        Route::put('permisos/{permiso}', 'PermisoController@update')->name('permisos.update');
        Route::post('permisos/destroy', 'PermisoController@destroy')->name('permisos.destroy');

        //////////  ROL
        Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:AdminRole');
        Route::get('roles/create', 'RoleController@create')->name('roles.create');
        Route::post('roles/store', 'RoleController@store')->name('roles.store');
        Route::get('roles/edit/{role}', 'RoleController@edit')->name('roles.edit');
        Route::put('roles/{role}', 'RoleController@update')->name('roles.update');
        Route::post('roles/destroy', 'RoleController@destroy')->name('roles.destroy');
    });
});
