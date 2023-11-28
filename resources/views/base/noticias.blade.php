@if ($noticias->count() > 0)


    <div class="row mt-5 mb-5">
        <div class="offset-2 col-8">
            <h4 class="favenir">
                Noticias recientes
            </h4>

            <a class="ml-2 mt-1" href="{{ route('noticias.publicacion') }}">
                (+ info)
            </a>
        </div>
    </div>



    <div class="row mt-5 mb-5">
        <div class="offset-2 col-8">

            @foreach ($noticias->take(3) as $index => $noticia)
                @if ($index == 0)
                    @php
                        $titulo0 = $noticia->titulo;
                        $subtitulo0 = $noticia->subtitulo ? $noticia->subtitulo : ' ';
                        $imagen0 = $noticia->imagen;
                    @endphp
                @endif

                @if ($index == 1)
                    @php
                        $titulo1 = $noticia->titulo;
                        $subtitulo1 = $noticia->subtitulo ? $noticia->subtitulo : ' ';
                        $imagen1 = $noticia->imagen;
                    @endphp
                @endif

                @if ($index == 2)
                    @php
                        $titulo2 = $noticia->titulo;
                        $subtitulo2 = $noticia->subtitulo ? $noticia->subtitulo : ' ';
                        $imagen2 = $noticia->imagen;
                    @endphp
                @endif
            @endforeach

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators m-0">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100"
                            src="/economicoemprendedor/images/upload/noticias/{{ $imagen0 }}" alt="1 noticia">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $titulo0 }}</h5>
                            <p>{{ $subtitulo0 }}</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100"
                            src="/economicoemprendedor/images/upload/noticias/{{ $imagen1 }}" alt="2 notica">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $titulo1 }}</h5>
                            <p>{{ $subtitulo1 }}</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>


        </div>
    </div>


    {{-- <div class="offset-2 col-8">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($noticias as $noticia)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="card shadow-lg mb-3 bg-white rounded">
                    <a href="{{ route('noticias.publicacion') }}">
                        <img src="/economicoemprendedor/images/upload/noticias/{{ $noticia->imagen }}" style=" width: auto; height: 600px; max-height: 600px;">
                        <div class="carousel-caption visible-lg visible-md visible-sm hidden-xs">
                            <p class=" text-center favenir">{{ $noticia->titulo }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}

    <div class="row mt-5">
        <div class="col-12">
            &nbsp;
        </div>
    </div>

@endif
