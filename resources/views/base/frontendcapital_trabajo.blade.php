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
                <img src="{{ asset('public/images/frontend/prog_cap_reactivacion_grande.png') }}" class=" img-fluid" />
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
                    LÍNEAS DE CRÉDITO A TASA SUBSIDIADA JUNTO AL BANCO DE ENTRE RÍOS
                </h5>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            
            <div class="card">
                <div class="card-header text-left" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed  text-left" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Línea crédito - Adquisición de capital de trabajo por parte de micro, pequeñas y
                            medianas empresas entrerrianas de la <b>producción tambera provincial.</b>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h5 class="favenir mb-3">
                                    LÍNEA DE CRÉDITO PARA EL SECTOR TAMBERO ENTRERRIANO
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <p>
                                    Financiación para la Adquisición de capital de trabajo por parte de micro, pequeñas y
                                    medianas empresas entrerrianas de la producción tambera provincial.
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destino</b>: financiamiento de capital de trabajo.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto total de la línea</b>: PESOS DOSCIENTOS MILLONES ($200.000.000).
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto Máximo a financiar</b>: hasta tres (3) meses de Producción Láctea del promedio
                                simple de los
                                últimos doce (12) meses
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Sistema y Frecuencia de Amortización</b>: Sistema Alemán. Los vencimientos de capital e
                                intereses
                                operarán mensualmente hasta su total amortización.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Plazo Máximo de Amortización</b>: la línea incluirá un plazo de amortización de hasta 24
                                (VEINTICUATRO)
                                meses.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Tasa de Interés y bonificación provincial</b>: la línea tendrá una tasa fija del
                                Veintinueve por ciento
                                nominal anual (29% TNA), que surge de una tasa fija anual de treinta y cinco (35) puntos
                                porcentuales
                                subsidiada en seis
                                (6) puntos porcentuales por parte del GOBIERNO DE LA PROVINCIA DE ENTRE RÍOS.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destinatarios</b>: Micro, pequeñas y medianas empresas, según los términos de la
                                Resolución Nacional N°
                                220/19 S.E.
                                PyME y sus modificatorias, del sector tambero que estén radicadas en la Provincia de Entre
                                Ríos y entreguen
                                su producción en una usina láctea, y que reúnan los requisitos para ser calificadas por EL
                                BANCO como
                                sujetos
                                de crédito.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Vigencia de la línea</b>: hasta agotar el cupo máximo total de PESOS DOSCIENTOS MILLONES
                                ($200.000.000) a
                                aplicar por el BANCO como capital a los préstamos establecidos mediante el presente convenio
                                o hasta el 30
                                de septiembre
                                de 2021, lo que ocurra primero.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed  text-left" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Línea crédito - Adquisición de bienes de capital por parte de micro, pequeñas y
                            medianas empresas entrerrianas del <b>sector del transporte de cargas de alimentos,
                                combustibles, cereales, oleaginosas y cargas generales. </b>
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h5 class="favenir mb-3">
                                    LÍNEA DE CRÉDITO PARA EL SECTOR TRANSPORTISTA ENTRERRIANO
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <p>
                                    Financiación para la Adquisición de bienes de capital por parte de micro, pequeñas y
                                    medianas empresas entrerrianas del sector del transporte de cargas de alimentos,
                                    combustibles, cereales, oleaginosas y cargas generales.
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destino</b>: financiar la adquisición de Bienes de Capital.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto Total de la Línea</b>: PESOS DOSCIENTOS MILLONES ($200.000.000).
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto Máximo a financiar</b>: hasta la suma de PESOS QUINCE MILLONES ($15.000.000) por
                                beneficiario.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Sistema y Frecuencia de Amortización</b>: Sistema Francés. Los vencimientos de capital e
                                intereses
                                operarán mensualmente hasta su total amortización.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Plazo Máximo de Amortización</b>: la línea incluirá un plazo de amortización de hasta 48
                                (CUARENTA Y
                                OCHO) meses.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Tasa de Interés y bonificación del Gobierno Provincial</b>: la línea tendrá una tasa fija
                                del
                                Veinticuatro por ciento nominal anual (24% TNA), que surge de una tasa fija anual de treinta
                                (30) puntos
                                porcentuales subsidiada en seis (6) puntos porcentuales por parte del GOBIERNO DE LA
                                PROVINCIA DE ENTRE
                                RIOS.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destinatarios</b>: Micro, pequeñas y medianas empresas, según los términos de la
                                Resolución Nacional N°
                                220/19 S.E. PyME y sus modificatorias, del sector del transporte de cargas de alimentos,
                                combustibles,
                                cereales, oleaginosas y cargas generales, que estén radicadas en la Provincia de Entre Ríos,
                                y que reúnan
                                los requisitos para ser calificadas por EL BANCO como sujetos de crédito.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Vigencia de la línea</b>:hasta agotar el cupo máximo total de PESOS DOSCIENTOS MILLONES
                                ($200.000.000) o
                                hasta el 30 de septiembre de 2021, lo que ocurra primero.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-left" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed  text-left" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Línea crédito - Adquisición de capital de trabajo por parte de micro, pequeñas y
                            medianas empresas para <b>integrados avícolas entrerrianos.</b>
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                    data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h5 class="favenir mb-3">
                                    LÍNEA DE CRÉDITO PARA INTEGRADOS AVÍCOLAS ENTERRIANOS
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <p>
                                    Financiación para la Adquisición de bienes de capital y ampliación de la capacidad
                                    productiva para integrados avícolas
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destino</b>: financiamiento de la adquisición de bienes de capital y ampliación de la
                                capacidad productiva.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto total de la línea</b>: PESOS $1.000.000.000 (un mil millones de pesos).
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto Máximo a financiar</b>: hasta la suma de $60.000.000 (sesenta millones de pesos)
                                por beneficiario.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Sistema y Frecuencia de Amortización</b>: Sistema Francés. Los vencimientos de capital e
                                intereses operarán trimestralmente hasta su total amortización.
                                Los pagos de las cuotas de los préstamos serán efectuados por medio de la retención de
                                cuotas de capital e intereses efectuadas por los Frigoríficos con los que el Banco
                                suscribirá convenios a tal efecto.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Plazo Máximo de Amortización y período de gracia</b>: la línea incluirá un plazo de
                                amortización de hasta 60 meses, el cual incluye un período de gracia de 180 días sobre
                                capital e intereses.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Tasa de Interés y bonificación provincial</b>: la tasa final para los beneficiarios
                                estará en el orden del 25,9% TNA, valor que surge de una tasa fija del 42% TNA (cuarenta y
                                dos por ciento nominal anual), subsidiada en catorce (14) puntos porcentuales por el
                                Gobierno de la Provincia de Entre Ríos, y bonificada en un 5% sobre la tasa nominal anual
                                definida por parte del Banco de Entre Ríos.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destinatarios</b>: productores integrados del sector avícola que estén radicados en la
                                Provincia de Entre Ríos, y que reúnan los requisitos para ser calificadas por el Banco como
                                sujetos de crédito.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Vigencia de la línea</b>: hasta agotar el cupo máximo total de $1.000.000.000 (un mil
                                millones de pesos) a aplicar por el Banco como capital a los préstamos.
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Garantías</b> : a satisfacción del Banco, el cual podrá solicitar la constitución de
                                garantías reales y/o personales.
                                Los créditos de hasta $10.000.000 (diez millones de pesos) estarán garantizados por el
                                FOGAER (Fondo de Garantías de Entre Ríos).
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Tramitación</b> : se inicia en la sucursal del Banco de Entre Ríos en que la empresa
                                tiene radicada su
                                cuenta. En caso de que no sea cliente, puede tramitar la apertura de una cuenta en cualquier
                                sucursal del banco.
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
