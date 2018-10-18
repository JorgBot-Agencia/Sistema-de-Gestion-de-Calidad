@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="background: #ffe6e6; border-color: #ffdee6;">
                <div class="panel-heading" style="text-align: center;">
                    <img style="max-width: 230px; margin-top: 1em;" src="img/logoprocar.png">
                    <h3 style="font-weight: 600; color: #480012; text-transform: uppercase; margin-top: 1.5em;" >Sistema Int. Gestión</h3>
                </div>

                <div class="panel-body">
                    <p style="text-align: center;">
                        <a href="{{ route('visualizar_indicador')}}" class="btn btn-default btn-lg" data-toggle="tooltip" title="Ingresa aquí para ver los Indicadores registrados en cada Proceso" >
                          <span class="glyphicon glyphicon-zoom-in"></span> Ver Indicadores 
                        </a>
                    </p>

                    <p style="text-align: center;">
                        <a style="background: #a50029; border-color: #7b001f;" href="{{ route('login')}}" class="btn btn-danger btn-lg" data-toggle="tooltip" title="Ingresa aquí para registrar el resultado del Indicador">
                          <span class="glyphicon glyphicon-user"></span> Iniciar Sesión
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script >
    $(document).ready(function($) {

    });
</script>
@endsection
