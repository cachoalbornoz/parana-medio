<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AuditoriaSistema
 *
 * @property int $id
 * @property \App\Models\TipoAuditoria|null $codigo
 * @property string|null $tabla
 * @property \App\User|null $usuario
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema whereTabla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditoriaSistema whereUsuario($value)
 */
	class AuditoriaSistema extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ciudad
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $departamento
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereNombre($value)
 */
	class Ciudad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CiudadAll
 *
 * @property int $id
 * @property \App\Models\Departamento $departamento
 * @property string $nombre
 * @method static \Illuminate\Database\Eloquent\Builder|CiudadAll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CiudadAll newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CiudadAll query()
 * @method static \Illuminate\Database\Eloquent\Builder|CiudadAll whereDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CiudadAll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CiudadAll whereNombre($value)
 */
	class CiudadAll extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CostoFijo
 *
 * @property int $id
 * @property int|null $proyecto
 * @property string|null $cfdescripcion
 * @property int|null $cfano
 * @property string|null $cfcosto
 * @property-read \App\Models\Proyecto|null $Proyecto
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo query()
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo whereCfano($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo whereCfcosto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo whereCfdescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoFijo whereProyecto($value)
 */
	class CostoFijo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CostoVariable
 *
 * @property int $id
 * @property int|null $proyecto
 * @property string|null $cvdescripcion
 * @property int|null $cvano
 * @property string|null $cvcosto
 * @property-read \App\Models\Proyecto|null $Proyecto
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable query()
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable whereCvano($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable whereCvcosto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable whereCvdescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostoVariable whereProyecto($value)
 */
	class CostoVariable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Departamento
 *
 * @property int $id
 * @property \App\Models\Provincia $provincia
 * @property string $nombre
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereProvincia($value)
 */
	class Departamento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Documentacion
 *
 * @property int $id
 * @property \App\Models\Proyecto|null $proyecto
 * @property \App\Models\TipoEstado|null $estado
 * @property string|null $dnifrente
 * @property string|null $dnifrentec
 * @property string|null $dnidorso
 * @property string|null $dnidorsoc
 * @property string|null $domiciliolegal
 * @property string|null $domiciliolegalc
 * @property string|null $afip
 * @property string|null $afipc
 * @property string|null $ater
 * @property string|null $aterc
 * @property string|null $muni
 * @property string|null $munic
 * @property string|null $mipyme
 * @property string|null $mipymec
 * @property string|null $estatuto
 * @property string|null $estatutoc
 * @property string|null $acta
 * @property string|null $actac
 * @property string|null $poder
 * @property string|null $poderc
 * @property string|null $personeria
 * @property string|null $personeriac
 * @property string|null $estadocontable
 * @property string|null $estadocontablec
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereActa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereActac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereAfip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereAfipc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereAter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereAterc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereDnidorso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereDnidorsoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereDnifrente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereDnifrentec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereDomiciliolegal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereDomiciliolegalc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereEstadocontable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereEstadocontablec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereEstatuto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereEstatutoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereMipyme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereMipymec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereMuni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereMunic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion wherePersoneria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion wherePersoneriac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion wherePoder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion wherePoderc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereProyecto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentacion whereUpdatedAt($value)
 */
	class Documentacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DocumentacionEmpleo
 *
 * @property int $id
 * @property \App\Models\EmpresaEmpleo|null $empresa
 * @property string|null $empleado
 * @property \App\Models\TipoEstado|null $estado
 * @property string|null $fondep
 * @property string|null $memoria
 * @property string|null $estatuto
 * @property string|null $autoridades
 * @property string|null $dni
 * @property string|null $cuit
 * @property string|null $afip
 * @property string|null $f931
 * @property string|null $cbu
 * @property string|null $repsal
 * @property string|null $mipyme
 * @property string|null $attrabajador
 * @property string|null $djattrabajador
 * @property string|null $certdiscapacidad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereAfip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereAttrabajador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereAutoridades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereCbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereCertdiscapacidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereDjattrabajador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereEmpleado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereEstatuto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereF931($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereFondep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereMemoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereMipyme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereRepsal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentacionEmpleo whereUpdatedAt($value)
 */
	class DocumentacionEmpleo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Empresa
 *
 * @property int $id
 * @property \App\User|null $titular
 * @property string|null $razon_social
 * @property string|null $cuit
 * @property string|null $email
 * @property \App\Models\TipoEstado|null $estado
 * @property int|null $tipo_sociedad
 * @property \App\Models\TipoPyme|null $tipopyme
 * @property \App\Models\TipoCategoria|null $categoria1
 * @property string|null $codigoafip1
 * @property string|null $actividad1
 * @property \App\Models\TipoCategoria|null $categoria2
 * @property string|null $codigoafip2
 * @property string|null $actividad2
 * @property string|null $fecha_inscripcion
 * @property string|null $fecha_inicio
 * @property string|null $codarea
 * @property string|null $telefono
 * @property string|null $direccion
 * @property \App\Models\CiudadAll|null $ciudad
 * @property string|null $direccion_actividad
 * @property int|null $ciudad_actividad
 * @property string|null $representante
 * @property string|null $url
 * @property string|null $observaciones
 * @property int|null $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CiudadAll|null $ciudadactividad
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Documentacion[] $documentacion
 * @property-read int|null $documentacion_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DocumentacionEmpleo[] $documentacione
 * @property-read int|null $documentacione_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TipoFinanciamiento[] $financiamientos
 * @property-read int|null $financiamientos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Proyecto[] $proyectos
 * @property-read int|null $proyectos_count
 * @property-read \App\Models\TipoSociedad|null $tiposociedad
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereActividad1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereActividad2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCategoria1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCategoria2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCiudadActividad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCodarea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCodigoafip1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCodigoafip2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereDireccionActividad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereFechaInscripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereRazonSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereRepresentante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereTipoSociedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereTipopyme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereTitular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereUrl($value)
 */
	class Empresa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpresaEmpleo
 *
 * @property int $id
 * @property \App\User|null $titular
 * @property string|null $razon_social
 * @property string|null $cuit
 * @property \App\Models\TipoEstado|null $estado
 * @property int|null $tipo_sociedad
 * @property \App\Models\TipoPyme|null $tipopyme
 * @property \App\Models\TipoCategoria|null $categoria1
 * @property string|null $codigoafip1
 * @property string|null $actividad1
 * @property string|null $fecha_inscripcion
 * @property string|null $fecha_inicio
 * @property string|null $codarea
 * @property string|null $telefono
 * @property string|null $direccion
 * @property \App\Models\CiudadAll|null $ciudad
 * @property string|null $direccion_actividad
 * @property int|null $ciudad_actividad
 * @property string|null $representante
 * @property string|null $cuit_representante
 * @property string|null $url
 * @property string|null $observaciones
 * @property int|null $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CiudadAll|null $ciudadactividad
 * @property-read \App\Models\DocumentacionEmpleo|null $documentacion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TipoFinanciamiento[] $financiamientos
 * @property-read int|null $financiamientos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Proyecto[] $proyectos
 * @property-read int|null $proyectos_count
 * @property-read \App\Models\TipoSociedad|null $tiposociedad
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereActividad1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCategoria1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCiudadActividad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCodarea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCodigoafip1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereCuitRepresentante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereDireccionActividad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereFechaInscripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereRazonSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereRepresentante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereTipoSociedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereTipopyme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereTitular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaEmpleo whereUrl($value)
 */
	class EmpresaEmpleo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpresaFinanciamiento
 *
 * @property-read \App\Models\Empresa $empresa
 * @property-read \App\Models\TipoFinanciamiento $financiamiento
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaFinanciamiento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaFinanciamiento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaFinanciamiento query()
 */
	class EmpresaFinanciamiento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpresaInteres
 *
 * @property int $id
 * @property \App\Models\Empresa|null $empresa
 * @property int|null $interes
 * @property string|null $fecha
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaInteres newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaInteres newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaInteres query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaInteres whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaInteres whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaInteres whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaInteres whereInteres($value)
 */
	class EmpresaInteres extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpresaOrigen
 *
 * @property int $id
 * @property \App\Models\Empresa|null $empresa
 * @property \App\Models\TipoOrigen|null $origen
 * @property \App\Models\TipoEmisor|null $emisor
 * @property string|null $descripcion
 * @property string|null $fecha
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen whereEmisor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaOrigen whereOrigen($value)
 */
	class EmpresaOrigen extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpresaSeguimiento
 *
 * @property int $id
 * @property \App\Models\Empresa|null $empresa
 * @property string|null $fecha_registro
 * @property string|null $fecha_pactada
 * @property string|null $respuesta
 * @property int|null $envia
 * @property \App\Models\TipoOrigen|null $tipo
 * @property \App\User|null $usuario
 * @property \App\Models\TipoEstadoSeguimiento|null $estado
 * @property int|null $estadoTipo
 * @property \App\Models\TipoFinanciamiento|null $financiamiento
 * @property-read \App\Models\TipoEstado|null $estadotipo
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereEnvia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereEstadoTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereFechaPactada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereFechaRegistro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereFinanciamiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereRespuesta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaSeguimiento whereUsuario($value)
 */
	class EmpresaSeguimiento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpresaUser
 *
 * @property int $id
 * @property int|null $empresa_id
 * @property int|null $user_id
 * @property-read \App\Models\Empresa|null $empresa
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaUser whereEmpresaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpresaUser whereUserId($value)
 */
	class EmpresaUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Evaluacion
 *
 * @property int $id
 * @property \App\Models\Proyecto|null $proyecto
 * @property \App\User|null $evaluador
 * @property \App\Models\TipoEstado|null $estado
 * @property int|null $resultado
 * @property string|null $fecha
 * @property string|null $comentario
 * @property int|null $puntaje1
 * @property string|null $observacion1
 * @property int|null $puntaje2
 * @property string|null $observacion2
 * @property int|null $puntaje3
 * @property string|null $observacion3
 * @property int|null $puntaje4
 * @property string|null $observacion4
 * @property int|null $puntaje5
 * @property string|null $observacion5
 * @property int|null $puntaje6
 * @property string|null $observacion6
 * @property int|null $puntaje7
 * @property string|null $observacion7
 * @property int|null $puntaje8
 * @property string|null $observacion8
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereComentario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereEvaluador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereObservacion8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereProyecto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion wherePuntaje8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereResultado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluacion whereUpdatedAt($value)
 */
	class Evaluacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Expediente
 *
 * @property int $id
 * @property \App\User|null $titular
 * @property \App\Models\Proyecto|null $proyecto
 * @property int|null $nro_expediente
 * @property int|null $nro_exp_madre
 * @property int|null $nro_exp_control
 * @property string|null $monto
 * @property string|null $monto_devolver
 * @property string|null $saldo
 * @property \App\Models\TipoRubro|null $rubro
 * @property \App\Models\TipoEstado|null $estado
 * @property string|null $observaciones
 * @property string|null $fecha_otorgamiento
 * @property \App\Models\CiudadAll|null $ciudad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TipoUbicacion[] $ubicaciones
 * @property-read int|null $ubicaciones_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereFechaOtorgamiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereMontoDevolver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereNroExpControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereNroExpMadre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereNroExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereProyecto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereRubro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereSaldo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereTitular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expediente whereUpdatedAt($value)
 */
	class Expediente extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteCuota
 *
 * @property int $id
 * @property \App\Models\Expediente|null $expediente
 * @property \App\Models\ExpedientePago|null $pago
 * @property int|null $nroCuota
 * @property string|null $fechaVcto
 * @property string|null $monto
 * @property int|null $estado
 * @property int|null $manual
 * @property string|null $entregaParcial
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereEntregaParcial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereFechaVcto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereManual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota whereNroCuota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteCuota wherePago($value)
 */
	class ExpedienteCuota extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteEmpresa
 *
 * @property-read \App\Models\Empresa $empresa
 * @property-read \App\Models\Expediente $expediente
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEmpresa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEmpresa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEmpresa query()
 */
	class ExpedienteEmpresa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteEstado
 *
 * @property int $id
 * @property \App\Models\Expediente|null $expediente
 * @property \App\Models\TipoEstado|null $estado
 * @property \App\Models\TipoEstado|null $estadoAnt
 * @property string|null $fecha
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado whereEstadoAnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado whereExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteEstado whereId($value)
 */
	class ExpedienteEstado extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteNotificacion
 *
 * @property int $id
 * @property string|null $fecha
 * @property \App\Models\Expediente|null $expediente
 * @property \App\User|null $asociado
 * @property \App\Models\TipoParentesco|null $parentesco
 * @property \App\Models\TipoNotificacion|null $notificacion
 * @property \App\Models\TipoPostal|null $tipopostal
 * @property string|null $recibe
 * @property string|null $dni
 * @property string|null $monto
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereAsociado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereNotificacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereParentesco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereRecibe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteNotificacion whereTipopostal($value)
 */
	class ExpedienteNotificacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedientePago
 *
 * @property int $id
 * @property \App\Models\Expediente|null $expediente
 * @property string|null $fecha
 * @property string|null $monto
 * @property int|null $nro_operacion
 * @property int|null $cuenta
 * @property \App\Models\TipoPago|null $tipopago
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago whereCuenta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago whereExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago whereNroOperacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedientePago whereTipopago($value)
 */
	class ExpedientePago extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteRendicion
 *
 * @property int $id
 * @property \App\Models\Expediente|null $expediente
 * @property string|null $fecha
 * @property string|null $importe
 * @property \App\Models\TipoRendicion|null $rendicion
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion whereExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion whereImporte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteRendicion whereRendicion($value)
 */
	class ExpedienteRendicion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteUbicacion
 *
 * @property int $id
 * @property \App\Models\Expediente|null $expediente
 * @property \App\Models\TipoUbicacion|null $ubicacion
 * @property string|null $fecha
 * @property string|null $observacion
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion whereExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUbicacion whereUbicacion($value)
 */
	class ExpedienteUbicacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteUser
 *
 * @property int $id
 * @property int|null $expediente_id
 * @property int|null $user_id
 * @property-read \App\Models\Expediente $expediente
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUser whereExpedienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteUser whereUserId($value)
 */
	class ExpedienteUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpedienteVisita
 *
 * @property int $id
 * @property \App\Models\Expediente|null $expediente
 * @property string|null $fecha
 * @property string|null $motivo
 * @property string|null $responsable
 * @property string|null $resultado
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita whereExpediente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita whereMotivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita whereResponsable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpedienteVisita whereResultado($value)
 */
	class ExpedienteVisita extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FuenteFinanciacion
 *
 * @property int $id
 * @property int|null $proyecto
 * @property string|null $ffdescripcion
 * @property int|null $ffano
 * @property string|null $ffmonto
 * @property-read \App\Models\Proyecto|null $Proyecto
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion whereFfano($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion whereFfdescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion whereFfmonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FuenteFinanciacion whereProyecto($value)
 */
	class FuenteFinanciacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\IngresoVenta
 *
 * @property int $id
 * @property int|null $proyecto
 * @property string|null $ivdescripcion
 * @property int|null $ivano
 * @property int|null $ivcantidad
 * @property float|null $ivcosto
 * @property float|null $ivtotal
 * @property-read \App\Models\Proyecto|null $Proyecto
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta query()
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta whereIvano($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta whereIvcantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta whereIvcosto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta whereIvdescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta whereIvtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IngresoVenta whereProyecto($value)
 */
	class IngresoVenta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Noticia
 *
 * @property int $id
 * @property string|null $fecha_publicacion
 * @property string|null $titulo
 * @property string|null $subtitulo
 * @property string|null $cuerpo
 * @property string|null $autor
 * @property string|null $imagen
 * @property \App\Models\NoticiaCategoria|null $categoria
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereCuerpo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereFechaPublicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereSubtitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereTitulo($value)
 */
	class Noticia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NoticiaCategoria
 *
 * @property int $id
 * @property string|null $categoria
 * @method static \Illuminate\Database\Eloquent\Builder|NoticiaCategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticiaCategoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticiaCategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticiaCategoria whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticiaCategoria whereId($value)
 */
	class NoticiaCategoria extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pais
 *
 * @property int $id
 * @property string|null $iso
 * @property string|null $nombre
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereNombre($value)
 */
	class Pais extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permiso
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permiso whereUpdatedAt($value)
 */
	class Permiso extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Provincia
 *
 * @property int $id
 * @property string $nombre
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereNombre($value)
 */
	class Provincia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Proyecto
 *
 * @property int $id
 * @property \App\User|null $titular
 * @property \App\Models\Empresa|null $empresa
 * @property \App\Models\TipoEstado|null $estado
 * @property int|null $activo
 * @property string|null $denominacion
 * @property string|null $resumenejecutivo
 * @property string|null $monto
 * @property int|null $destino
 * @property int $esliderMujer
 * @property string|null $descripcion
 * @property string|null $objetivos
 * @property string|null $oportunidad
 * @property string|null $desarrollo
 * @property string|null $historia
 * @property string|null $presente
 * @property string|null $propio
 * @property string|null $alquilado
 * @property string|null $ctecnicas
 * @property string|null $ctecnologicas
 * @property string|null $pproductivos
 * @property string|null $mprimas
 * @property string|null $subprocesos
 * @property string|null $mercado
 * @property string|null $clientes
 * @property string|null $competencia
 * @property string|null $proveedores
 * @property string|null $riesgos
 * @property string|null $destinomonto
 * @property string|null $personal
 * @property string|null $impacto
 * @property string|null $precios
 * @property string|null $fortalezas
 * @property string|null $oportunidades
 * @property string|null $debilidades
 * @property string|null $amenazas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Documentacion|null $documentacion
 * @property-read \App\Models\Evaluacion|null $evaluacion
 * @property-read mixed $denominacion_completa
 * @property-read \App\Models\ProyectoPlanilla|null $planilla
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereAlquilado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereAmenazas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereClientes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereCompetencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereCtecnicas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereCtecnologicas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereDebilidades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereDenominacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereDesarrollo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereDestino($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereDestinomonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereEsliderMujer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereFortalezas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereHistoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereImpacto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereMercado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereMprimas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereObjetivos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereOportunidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereOportunidades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto wherePersonal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto wherePproductivos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto wherePrecios($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto wherePresente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto wherePropio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereProveedores($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereResumenejecutivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereRiesgos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereSubprocesos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereTitular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proyecto whereUpdatedAt($value)
 */
	class Proyecto extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProyectoPlanilla
 *
 * @property int $id
 * @property \App\Models\Proyecto $proyecto
 * @property \App\Models\TipoEstado|null $estado
 * @property int|null $rp
 * @property int|null $cf
 * @property int|null $cv
 * @property int|null $ff
 * @property int|null $iv
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereCf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereFf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereIv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereProyecto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoPlanilla whereRp($value)
 */
	class ProyectoPlanilla extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProyectoUser
 *
 * @property int $id
 * @property int|null $proyecto_id
 * @property int|null $user_id
 * @property-read \App\Models\Proyecto $proyectos
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoUser whereProyectoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyectoUser whereUserId($value)
 */
	class ProyectoUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResumenPresupuestario
 *
 * @property int $id
 * @property int|null $proyecto
 * @property string|null $rpdescripcion
 * @property int|null $rpcantidad
 * @property float|null $rpcosto
 * @property float|null $rptotal
 * @property-read \App\Models\Proyecto|null $Proyecto
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario whereProyecto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario whereRpcantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario whereRpcosto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario whereRpdescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumenPresupuestario whereRptotal($value)
 */
	class ResumenPresupuestario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tasa
 *
 * @property int $id
 * @property string|null $descripcion
 * @property string|null $tasa
 * @method static \Illuminate\Database\Eloquent\Builder|Tasa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tasa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tasa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tasa whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tasa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tasa whereTasa($value)
 */
	class Tasa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoAuditoria
 *
 * @property int $id
 * @property string $tipo
 * @method static \Illuminate\Database\Eloquent\Builder|TipoAuditoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoAuditoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoAuditoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoAuditoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoAuditoria whereTipo($value)
 */
	class TipoAuditoria extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoCategoria
 *
 * @property int $id
 * @property string $categoria
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoria whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoria whereId($value)
 */
	class TipoCategoria extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoCategoriaPrin
 *
 * @property int $id
 * @property string $categoria
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoriaPrin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoriaPrin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoriaPrin query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoriaPrin whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoCategoriaPrin whereId($value)
 */
	class TipoCategoriaPrin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoEmisor
 *
 * @property int $id
 * @property string|null $emisor
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEmisor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEmisor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEmisor query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEmisor whereEmisor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEmisor whereId($value)
 */
	class TipoEmisor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoEstado
 *
 * @property int $id
 * @property string $estado
 * @property string $icono
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstado query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstado whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstado whereIcono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstado whereId($value)
 */
	class TipoEstado extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoEstadoSeguimiento
 *
 * @property int $id
 * @property string $estado
 * @property string|null $color
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstadoSeguimiento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstadoSeguimiento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstadoSeguimiento query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstadoSeguimiento whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstadoSeguimiento whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoEstadoSeguimiento whereId($value)
 */
	class TipoEstadoSeguimiento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoFinanciamiento
 *
 * @property int $id
 * @property string|null $financiamiento
 * @method static \Illuminate\Database\Eloquent\Builder|TipoFinanciamiento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoFinanciamiento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoFinanciamiento query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoFinanciamiento whereFinanciamiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoFinanciamiento whereId($value)
 */
	class TipoFinanciamiento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoInteres
 *
 * @property int $id
 * @property string|null $interes
 * @method static \Illuminate\Database\Eloquent\Builder|TipoInteres newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoInteres newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoInteres query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoInteres whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoInteres whereInteres($value)
 */
	class TipoInteres extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoMiPyme
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TipoMiPyme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoMiPyme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoMiPyme query()
 */
	class TipoMiPyme extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoNotificacion
 *
 * @property int $id
 * @property string $notificacion
 * @method static \Illuminate\Database\Eloquent\Builder|TipoNotificacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoNotificacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoNotificacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoNotificacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoNotificacion whereNotificacion($value)
 */
	class TipoNotificacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoOrigen
 *
 * @property int $id
 * @property string $origen
 * @method static \Illuminate\Database\Eloquent\Builder|TipoOrigen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoOrigen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoOrigen query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoOrigen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoOrigen whereOrigen($value)
 */
	class TipoOrigen extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoPago
 *
 * @property int $id
 * @property string $pago
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPago newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPago newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPago query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPago whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPago wherePago($value)
 */
	class TipoPago extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoParentesco
 *
 * @property int $id
 * @property string $parentesco
 * @method static \Illuminate\Database\Eloquent\Builder|TipoParentesco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoParentesco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoParentesco query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoParentesco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoParentesco whereParentesco($value)
 */
	class TipoParentesco extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoPostal
 *
 * @property int $id
 * @property string|null $postal
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPostal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPostal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPostal query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPostal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPostal wherePostal($value)
 */
	class TipoPostal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoPrograma
 *
 * @property int $id
 * @property string|null $programa
 * @property int|null $tipoPrograma 1-Financ 2-Asesor
 * @property int|null $activo
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPrograma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPrograma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPrograma query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPrograma whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPrograma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPrograma wherePrograma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPrograma whereTipoPrograma($value)
 */
	class TipoPrograma extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoPyme
 *
 * @property int $id
 * @property string $pyme
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPyme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPyme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPyme query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPyme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoPyme wherePyme($value)
 */
	class TipoPyme extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoRendicion
 *
 * @property int $id
 * @property string|null $rendicion
 * @property-write mixed $comprobante
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRendicion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRendicion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRendicion query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRendicion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRendicion whereRendicion($value)
 */
	class TipoRendicion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoResponsabilidad
 *
 * @property int $id
 * @property string $responsabilidad
 * @method static \Illuminate\Database\Eloquent\Builder|TipoResponsabilidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoResponsabilidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoResponsabilidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoResponsabilidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoResponsabilidad whereResponsabilidad($value)
 */
	class TipoResponsabilidad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoRubro
 *
 * @property int $id
 * @property string $rubro
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRubro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRubro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRubro query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRubro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoRubro whereRubro($value)
 */
	class TipoRubro extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoSociedad
 *
 * @property int $id
 * @property string $sociedad
 * @method static \Illuminate\Database\Eloquent\Builder|TipoSociedad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoSociedad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoSociedad query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoSociedad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoSociedad whereSociedad($value)
 */
	class TipoSociedad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoUbicacion
 *
 * @property int $id
 * @property string|null $ubicacion
 * @method static \Illuminate\Database\Eloquent\Builder|TipoUbicacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoUbicacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoUbicacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoUbicacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoUbicacion whereUbicacion($value)
 */
	class TipoUbicacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserPrograma
 *
 * @property int $id
 * @property \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @property \App\Models\TipoPrograma|null $programa
 * @property int|null $habilitado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma whereHabilitado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma wherePrograma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPrograma whereUser($value)
 */
	class UserPrograma extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $apellido
 * @property string $nombre
 * @property int|null $dni
 * @property string|null $fechanac
 * @property int|null $nacionalidad
 * @property string $email
 * @property string|null $direccion
 * @property \App\Models\CiudadAll|null $ciudad
 * @property string|null $cp
 * @property string|null $codarea
 * @property string|null $telefono
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $habilitado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Empresa[] $empresas
 * @property-read int|null $empresas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Expediente[] $expedientes
 * @property-read int|null $expedientes_count
 * @property-read mixed $nombre_completo
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserPrograma[] $programas
 * @property-read int|null $programas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Proyecto[] $proyectos
 * @property-read int|null $proyectos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodarea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFechanac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHabilitado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNacionalidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

