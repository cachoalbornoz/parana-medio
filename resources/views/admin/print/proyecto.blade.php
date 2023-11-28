@extends('base.base-pdf')

@section('title', 'Imprimir')

@section('content')


<table style="width: 100%">
    <tr>
        <td>PRESENTACION FORMAL DE PROYECTOS</td>
        <td style="text-align: right">FORMULARIO 001</td>
    </tr>
    <tr>
        <td colspan="2">
            <hr>
        </td>
    </tr>
    <tr>
        <td colspan="2">DENOMINACION DEL PROYECTO</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="font-weight: bold;">
            {{ strtoupper($proyecto->denominacion) }}
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">RESUMEN EJECUTIVO</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:justify; font-weight: bold">
            {{ strtoupper($proyecto->resumenejecutivo) }}
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">MONTO SOLICITADO A LA DIRECCION </td>
    </tr>
    <tr>
        <td colspan="2" style="font-weight: bold;">
            $ {{ $proyecto->monto}}
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">DESTINO DEL MONTO </td>
    </tr>
    <tr>
        <td colspan="2" style="font-weight: bold;">
            @if ($proyecto->destino == 0)
            Capital trabajo
            @else
            Inversión y capital de trabajo asociado
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">LA EMPRESA ES LIDERADA POR MUJERES </td>
    </tr>
    <tr>
        <td colspan="2" style="font-weight: bold;">
            @if ($proyecto->esliderMujer == 0)
            NO
            @else
            SI
            @endif
        </td>
    </tr>
</table>

<table style="width: 100%">
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="6" style="background-color:#ccc">GRUPO INTEGRANTE / RESPONSABLES</td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
        <td style="width: 10%">
            TITULAR
        </td>
        <td style="font-weight: bold; width: 30%">
            {{$proyecto->Titular->apellido}}, {{$proyecto->Titular->nombre}}
        </td>
        <td style="width: 10%">
            Dni
        </td>
        <td style="font-weight: bold; width: 20%">
            {{$proyecto->Titular->dni}}
        </td>
        <td style="width: 10%;">
            Fecha Nac
        </td>
        <td style="font-weight: bold; width: 20%;">
            {{date("d/m/Y", strtotime($proyecto->Titular->fechanac)) }}
        </td>
    </tr>
    <tr>
        <td>
            Domicilio
        </td>
        <td style="font-weight: bold;" colspan="3">
            {{$proyecto->Titular->direccion}} / {{$proyecto->Titular->Ciudad->nombre}}
        </td>
    </tr>
    <tr>
        <td>
            Teléfono
        </td>
        <td style="font-weight: bold;">
            ( {{$proyecto->Titular->codarea}} ) {{$proyecto->Titular->telefono}}
        </td>
        <td>
            Email
        </td>
        <td style="font-weight: bold;">
            {{$proyecto->Titular->email}}
        </td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>

    @foreach ($asociados as $user)

    @if ($proyecto->titular <> $user->id)

        <tr>
            <td>
                ASOCIADO
            </td>
            <td style="font-weight: bold;">
                {{$user->apellido}}, {{$user->nombre}}
            </td>
            <td>
                Dni
            </td>
            <td style="font-weight: bold;">
                {{$user->dni}}
            </td>
            <td>
                Fecha Nac
            </td>
            <td style="font-weight: bold;">
                {{date("d/m/Y", strtotime($user->fechanac)) }}
            </td>
        </tr>
        <tr>
            <td>
                Domicilio
            </td>
            <td style="font-weight: bold;" colspan="3">
                {{$user->direccion}} / {{$user->Ciudad->nombre}}
            </td>
        </tr>
        <tr>
            <td>
                Teléfono
            </td>
            <td style="font-weight: bold;">
                ( {{$user->codarea}} ) {{$user->telefono}}
            </td>
            <td>
                Email
            </td>
            <td style="font-weight: bold;">
                {{$user->email}}
            </td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>

        @endif

        @endforeach

        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="6">EMPRESA VINCULADA</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
            <td>
                RAZON SOCIAL
            </td>
            <td style="font-weight: bold;">
                {{ strtoupper($proyecto->Empresa->razon_social) }}
            </td>
            <td style="font-weight: bold;" colspan="2">
                {{$proyecto->Empresa->Tiposociedad->sociedad}}
            </td>
            <td colspan="2">
                CUIT {{$proyecto->Empresa->cuit}}
            </td>
        </tr>

        <tr>
            <td>
                Domicilio
            </td>
            <td colspan="5">
                {{$proyecto->Empresa->direccion}} / {{($proyecto->Empresa->ciudad)?$proyecto->Empresa->Ciudad->nombre:null}}
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
</table>

