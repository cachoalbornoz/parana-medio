@extends('base.base')

@section('title', 'Editar tasa ')

@section('breadcrumb')
    {!! Breadcrumbs::render('editasa') !!}
@stop

@section('content')

    @include('errors.error')

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="card">
                {!! Form::model($tasa, ['route' => ['updatetasa'], 'method' => 'PUT']) !!}

                <div class="card-header">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <h5>
                                Edición de tasa interés
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row mt-5 mb-5">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            &nbsp;
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <table class="table table-bordered table-borderless text-center">
                                <tr>
                                    <td class="w-25">
                                        <h1>{{ $tasa->tasa*100 }} %</h1>
                                    </td>
                                    <td class="w-50">
                                        {!! Form::number('tasa', null, ['class' => 'form-control', 'required', 'autofocus'=> 'true', 'step' => 'any']) !!}
                                    </td>
                                    <td class="w-25">
                                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                {!! Form::close()  !!}
            </div>
        </div>
    </div>

@endsection


