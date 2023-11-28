@extends('base.base-pdf')

@section('title', 'Imprimir')

@section('content')

    <table style="width: 100%">
        <tr>
            <td>CONSTANCIA DE EVALUACION DE PROYECTOS</td>
            <td style="text-align: right"></td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2">Denominación del proyecto</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight: bold;">
                {{ strtoupper($evaluacion->Proyecto->denominacion) }}
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">Titular</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight: bold;">
                {{ strtoupper($evaluacion->Proyecto->Titular->nombrecompleto) }} ::
                {{ strtoupper($evaluacion->Proyecto->Empresa->razon_social) }}

            </td>
        </tr>
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-bottom: 15px;">
        <tr style=" background-color:#CCC">
            <td style="text-align: center">#</td>
            <td style=""> Criterio</td>
            <td style="text-align: center">Puntaje</td>
            <td style="">Observación</td>
        </tr>
        <tr>
            <td style=" text-align: center">a</td>
            <td style="text-align: justify">
                Las perspectivas de consolidación o escalamiento de la empresa solicitante, en sus distintas facetas,
                mediante el aporte requerido
            </td>
            <td style="text-align: center">{{ $evaluacion->puntaje1 }}</td>
            <td style="text-align: justify">{{ $evaluacion->observacion1 }}</td>
        </tr>
        <tr>
            <td style="text-align: center">b</td>
            <td style="text-align: justify">
                La capacidad económica, financiera y operativa del solicitante para desarrollar las actividades propuestas
            </td>
            <td style="text-align: center">{{ $evaluacion->puntaje2 }}</td>
            <td style="text-align: justify">{{ $evaluacion->observacion2 }}</td>
        </tr>
        <tr>
            <td style="text-align: center">c</td>
            <td style="text-align: justify">
                La facturación de la empresa en el año anterior, en referencia al requisito de la línea por el cual no puede
                solicitarse en carácter de crédito más del 50% del total de la misma
            </td>
            <td style="text-align: center">{{ $evaluacion->puntaje3 }}</td>
            <td style="text-align: justify">{{ $evaluacion->observacion3 }}</td>
        </tr>
        <tr>
            <td style="text-align: center">d</td>
            <td style="text-align: justify">
                La adecuación del proyecto a la perspectiva de sostenibilidad económica que presenta el solicitante
            </td>
            <td style="text-align: center">{{ $evaluacion->puntaje4 }}</td>
            <td style="text-align: justify">{{ $evaluacion->observacion4 }}</td>
        </tr>
        <tr>
            <td style="text-align: center">e</td>
            <td style="text-align: justify">
                La contribución a la preservación de las fuentes laborales dependientes de la MiPyME
            </td>
            <td style="text-align: center">{{ $evaluacion->puntaje5 }}</td>
            <td style="text-align: justify">{{ $evaluacion->observacion5 }}</td>
        </tr>
        <tr>
            <td style="text-align: center">f</td>
            <td style="text-align: justify">
                La incorporación de perspectiva de sustentabilidad ambiental, social y de género por parte de la MiPyME
            </td>
            <td style="text-align: center">{{ $evaluacion->puntaje6 }}</td>
            <td style="text-align: justify">{{ $evaluacion->observacion6 }}</td>
        </tr>
        <tr>
            <td style="text-align: center">g</td>
            <td style="text-align: justify">
                El encuadramiento del destino del financiamiento solicitado a los términos previstos en la presente
                Resolución y normas complementarias
            </td>
            <td style="text-align: center">{{ $evaluacion->puntaje7 }}</td>
            <td style="text-align: justify">{{ $evaluacion->observacion7 }}</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
    </table>

    <table style="width: 100%; margin-bottom: 15px;">
        <tr>
            <td>VALORACIÓN RESULTANTE DE LA EVALUACION ..............................
                <strong>{{ $evaluacion->resultado }}</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>OPINION DE LA EVALUACION </td>
        </tr>
        <tr>
            <th style="text-align: justify">{{ $evaluacion->comentario }}</th>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td>Lugar -------------------------------------------</td>
            <td style="text-align: center">Firma responsable de la evaluación</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>

        @if ($evaluacion->Evaluador)

            <tr>
                <td>Fecha <strong> {{ date('d/m/Y', strtotime($evaluacion->fecha)) }} </strong> </td>
                <td style="text-align: center">Aclaración -------------------------------------------</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td style="text-align: center">
                    <strong> {{ $evaluacion->Evaluador->nombre_completo }} </strong>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="text-align: center">
                    DNI <strong>{{ $evaluacion->Evaluador->dni }}</strong>
                </td>
            </tr>
        @else

            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="text-align: center">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="text-align: center">
                    &nbsp;
                </td>
            </tr>

        @endif



        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>


@endsection