<table style="width: 100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td style="background-color:#ccc">PRESENTACION DE LA IDEA - PROYECTO</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Descripción</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->descripcion) }}
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Objetivos</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->objetivos) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Oportunidades que significa</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->oportunidad) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Desarrollo actual</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->desarrollo) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td style="background-color:#ccc">PRESENTE DEL GRUPO EMPRENDEDOR</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Historia</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->historia) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Presente</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->presente) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td style="background-color:#ccc">ASPECTOS DE LOS PRODUCTOS / SERVICIOS Y DE LA PRODUCCION DE LOS MISMOS </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Lugar donde desarrolla la actividad</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            Propio:: {{ strtoupper($proyecto->propio) }}
        </td>
    </tr>
    <tr>
        <td style="text-align:justify">
            Alquilado:: {{ strtoupper($proyecto->alquilado) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Características técnicas de los productos / servicios</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->ctecnicas) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Características tecnológicas de los productos / servicios</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->ctecnologicas) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Descripción de los procesos productivos</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->pproductivos) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Descripción de las materias primas</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->mprimas) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Descripción de los subproductos, desechos y/o residuos que se generarán durante los procesos productivos</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->subprocesos) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td style="background-color:#ccc">ASPECTOS DEl MERCADO </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Determinación del mercado</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->mercado) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Determinación del clientes</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->clientes) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Determinación del competencia</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->competencia) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Determinación de los proveedores</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->proveedores) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Riesgos y estrategias de superación de los mismos</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->riesgos) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td style="background-color:#ccc">GENERALES </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Destino del monto solicitado. (adjuntar presupuesto / s)</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->destinomonto) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>


<table style="width: 100%; margin-bottom: 15px">
    <tr style="background-color:#CCC">
        <td>RESUMEN PRESUPUESTARIO</td>
        <th style="width: 10%">Cantidad</th>
        <th style="width: 10%">Costo</th>
        <th style="width: 15%">Total</th>
    </tr>
    @foreach ($resumen as $resu)
    <tr>
        <td style=" text-align:left">
            {!! $resu->rpdescripcion !!}
        </td>
        <td style=" text-align:center">
            {!! $resu->rpcantidad !!}
        </td>
        <td style=" text-align:center">
            {!! $resu->rpcosto !!}
        </td>
        <td style=" text-align:center">
            {!! $resu->rptotal !!}
        </td>
    </tr>
    @endforeach
    <tr style="background-color:#CCC">
        <td>Total resumen prespuestario</td>
        <th style="width: 10%"></th>
        <th style="width: 10%">$</th>
        <th style="width: 15%">{{ $resumen->sum('rptotal') }}</th>
    </tr>
</table>

<table style="width: 100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Personal</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->personal) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>* Impacto económico y social</strong></td>
    </tr>
    <tr>
        <td style="text-align:justify">
            {{ strtoupper($proyecto->impacto) }}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr style="background-color:#CCC">
        <td><strong>ASPECTOS ECONÓMICOS - FINANCIEROS </strong></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>
<table style="width: 100%;  margin-bottom: 15px">
    <tr style="background-color:#CCC">
        <td>DESCRIPCION DE LOS COSTOS FIJOS </td>
        <th style="width: 15%">Año</th>
        <th style="width: 15%">Monto</th>
    </tr>
    @foreach ($costofijo->sortBy('cfano') as $costo)
    <tr>
        <td>
            {!! $costo->cfdescripcion !!}
        </td>
        <th>
            {!! $costo->cfano !!}
        </th>
        <th>
            {!! $costo->cfcosto !!}
        </th>
    </tr>
    @endforeach
    <tr style="background-color:#CCC">
        <td>
            Total de costos fijos
        </td>
        <th>
            $
        </th>
        <th>
            {!! $costofijo->sum('cfcosto') !!}
        </th>
    </tr>
