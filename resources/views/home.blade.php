@extends('layouts.app2')

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
                   <ul style="padding: 0;">
                        <ul class="list-group">
                          
                          
                          @if ( Auth::user()->privilegios == 1)
                          <li  style="text-align: center;background: none; border: 0" class="list-group-item"><a style="color: #636b6f; font-size: 18px;background: #fff; padding: 8px 18px; border-radius: 4px;
     border: 1px solid #d6d6d6;" href="{{ route('visualizar_indicador')}}"><span class="glyphicon glyphicon-zoom-in"></span> Visualizar Indicadores</a></li>
                          
                          @elseif ( Auth::user()->privilegios == 2)
                          <li  style="text-align: center;background: none; border: 0" class="list-group-item"><a style="color: #636b6f; font-size: 18px;background: #fff; padding: 8px 18px; border-radius: 4px;
     border: 1px solid #d6d6d6;" href="{{ route('visualizar_indicador')}}"><span class="glyphicon glyphicon-zoom-in"></span> Visualizar Indicadores</a></li>
                          
                          <li style="text-align: center; background: none; border: 0" class="list-group-item"><a style="color: white; font-size:18px; background: #a50029; padding: 8px 18px; border-radius: 4px;" href="{{ route('C_present_indicador')}}"><span class="glyphicon glyphicon-open"></span> Registrar Indicadores</a></li>
                           
                           @elseif ( Auth::user()->privilegios == 3)
                           <li class="list-group-item"><a href="{{ route('register')}}">Registrar Usuarios</a></li>
                           
                           @elseif ( Auth::user()->privilegios  >3)
                           <li  style="text-align: center;background: none; border: 0" class="list-group-item"><a style="color: #636b6f; font-size: 18px;background: #fff; padding: 8px 18px; border-radius: 4px;
     border: 1px solid #d6d6d6;" href="{{ route('visualizar_indicador')}}"><span class="glyphicon glyphicon-zoom-in"></span> Visualizar Indicadores</a></li>
                           
                           <li style="text-align: center; background: none; border: 0" class="list-group-item"><a style="color: white; font-size:18px; background: #a50029; padding: 8px 18px;    border-radius: 4px;" href="{{ route('C_present_indicador')}}"> <span class="glyphicon glyphicon-open"></span> Registrar Indicadores</a></li>
                           
                           <li style="text-align: center;background: none; border: 0" class="list-group-item"><a style="color: #636b6f; font-size:18px; background: #fff; padding: 8px 32px; border-radius: 4px; 
     border: 1px solid #d6d6d6;" href="{{ route('register')}}"><span class="glyphicon glyphicon-user"></span> Registrar Usuarios</a></li>
                           
                           <li style="text-align: center;background: none; border: 0" class="list-group-item"><a style="color: #636b6f; font-size:18px; background: #fff; padding: 8px 42px; border-radius: 4px; 
     border: 1px solid #d6d6d6;" href="{{ route('Procesos')}}"><span class="glyphicon glyphicon-pencil"></span> Editar Procesos</a></li>
                          
                          <li style="text-align: center;background: none; border: 0" class="list-group-item"><a style="color: #636b6f; font-size:18px; background: #fff; padding: 8px 33px; border-radius: 4px; 
     border: 1px solid #d6d6d6;" href="{{ route('Indicadores')}}"><span class="glyphicon glyphicon-pencil"></span> Editar Indicadores</a></li>
                          

                          @endif
                        </ul>
                   </ul>
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
