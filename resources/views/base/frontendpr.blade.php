@extends('base.base-sin-menu')

@section('title', 'Inicio')

@section('content')

    <div class="container">

        <div class="row pb-3">
            <div class="col-xs-4 col-md-3 col-lg-3 text-center">
                <img src="{{ asset('public/images/frontend/portada-min-nacion.png') }}" class=" img-fluid" />
            </div>
            <div class="col-xs-4 col-md-6 col-lg-6">
                &nbsp;
            </div>
            <div class="col-xs-4 col-md-3 col-lg-3 text-center">
                <img src="{{ asset('public/images/frontend/portada-min-provincia.png') }}" class=" img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <img src="{{ asset('public/images/frontend/programafp.png') }}" class=" img-fluid" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <h5 class="favenir mb-3">
                    “PROGRAMA FEDERAL DE FORTALECIMIENTO DE LA REACTIVACIÓN PRODUCTIVA“
                </h5>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row mt-3 mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <p class=" text-justify">
                    Estimado/a empleador/a: para poder completar la solicitud al Programa es necesario previamente descargar
                    y leer la
                    <a 
                        class=" text-primary"
                        href="{{ asset('/public/images/frontend/Resolución 245-21 MDP.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}">
                       Resolución Nº245/2021 MDP 
                    </a> 
                    , <a 
                        class=" text-primary" 
                        href="{{ asset('/public/images/frontend/Resolucion Conjunta 07-22.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}">
                        Resolución Conjunta N° 1/2022 MDP 
                    </a>
                    y las
                    <a 
                        class=" text-primary"
                        href="{{ asset('/public/images/frontend/BASES Y CONDICIONES.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}">
                        Bases y Condiciones de la línea
                    </a>
                    y  el Acta de Adhesión al programa que rige la convocatoria específica para Entre Ríos
                    que rige la convocatoria específica para Entre Ríos. La presentación de una solicitud implica
                    que Ud. conoce las condiciones del Programa y que garantiza en carácter de Declaración Jurada la
                    veracidad y exactitud de toda la información incluida. La correcta inscripción a la línea queda
                    supeditada a la
                    exactitud de la información y la entrega en tiempo y forma de la documentación requerida. La
                    aprobación para la obtención del beneficio en el marco del Programa, así como el monto del beneficio por
                    cada
                    contratación verificada, será abonada de conformidad a lo que determinan las Bases y Condiciones que
                    rigen en la presente convocatoria, siendo potestad ello del Ministerio de Desarrollo Productivo de
                    la Nación.
                </p>

            </div>
        </div>


        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class=" mb-5 ">Marco normativo del Programa</h4>

                <ul>
                    <li class=" mb-4">
                        Resolución 245/21 MDP
                        <a href="{{ asset('/public/images/frontend/Resolución 245-21 MDP.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}"
                            target="_blank">
                            - <i class=" fa fa-file-pdf text-primary"></i> Descargar
                        </a>

                    </li>

                    <li class=" mb-4">
                        Resolución Conjunta N° 1/22 MDP
                        <a href="{{ asset('/public/images/frontend/Resolucion Conjunta 07-22.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}"
                            target="_blank">
                            - <i class=" fa fa-file-pdf text-primary"></i> Descargar
                        </a>

                    </li>

                    <li class=" mb-4">
                        Bases y Condiciones de la linea
                        <a
                            href="{{ asset('/public/images/frontend/BASES Y CONDICIONES.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}">
                            - <i class=" fa fa-file-pdf text-primary"></i> Descargar
                        </a>
                        (Anexo III de la Resolución Conjunta N° 1/22 MDP)
                    </li>


                    <li class=" mb-4">
                        Actividades alcanzadas por el Programa [Apéndice B de la Resolución 245/21 MDP]
                        <a href="{{ asset('/public/images/frontend/CLAES Habilitadas Para Presentarse al Programa.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}"
                            target="_blank"> - <i class=" fa fa-file-pdf text-primary"></i> Descargar
                        </a>
                    </li>

                    <li class=" mb-4">
                        Acta de Adhesión de la provincia de Entre Ríos al Programa Federal de Fortalecimiento de la
                        Reactivación Productiva
                    </li>
                </ul>

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">

                <h4 class=" mb-5 ">
                    Documentación a completar y adjuntar en la plataforma conforme las Bases y Condiciones del Programa
                </h4>

                <ol>
                    <li class=" mb-4">
                        Apéndice A –
                        <a href="{{ asset('/public/images/frontend/APENDICE A.pdf') }}?{{ substr(md5(mt_rand()), 0, 7) }}={{ time() }}"
                            target="_blank">
                            Solicitud de Acceso al “Programa Federal de Fortalecimiento de la Reactivación Productiva- FONDEP ( <i class=" fa fa-file-pdf text-primary"></i> Descargar )
                        </a>. Completo y firmado por el representante legal de la empresa solicitante.
                    </li>
                    <li class=" mb-4">
                        Constancia de la Clave Bancaria Uniforme (CBU) de titularidad del Solicitante, acreditando el tipo y
                        número de cuenta y sucursal.
                    </li>
                    <li class=" mb-4">
                        Alta temprana de la/s persona/s contratada/s ante la ADMINISTRACIÓN FEDERAL DE INGRESOS PÚBLICOS (AFIP)
                    </li>
                    <li class=" mb-4">
                        Certificado de discapacidad de los/las trabajadores/as contratados/as.(Si corresponde)
                    </li>
                </ol>

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <p>En caso de que no se encuentre registrado como PyME puede acceder a más información al respecto en
                    <a href="https://www.argentina.gob.ar/produccion/registrar-una-pyme"> Acceder </a>
                </p>
            </div>
        </div>

        <div class="card border-primary mb-5 text-center">
            <div class="row mt-3 mt-3">
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <a href="{{ route('registro') }}" class=" btn btn-info"> Registro</a>
                    <br>
                    <small>Crea tu usuario y registrate</small>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <a href="{{ route('login') }}" class=" btn btn-success"> Acceder</a>
                    <br>
                    <small>Si ya estás registrado</small>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class=" mb-5 ">Pasos para el Registro de Usuario y Empresa</h4>

                <ol>
                    <li class=" mb-4">
                        Complete sus <b>datos personales</b> para cargar la solicitud en
                        <a href="{{ route('registro') }}" class="link">
                            Registro
                        </a>
                    </li>
                    <li class=" mb-4">Cargar los <b>datos de la empresa</b>, una vez completados previamente sus datos
                        personales.</li>
                    <li class=" mb-4">Cargados los datos de la empresa aparecerá el botón <b>Presentar Documentación</b>
                        donde deberá hacer click.
                    </li>
                </ol>
            </div>
        </div>


        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class=" mb-5 ">Carga de la documentación del Programa</h4>

                <ol>
                    <li class=" mb-4"> La misma constituye el sistema a partir del cual se remite la información requerida
                        para participar en el Programa que será analizada.
                    </li>
                    <li class=" mb-4"> Una vez cargado cada documento el sistema muestra una tilde dando confirmación de la
                        carga.
                    </li>
                    <li class=" mb-4"> Cuando todos los documentos requeridos hayan sido cargados se tiene la opción de
                        confirmar el envío. Importante: el envío no se puede deshacer una vez confirmado.
                    </li>
                </ol>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class=" mb-5 ">Procedimiento de análisis del Proyecto</h4>

                <ol>
                    <li class=" mb-4">
                        Una vez cargada la documentación el sistema enviará la solicitud al equipo técnico
                        provincial a cargo de la línea.
                    </li>
                    <li class=" mb-4">
                        El equipo técnico evaluará si la información es correcta dentro de los 5 días de recibida cada
                        presentación. En el caso de que alguna documentación se encuentre cargada de manera incorrecta, sea
                        ilegible o cualquier otra situación que imposibilite la verificación de datos, el equipo técnico se
                        contactará con la empresa al respecto, y se blanqueará la carga para que la empresa pueda subsanar
                        dicha situación. La empresa contará con 2 días para presentar la documentación faltante, bajo
                        apercibimiento de considerarse desistida la solicitud.
                    </li>
                    <li class=" mb-4">
                        La documentación deberá estar completa para que el equipo técnico realice un análisis
                        y de cuenta de la aprobación provincial para la presentación del proyecto de la empresa ante el
                        Programa.
                    </li>
                    <li class=" mb-4">
                        Dicho análisis junto al resto de la documentación será remitido al Ministerio de Desarrollo
                        Productivo de la Nación por plataforma TAD. Importante: dicha documentación requerirá firma conjunta
                        entre el Ministerio de Producción de Entre Ríos y la empresa solicitante, que deberá ingresar a TAD
                        con su CUIT y clave fiscal para confirmar el envío.
                    </li>
                    <li class=" mb-4">
                        Tanto los pedidos de subsanación como la aprobación o rechazo de la solicitud serán informados por
                        parte del Ministerio de Desarrollo Productivo de la Nación al Ministerio de Producción de Entre
                        Ríos, quien se pondrá en contacto con la empresa respecto de dichas notificaciones.
                    </li>

                </ol>
            </div>
        </div>


        <div class="row mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                Ministerio de Desarrollo Productivo de la Nación - <i class="fas fa-envelope text-black-50"></i>
                empleopyme@produccion.gob.ar
            </div>
        </div>




    @endsection