</table>


<table style="width: 100%;  margin-bottom: 15px">
    <tr style="background-color:#CCC">
        <td>DESCRIPCION DE LOS COSTOS VARIABLES </td>
        <th style="width: 15%">Año</th>
        <th style="width: 15%">Monto</th>
    </tr>
    @foreach ($costovariable->sortBy('cvano') as $costo)
    <tr>
        <td>
            {!! $costo->cvdescripcion !!}
        </td>
        <th>
            {!! $costo->cvano !!}
        </th>
        <th>
            {!! $costo->cvcosto !!}
        </th>
    </tr>
    @endforeach
    <tr style="background-color:#CCC">
        <td>
            Total de costos variables
        </td>
        <th>
            $
        </th>
        <th>
            {!! $costovariable->sum('cvcosto') !!}
        </th>
    </tr>
</table>

<table style="width: 100%;  margin-bottom: 15px">
    <tr style="background-color:#CCC">
        <td>ORIGEN / MONTOS FUENTE DE FINANCIACION PREVISTAS </td>
        <th style="width: 15%">Año</th>
        <th style="width: 15%">Monto</th>
    </tr>
    @foreach ($fuentefinanciacion->sortBy('ffano') as $fuente)
    <tr>
        <td>
            {!! $fuente->ffdescripcion !!}
        </td>
        <th>
            {!! $fuente->ffano !!}
        </th>
        <th>
            {!! $fuente->ffmonto !!}
        </th>
    </tr>
    @endforeach
    <tr style="background-color:#CCC">
        <td>
            Total de montos
        </td>
        <th>
            $
        </th>
        <th>
            {!! $fuentefinanciacion->sum('ffmonto') !!}
        </th>
    </tr>
</table>

<table>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            <strong>* Precio de los productos / servicios por ventas</strong>
        </td>
    </tr>
    <tr>
        <td>
            {{$proyecto->precios}}
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
</table>

<table style="width: 100%;  margin-bottom: 25px">
    <tr style="background-color:#CCC">
        <td>DETALLE DE LOS INGRESOS POR VENTAS </td>
        <th style="width: 10%">Año</th>
        <th style="width: 10%">Cantidad</th>
        <th style="width: 10%">Monto</th>
        <th style="width: 10%">Total</th>
    </tr>
    @foreach ($ingresoventa->sortBy('ivano') as $ingreso)
    <tr>
        <td>
            {!! $ingreso->ivdescripcion !!}
        </td>
        <th>
            {!! $ingreso->ivano !!}
        </th>
        <th>
            {!! $ingreso->ivcantidad !!}
        </th>
        <th>
            {!! $ingreso->ivcosto !!}
        </th>
        <th>
            {!! $ingreso->ivtotal !!}
        </th>
    </tr>
    @endforeach
    <tr style="background-color:#CCC">
        <td>
            Total de montos
        </td>
        <td>

        </td>
        <td>

        </td>
        <th>
            $
        </th>
        <th>
            {!! $ingresoventa->sum('ivtotal') !!}
        </th>
    </tr>
</table>

