@extends('base.base')

@section('title', 'Ruta no encontrada')

@section('breadcrumb')
	{!! Breadcrumbs::render('inicio') !!}
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <i class="fas fa-ban"></i> - Ruta no encontrada
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 text-center">
                    <img src="{{ asset('images/frontend/fardos.png')}}" alt="Upss">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 text-right">
                    <a href="{{ route('home') }}" class="btn btn-info">
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i> Volver
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
