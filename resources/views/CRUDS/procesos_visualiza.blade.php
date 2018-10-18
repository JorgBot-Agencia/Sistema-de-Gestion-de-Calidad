@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">
                    <div style="height: 100px; width: 100px; border-radius: 100px; background: #e6e7e8; margin-left: auto;margin-right: auto;"></div>
                    <h1>{{$proceso->nombre}}</h1>
                </div>

                <div class="panel-body">
            <form action="{{ route($ruta)}}" method="post">
                 {{ csrf_field() }}
                <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                       <label class="form-control" style="border:none" for="nombre">Nombre Proceso</label>
                    </div>
                    <div class="col-md-6">
                        <input required class="form-control" id="nombre_proceso" type="text" name="nombre_proceso" value="{{$proceso->nombre}}"  placeholder="Nombre de Proceso">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                       <label class="form-control" style="border:none" for="descripcion_proceso">Descripcion Proceso</label>
                    </div>
                    <div class="col-md-6">
                        <input  required class="form-control" id="descripcion_proceso" type="text" value="{{$proceso->descripcion}}" name="descripcion_proceso"  placeholder="Descripcion de Proceso">
                    </div>
                </div>
                
                    <div class="col-md-12">
                                         @if($ruta =="procesos_update" )
                                         <input type="hidden" name="id" value="{{$id}}">
                                    <input type="submit" id="save_proceso" value="Actualizar" class="btn col-md-4 col-md-offset-1" style="background: #a50029; color: #fff" >
                                    <a href="{{route('Procesos')}}" class="btn col-md-4 col-md-offset-1 " style="background:#3377FF; color: #fff" >
                                        Volver a Inicio
                                        </a>
                                       @elseif($ruta =="procesos_create" )
                                        <input type="submit" id="save_proceso" value="Crear" class="btn col-md-4 col-md-offset-1  " style="background: #a50029; color: #fff" >
                                        <a href="{{route('Procesos')}}" class="btn col-md-4 col-md-offset-1 " style="background:#3377FF; color: #fff" >
                                        Volver a Inicio
                                        </a>
                                       @else

                                    <a href="{{ route($ruta)}}" class="btn col-md-6 col-md-offset-3" style="background: #a50029; color: #fff" >
                                        Volver a Inicio
                                    </a>
                                        @endif
                                    
                                </div>
               
            </div>  
            </form>
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
