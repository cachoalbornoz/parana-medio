@extends('base.base')

@section('title', 'Noticia')

@section('breadcrumb')
    {!! Breadcrumbs::render('noticia') !!}
@stop

@section('content')

    @include('errors.error')

    <div class="card">
        <div class="card-header">
            <h5>
                Noticias
            </h5>
        </div>

        <div class="card-body">

            @if (isset($noticia))
                {!! Form::model($noticia, ['route' => ['noticias.update', $noticia->id], 'files' => 'true']) !!}
                {!! Form::hidden('noticia_id', $noticia->id) !!}
                @method('put')
            @else
                {!! Form::open(['route' => 'noticias.store', 'files' => 'true']) !!}
            @endif

            <div class="form-group mt-3 mb-4 row">
                <div class="col-4">
                    <label>Imagen actual</label> <br />
                    @if (isset($noticia->imagen))
                        <img src="/economicoemprendedor/images/upload/noticias/{{ $noticia->imagen }}" class="img-thumbnail"
                            width="150" height="150">
                    @else
                        <img src="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}" class="img-thumbnail"
                            width="150" height="150">
                    @endif
                </div>
                <div class="col-4">
                    <label>Cargar imagen</label> <br />
                    <input type="file" name="imagen" id="imagen">
                </div>
                <div class="col-4">
                    <label>Fecha publicación</label>
                    @if (!isset($noticia->fecha_publicacion))
                        {{ Form::date('fecha_publicacion', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                    @else
                        {{ Form::date('fecha_publicacion', $noticia->fecha_publicacion, ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-6">
                    {!! Form::label('name', 'Titulo') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Titulo de la noticia']) !!}
                </div>
                <div class="col-2">

                </div>
                <div class="col-4">
                    <label class="checkbox-inline">
                        Publicada <br>
                        <input type="checkbox" @if (isset($noticia) && $noticia->active) checked="" @endif name="active"
                            id="active" value='1'>
                    </label>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Sub-titulo') !!}
                {!! Form::text('subtitulo', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group mb-3">
                {!! Form::label('name', 'Cuerpo') !!}
                {!! Form::textarea('cuerpo', null, ['id' => 'cuerpo', 'class' => 'form-control border border-primary ', 'rows' => 10]) !!}
            </div>
            <div class="form-group row mb-3">
                <div class="col-6">
                    <label>Categoria</label>
                    {!! Form::select('categoria', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione categoria']) !!}
                </div>
                <div class="col-6">
                    {!! Form::label('name', 'Autor') !!}
                    {!! Form::text('autor', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row mt-4 mb-3">
                <div class="col-12 text-right">
                    <button type="submit" class=" btn btn-primary"> <i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>


            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('js')
<script>
    jQuery(document).ready(function($) {
        new EasyEditor('#cuerpo', { theme: 'theme-mac' });;
    });
</script>

@endsection
