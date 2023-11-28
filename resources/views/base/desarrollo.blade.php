@extends('base.base')

@section('title', 'Registro')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-info text-white">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h5>Ambiente Desarrollo</h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form id="formregistro" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" autocomplete="off">

                {{ csrf_field() }}


                <div class="row mb-2">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <hr class=" border border-info">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <h5> Indicanos en cuáles de éstos <strong>programas</strong> estás interesado</h5>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="radio">
                            <label>
                                <input type="radio" name="verprograma" onclick="hide_asesora()" checked="true"> Financiamiento
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="verprograma" onclick="ver_asesora()"> Asistencia Técnica
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <div id="divFinancia">

                        <div class="row mb-2">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                {!! Form::select('tipo_programa', $financia, 1, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>

                    <div id="divAsesora" class="d-none">

                        <div class="row mt-3 mb-2">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                {!! Form::select('tipo_programa', $asesora, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <a href="{{ asset('/public/images/upload/documentacion/Asistencia.pdf')}}?codeimg={{ time()}}">
                                    <i class="far fa-file-pdf"></i> Requisitos
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <hr class=" border border-info">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection


@section('js')

<script>
    const divFinancia = $("#divFinancia");
    const divAsesora  = $("#divAsesora");

    const hide_asesora = ()=>{

        divFinancia.removeClass('d-none');
        divAsesora.addClass('d-none');
    }

    const ver_asesora = ()=>{
        
        divAsesora.removeClass('d-none');
        divFinancia.addClass('d-none');
    }

</script>
@endsection