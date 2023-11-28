@extends('base.base')

@section('title', 'Editar proyecto')

@section('breadcrumb')
    {!! Breadcrumbs::render('proyecto.send', $proyecto) !!}
@stop

@section('content')

<div class="card">
    <div class="card-header">
        Proceso de envío
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <a href="{{route('proyecto.index')}}" class="btn btn-secondary">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar
                </a>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6">
                @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert-class') }} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('message')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

    <script>

    </script>

@endsection
