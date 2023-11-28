<div class="card-header">
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12 ">
            <h5> Documentación solicitada a personas jurídicas </h5>
        </div>
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Copia certificada del Estatuto de la Sociedad o asociación
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formestatuto" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="estatuto" id="estatuto" required>
        </form>
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
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->estatuto))
            <i class="far fa-check-circle text-success"></i>
        @else
            <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Acta de Asamblea o reunión de socios que designe a las autoridades si correspondiente y constancia de la vigencia del mandato de las mismas
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formacta" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="acta" id="acta" required>
        </form>
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
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->acta))
            <i class="far fa-check-circle text-success"></i>
        @else
            <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Copia autenticada del Poder vigente y suficiente del representante legal
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formpoder" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="poder" id="poder" required>
        </form>
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
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->poder))
            <i class="far fa-check-circle text-success"></i>
        @else
            <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Certificado de vigencia de Personería (emitido por la Dirección de Personas Jurídicas o constancia de INAES si se trata de una cooperativa)
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formpersoneria" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="personeria" id="personeria" required>
        </form>
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
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->personeria))
            <i class="far fa-check-circle text-success"></i>
        @else
            <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Último estado contable
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formestadocontable" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="estadocontable" id="estadocontable" required>
        </form>
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
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->estadocontable))
            <i class="far fa-check-circle text-success"></i>
        @else
            <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

