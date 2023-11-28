<div class="card-header">
    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12 ">
            <h5> Documentación solicitada a personas físicas </h5>
        </div>
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Frente Dni
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formdnifrente" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="dnifrente" id="dnifrente" required>
        </form>
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->dnifrente))
        <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->dnifrente) }}?codeimg={{ time()}}">
            <i class="far fa-file-pdf"></i>
        </a>
        @else
        <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
            <i class="far fa-file-pdf"></i>
        </a>
        @endif
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->dnifrente))
        <i class="far fa-check-circle text-success"></i>
        @else
        <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Dorso Dni
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formdnidorso" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="dnidorso" id="dnidorso" required>
        </form>
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->dnidorso))
        <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->dnidorso) }}?codeimg={{ time()}}">
            <i class="far fa-file-pdf"></i>
        </a>
        @else
        <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
            <i class="far fa-file-pdf"></i>
        </a>
        @endif
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->dnidorso))
        <i class="far fa-check-circle text-success"></i>
        @else
        <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Contitución de domicilio legal <small> ( en caso de que no fuera el que figura en el DNI ) </small>
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formdomiciliolegal" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="domiciliolegal" id="domiciliolegal" required>
        </form>
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->domiciliolegal))
        <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->domiciliolegal) }}?codeimg={{ time()}}">
            <i class="far fa-file-pdf"></i>
        </a>
        @else
        <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
            <i class="far fa-file-pdf"></i>
        </a>
        @endif
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->domiciliolegal))
        <i class="far fa-check-circle text-success"></i>
        @else
        <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Constancia inscripción AFIP
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formafip" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="afip" id="afip" required>
        </form>
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->afip))
        <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->afip) }}?codeimg={{ time()}}">
            <i class="far fa-file-pdf"></i>
        </a>
        @else
        <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
            <i class="far fa-file-pdf"></i>
        </a>
        @endif
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->afip))
        <i class="far fa-check-circle text-success"></i>
        @else
        <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Constancia inscripción ATER
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formater" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="ater" id="ater" required>
        </form>
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->ater))
        <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->ater) }}?codeimg={{ time()}}">
            <i class="far fa-file-pdf"></i>
        </a>
        @else
        <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
            <i class="far fa-file-pdf"></i>
        </a>
        @endif
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->ater))
        <i class="far fa-check-circle text-success"></i>
        @else
        <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-xs-12 col-sm-8 col-lg-8">
        - Constancias de inscripción o habilitaciones municipales de corresponder
    </div>
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
        <form id="formmuni" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="muni" id="muni" required>
        </form>
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->muni))
        <a href="{{ asset('/public/images/upload/documentacion/'. $documentacion->muni) }}?codeimg={{ time()}}">
            <i class="far fa-file-pdf"></i>
        </a>
        @else
        <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
            <i class="far fa-file-pdf"></i>
        </a>
        @endif
    </div>
    <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
        @if(Str::length($documentacion->muni))
        <i class="far fa-check-circle text-success"></i>
        @else
        <i class="far fa-circle text-danger"></i>
        @endif
    </div>
</div>