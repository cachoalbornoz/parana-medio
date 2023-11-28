@extends('base.base')

@section('title', 'Revisar documentacion')

@section('breadcrumb')
    {!! Breadcrumbs::render('documentacion.edit', $documentacion) !!}
@endsection

@section('stylesheet')

@endsection

@section('content')

    @include('errors.error')


    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h5>
                        {{ $documentacion->Proyecto->Empresa->razon_social}} -
                        ({{ $documentacion->Proyecto->Titular->apellido}}, {{ $documentacion->Proyecto->Titular->nombre}})
                    </h5>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        {!! Form::model($documentacion, ['route' => ['documentacion.update', $documentacion->id], 'method' => 'PUT']) !!}

        <div class="card-header">
            <div class="row mb-3">
                <div class="col-xs-12 col-sm-6 col-lg-6 ">
                    <h5>
                        Revisar documentación de personas
                        <strong>
                        @if (in_array($documentacion->Proyecto->Empresa->tiposociedad->id, ['0']))
                        físicas
                        @else
                        jurídicas
                        @endif
                        </strong>
                    </h5>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6 text-right ">
                    @if (Auth::user()->hasRole(['superadmin', 'admin']))
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="row mb-3">
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    Requisito solicitado
                </div>
                <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                    Adjunto
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-5">
                    Observaciones <small> - Reservado para la Dirección (máx 100 caracteres)</small>
                </div>

            </div>

            @if (in_array($documentacion->Proyecto->Empresa->tiposociedad->id, ['0']))

                <div class="row mt-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        - Frente Dni
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->dnifrente))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->dnifrente) }}?codeimg={{ time()}}" >
                                <img src="{{ asset('/public/images/upload/documentacion/'. $documentacion->dnifrente) }}" class="img-responsive" height="50" >
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <img src="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" class="img-responsive" height="50" >
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('dnifrentec', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        - Dorso Dni
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->dnidorso))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->dnidorso) }}?codeimg={{ time()}}" >
                                <img src="{{ asset('/public/images/upload/documentacion/'. $documentacion->dnidorso) }}" class="img-responsive" height="50" >
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <img src="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" class="img-responsive" height="50" >
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('dnidorsoc', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        - Contitución de domicilio legal <small> ( en caso de que no fuera el que figura en el DNI ) </small>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->domiciliolegal))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->domiciliolegal) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('domiciliolegalc', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        - Constancia inscripción AFIP
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->afip))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->afip) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('afipc', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        - Constancia inscripción ATER
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->ater))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->ater) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('aterc', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        - Constancias de inscripción o habilitaciones municipales de corresponder
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->muni))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->muni) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('munic', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

            @else

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <small>Copia certificada del Estatuto de la Sociedad o asociación</small>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->estatuto))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->estatuto) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('estatutoc', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <small>Acta de Asamblea o reunión de socios que designe a las autoridades si correspondiente y constancia de la vigencia del mandato de las mismas</small>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->acta))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->acta) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('actac', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <small>Copia autenticada del Poder vigente y suficiente del representante legal</small>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->poder))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->poder) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('poderc', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <small>Certificado de vigencia de Personería (emitido por la Dirección de Personas Jurídicas o constancia de INAES si se trata de una cooperativa)</small>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->personeria))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->personeria) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('personeriac', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <small>Último estado contable</small>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                        @if(Str::length($documentacion->estadocontable))
                            <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->estadocontable) }}?codeimg={{ time()}}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @else
                            <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" >
                                <i class="far fa-file-pdf"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        {!! Form::text('estadocontablec', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

            @endif

            <div class="row mb-3">
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <small>Certificado MiPyME vigente</small>
                </div>
                <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                    @if(Str::length($documentacion->mipyme))
                        <a id="linkmipyme" href="{{ asset('/public/images/upload/documentacion/'. $documentacion->mipyme) }}?codeimg={{ time()}}">
                            <i class="far fa-file-pdf"></i>
                        </a>
                    @else
                        <a id="linkmipyme" href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                            <i class="far fa-file-pdf"></i>
                        </a>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-5">
                    {!! Form::text('mipymec', null, ['class' => 'form-control']) !!}
                </div>
            </div>

        </div>

        {!! Form::close()  !!}
    </div>

@endsection

@section('js')

@endsection
