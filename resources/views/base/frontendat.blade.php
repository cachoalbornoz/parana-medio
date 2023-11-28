@extends('base.base')

@section('title', 'Inicio')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <img src="{{ asset('public/images/frontend/prog_asistencia.png') }}" class=" img-fluid" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <h4 class="favenir">
                Programa de Asistencia Técnica para el Fortalecimiento MiPyME (ATF-MiPyME)
            </h4>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>


    <div class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            El Programa de Asistencia Técnica para el Fortalecimiento MiPyME (ATF MiPyME) busca contribuir al incremento
            de la productividad, competitividad e internacionalización de las MiPyMEs entrerrianas, mediante tres
            componentes:
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row mt-3 mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <h5 class="mb-4 text-primary">Capacitaciones</h5>

            <li>Requisitos: Ser una MiPyME radicada en Entre Ríos.</li>

        </div>
    </div>

    <div class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <h5 class="mb-4 text-primary">Asesoramiento Técnico y Profesional a cargo de profesionales de probada
                trayectoria y competencia en las distintas áreas temáticas en que desarrollarán su asistencia a las
                empresas.</h5>


            <li> Requisitos: un año de actividad económica verificable y contar con Certificado MiPyME vigente.</li>
            <li> Duración: 6 meses</li>

        </div>
    </div>


    <div class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <h5 class="mb-4 text-primary">Proyectos de Asistencia Integral que podrán ser beneficiarios de Aportes No
                Reembolsables de hasta $400.000 destinados a fortalecimiento técnico, formación y mejoramiento de
                procesos de la empresa.</h5>


            <li> Requisitos: Presentación de propuesta de asistencia técnica y financiera mediante el sistema web de la
                Secretaría de Desarrollo Económico y Emprendedor.</li>
            <li> Duración: Entre 6 y 18 meses dependiendo el proyecto.</li>

        </div>
    </div>

    <div class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <hr />
        </div>
    </div>


    <div class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <h5 class="mb-4">
                Áreas Temáticas para Asesoramiento Técnico y Profesional y los Proyectos de Asistencia Integral a
                presentar para recibir un ANR deberán encuadrarse en uno de los siguientes ejes:
            </h5>

            <div class="p-3 ">
                <h5 class=" font-weight-bolder">1. Comercio exterior e internacionalización</h5>
            </div>
            <p>
                Desarrollo de áreas de comercio exterior en la empresa. Adaptación de procesos productivos y de
                productos para la apertura de nuevos mercados. Certificación de normas para la exportación.
            </p>

            <div class="p-3 ">
                <h5 class=" font-weight-bolder">2. Diseño</h5>
            </div>

            <p>
                Diseño industrial: desarrollo de nuevos productos o servicios o modificación de los ya existentes.
                Diseño gráfico: estrategias de comunicación y posicionamiento en mercados.
            </p>

            <div class="p-3 ">
                <h5 class=" font-weight-bolder">3. Implementación de buenas prácticas, higiene y/o seguridad</h5>
            </div>
            <p>
                Implementación de buenas prácticas de manufactura. Implementación de sistemas de gestión de calidad e
                inocuidad. Aspectos relacionados en general con la mejora de la calidad.
                Transformaciones para la mejora de la higiene y seguridad de la empresa. Incorporación de buenas
                prácticas.
            </p>

            <div class="p-3 ">
                <h5 class=" font-weight-bolder">4. Digitalización</h5>
            </div>
            <p>
                Incorporación de soluciones tecnológicas y de industria 4.0. Instalación, soporte y mantenimiento.
                Digitalización de procesos.
            </p>

            <div class="p-3 ">
                <h5 class=" font-weight-bolder">5. Formación integral</h5>
            </div>
            <p>
                Programas de capacitación intensiva dirigidos al personal y a los directivos de la empresa.
                Participación en cursos, seminarios, congresos o jornadas sectorialmente específicas y relevantes para
                la mejora de la competitividad de la empresa.
            </p>

            <div class="p-3 ">
                <h5 class=" font-weight-bolder">6. Sistemas y tecnologías de gestión</h5>
            </div>
            <p>
                Consultoría para la adopción e implementación de nuevos sistemas y tecnologías y seguimiento de los
                mismos. Sistemas de gestión de la información y monitoreo.
                Incremento del volumen de trabajo, control de procesos, comunicación e integración, gestión eficiente de
                recursos y reducción de costos, mejora del servicio al cliente, integración con clientes y proveedores,
                logística y gestión documental.
            </p>

            <div class="p-3 ">
                <h5 class=" font-weight-bolder">7. Certificaciones</h5>
            </div>
            <p>
                Implementación de procesos normativos que tengan como objetivo la certificación de normas.
                Obtención de certificaciones nacionales e internacionales sectorialmente específicas.
            </p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <a href="{{ route('register') }}" class=" btn btn-info"> Registrate</a>
        </div>
    </div>

</div>


@endsection
