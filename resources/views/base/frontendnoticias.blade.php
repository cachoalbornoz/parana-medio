@extends('base.base')

@section('title', 'Inicio')

@section('stylesheet')
    
@endsection

@section('content')

    <div class="container">

        <div class="row mt-5 mb-5 favenir">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class="mx-4 my-0">Noticias recientes </h4>
            </div>
        </div>


        @foreach ($noticias as $noticia)
            <div class="card mt-5 mb-5 p-4 favenir">
                <div class="card-header bg-white">
                    <p> {{ $noticia->fecha_publicacion }}
                        ({{ \Carbon::parse($noticia->fecha_publicacion)->diffForHumans() }})
                    </p>
                    <h5 class=" text-muted"> <i class=" fa fa-arrow-alt-circle-right"></i> {{ $noticia->titulo }} </h5>
                </div>
                <div class="card-body">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-5 pl-5 pr-5">
                            <img src="/economicoemprendedor/images/upload/noticias/{{ $noticia->imagen }}"
                                class="card-img" />
                        </div>
                        <div class="col-md-7">
                        </div>
                    </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-md-12 pl-5 pr-5">
                            <p class=" text-muted"> {!! $noticia->cuerpo !!} </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row mt-3">
                        <div class="col-md-12 pl-5 pr-5">
                            <a href="https://www.youtube.com/channel/UCy0W_lkT1z66MrRN4FA9qAg" target="_blank">
                                <i class="fab fa-youtube text-danger"></i> Visitá nuestro canal en Youtube
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        <div class="row mt-5 mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

    </div>


@endsection

@section('js')

@endsection