<table style="width: 100%; margin-bottom: 25px">
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <th colspan="3">PLANILLA DE RESULTADOS</th>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr style="background-color:#CCC">
        <td>INGRESOS</td>
        <th style="width: 10%">Año 1</th>
        <th style="width: 10%">AÑO 2</th>
    </tr>
    <tr>
        <td>Ingresos x ventas</td>
        <th>{{ $ingresoventa->where('ivano', '=', '1')->sum('ivtotal') }} </th>
        <th>{{ $ingresoventa->where('ivano', '=', '2')->sum('ivtotal') }} </th>
    </tr>
    <tr>
        <td>Ingresos x Otras Fuentes (Inc.Préstamos)</td>
        <th>{{ $fuentefinanciacion->where('ffano', '=', '1')->sum('ffmonto') }} </th>
        <th>{{ $fuentefinanciacion->where('ffano', '=', '2')->sum('ffmonto') }} </th>
    </tr>
    <tr>
        <td>Ingresos Totales</td>
        <th>{{ $ingresoventa->where('ivano', '=', '1')->sum('ivtotal') + $fuentefinanciacion->where('ffano', '=', '1')->sum('ffmonto') }} </th>
        <th>{{ $ingresoventa->where('ivano', '=', '2')->sum('ivtotal') + $fuentefinanciacion->where('ffano', '=', '2')->sum('ffmonto')}} </th>
    </tr>
    <tr>
        <td colspan="3">&nbsp; </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp; </td>
    </tr>
    <tr style="background-color:#CCC">
        <td>EGRESOS</td>
        <th style="width: 10%"> </th>
        <th style="width: 10%"> </th>
    </tr>
    <tr>
        <td>Costos Fijos </td>
        <th>{{ $costofijo->where('cfano', '=', '1')->sum('cfcosto')}} </th>
        <th>{{ $costofijo->where('cfano', '=', '2')->sum('cfcosto')}} </th>
    </tr>
    <tr>
        <td>Costos Variables </td>
        <th>{{ $costovariable->where('cvano', '=', '1')->sum('cvcosto')}} </th>
        <th>{{ $costovariable->where('cvano', '=', '2')->sum('cvcosto')}} </th>
    </tr>
    <tr>
        <td>Egresos totales </td>
        <th> {{ $costofijo->where('cfano', '=', '1')->sum('cfcosto') + $costovariable->where('cvano', '=', '1')->sum('cvcosto') }} </th>
        <th> {{ $costofijo->where('cfano', '=', '2')->sum('cfcosto') + $costovariable->where('cvano', '=', '2')->sum('cvcosto') }} </th>
    </tr>
    <tr>
        <td colspan="3">&nbsp; </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp; </td>
    </tr>
    <tr style="background-color:#CCC">
        <td>RESULTADO FINAL</td>
        <th style="width: 10%">
            {{ $ingresoventa->where('ivano', '=', '1')->sum('ivtotal')
            + $fuentefinanciacion->where('ffano', '=', '1')->sum('ffmonto')
            - ($costofijo->where('cfano', '=', '1')->sum('cfcosto') + $costovariable->where('cvano', '=', '1')->sum('cvcosto')) }}
        </th>
        <th style="width: 10%">
            {{ $ingresoventa->where('ivano', '=', '2')->sum('ivtotal')
            + $fuentefinanciacion->where('ffano', '=', '2')->sum('ffmonto')
            - ($costofijo->where('cfano', '=', '2')->sum('cfcosto') + $costovariable->where('cvano', '=', '2')->sum('cvcosto')) }}
        </th>
    </tr>
</table>

<table style=" width: 100%; margin-bottom: 15px">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr style="background-color:#CCC">
        <td>* ANALISIS F.O.D.A. DEL PROYECTO</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong> * Fortalezas </strong></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>{{ $proyecto->fortalezas}}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong> * Oportunidades </strong></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>{{ $proyecto->oportunidades}}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong> * Debilidades </strong></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>{{ $proyecto->debilidades}}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong> * Amenazas </strong></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>{{ $proyecto->amenazas}}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <hr>
        </td>
    </tr>
    <tr>
        <td>
            INFORMACION A ADJUNTAR
        </td>
    </tr>
    <tr>
        <td>
            <hr>
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            La representación de este proyecto en el marco de la Dirección de Desarrollo Económico implica
            cumplir con toda la legislación vigente (Municipal, Provincial y/o Nacional)
            en materia de preservación del medio ambiente, seguridad industrial, impositiva,
            laboral, etc. La información consignada en esta solicitud tiene carácter de Declaración Jurada y
            recibirá un tratamiento CONFIDENCIAL por parte de la Dirección.
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Lugar</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Fecha {{ date('d/m/Y', time()) }}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <th>Firma del Responsable del Proyecto</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <th>Aclaración</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <th>DNI Nro.</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>

</table>


@endsection