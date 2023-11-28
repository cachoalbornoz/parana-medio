@extends('base.base')

@section('title', 'Ayuda')

@section('content')

<div class="container pt-5 pb-2">
    <div class=" jumbotron shadow ">
        <h4 class="mb-3 text-center ">Recomendación general</h4>
        <br>
        <p class="mb-2">En todas las pantallas dónde se solicite completar con sus datos, guárdelos con <strong>F10</strong> ó <i class="fas fa-save text-info"></i> a medida que sean cargados.</p>
        <p class="mb-2">No espere para guardar a último momento. </p>
    </div>
</div>



<div id="proyecto" class="row mt-2 mb-2">
    <div class="col">
        &nbsp;
    </div>
</div>

<div class="container pt-5 pb-5" >
    <h3 class="text-danger">Proyecto</h3>
    <ul>
        <li>Historia y situación actual de la MiPyME. </li>
        <li>Características generales de la empresa. </li>
        <li>Análisis FODA. </li>
    </ul>
</div>

<div id="empresas" class="row mt-2 mb-2">
    <div class="col">
        &nbsp;
    </div>
</div>

<div class="container pt-5 pb-5" >
    <h3 class="text-info">Empresas</h3>
    <ul>
        <li>Definir si la empresa es persona física o jurídica. </li>
        <li>Datos generales de la MiPyME.</li>
    </ul>
</div>

<div id="planillas" class="row mt-2 mb-2">
    <div class="col">
        &nbsp;
    </div>
</div>
<div class="container pt-5 pb-5" >
    <h3 class="text-danger">Planillas contables</h3>
    <ul>
        <li>Justificación del destino del préstamo solicitado.</li>
        <li>Demostración de recursos propios de la MiPyME.</li>
        <li>Rentabilidad de la MiPyME.</li>
        <li>Proyección de ingresos y egresos por dos años.</li>
    </ul>
</div>

<div id="asociados" class="row mt-2 mb-2">
    <div class="col">
        &nbsp;
    </div>
</div>
<div class="container pt-5 pb-5" >
    <h3 class="text-success">Asociados</h3>
    <ul>
        <li>Integrantes del proyecto.</li>
        <li>Responsables del préstamo solicitado.</li>
    </ul>
</div>

<div id="documentacion" class="row mt-2 mb-2">
    <div class="col">
        &nbsp;
    </div>
</div>
<div class="container pt-5 pb-5" >
    <h3 class="text-success">Documentación</h3>
    <ul>
        <li>Carga de datos de manera digital.</li>
        <li>Lo solicitado varía entre persona física o jurídica.</li>
    </ul>
</div>


@endsection
