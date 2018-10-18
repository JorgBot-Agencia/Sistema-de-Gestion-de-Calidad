@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">
                    <div style="height: 100px; width: 100px; border-radius: 100px; background: #e6e7e8; margin-left: auto;margin-right: auto;"></div>
                    <h1>{{$elemento->indicador}}</h1>
                </div>

                <div class="panel-body">
            <form action="{{ route($ruta)}}" method="post">
                 {{ csrf_field() }}
                <div class="row">

                 <div class="col-md-12" style="margin-top: 10px">
                            <div class="col-md-4">
                            <label for="proceso_id"  class="col-md-4 form-control" style="border:none">Proceso</label>
                             </div>

                            <div class="col-md-6">
                                <select  id="proceso_id" class="form-control" name="proceso_id" >
                                    @foreach($procesos as $proceso)
                                    <option style="display: {{$estilo}}" value="{{$proceso->id}}">{{$proceso->nombre}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>


                          <div class="col-md-12" style="margin-top: 10px">
                             <div class="col-md-4">
                            <label for="subproceso_id" class="col-md-4 form-control" style="border:none">Sub proceso</label>
                        </div>

                            <div class="col-md-6">
                                <select id="subproceso_id" class="form-control" name="subproceso_id" >
                                    @foreach($subprocesos as $subproceso)
                                    <option data-proceso="{{$subproceso->proceso_id}}" value="{{$subproceso->id}}">{{$subproceso->nombre}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div> 



                <div class="col-md-12" >
                    <div class="col-md-4">
                       <label class="form-control" style="border:none" for="nombre">Nombre Inidcador</label>
                    </div>
                    <div class="col-md-6">
                        <input required class="form-control" id="nombre_indicador" type="text" name="nombre_indicador" value="{{$elemento->indicador}}"  placeholder="Nombre del Indicador">
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 10px">
                    <div class="col-md-4">
                       <label class="form-control" style="border:none" for="formula_indicador">Formula Indicador</label>
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" id="formula_indicador"  name="formula_indicador"  placeholder="Formula del Indicador">{{$elemento->formula}}</textarea>
                       
                    </div>
                </div>


                   <div class="col-md-12" style="margin-top: 10px">
                             <div class="col-md-4">
                            <label for="proceso_id" class="col-md-4 form-control" style="border:none">Responsable</label>
                        </div>

                            <div class="col-md-6">
                                <select id="user_id" class="form-control" name="user_id" >
                                    @foreach($users as $user)
                                    <option data-proceso="{{$subproceso->proceso_id}}" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                    </div>

                 <div class="col-md-12" style="margin-top: 10px">
                    <div class="col-md-4">
                       <label class="form-control" style="border:none" for="interpretacion_proceso">Interpretacion</label>
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" id="interpretacion_indicador"  name="interpretacion_indicador"  placeholder="Interpretacion del Indicador">{{$elemento->interpretacion}}</textarea>
                       
                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 10px">
                             <div class="col-md-4">
                            <label for="proceso_id" class="col-md-4 form-control" style="border:none">Frecuencia</label>
                        </div>

                            <div class="col-md-6">
                                <select id="periocidad" class="form-control" name="periocidad" >
                                   
                             <option  value="TRIMESTRAL">TRIMESTRAL</option>
                              <option  value="MENSUAL">MENSUAL</option>
                                  
                                </select>
                                
                            </div>
                </div>



                <div class="col-md-12" >
                    <div class="col-md-4">
                       <label class="form-control" style="border:none" for="nombre">Meta Cucuta</label>
                    </div>
                    <div class="col-md-6">
                        <input required class="form-control" id="meta_cucuta" type="text" name="meta_cucuta" value="{{$elemento->meta_cucuta}}"  placeholder="Meta en Cucuta">
                    </div>
                </div>


                <div class="col-md-12" >
                    <div class="col-md-4">
                       <label class="form-control" style="border:none" for="nombre">Meta Bucaramanga</label>
                    </div>
                    <div class="col-md-6">
                        <input required class="form-control" id="meta_bucaramanga" type="text" name="meta_bucaramanga" value="{{$elemento->meta_bucaramanga}}"  placeholder="Meta en Bucaramanga">
                    </div>
                </div>






                 <div class="col-md-12" style="margin-top: 10px">
                             <div class="col-md-4">
                            <label for="origen_indicador" class="col-md-4 form-control" style="border:none">Origen de Datos</label>
                        </div>

                            <div class="col-md-6">
                               <textarea class="form-control" id="origen_indicador"  name="origen_indicador"  placeholder="Origen de Datos Indicador">{{$elemento->origen}}</textarea>
                                
                            </div>
                    </div>


                     <div class="col-md-12" style="margin-top: 10px">
                             <div class="col-md-4">
                            <label for="origen_indicador" class="col-md-4 form-control" style="border:none">Funcionario a Informar</label>
                        </div>

                            <div class="col-md-6">
                               <textarea class="form-control" id="funcionarios_indicador"  name="funcionarios_indicador"  placeholder="funcionarios a Reportar indicador">{{$elemento->funcionarios}}</textarea>
                                
                            </div>
                    </div>

 
                        
                
                    <div class="col-md-12">
                                         @if($ruta =="Indicadores_update" )
                                         <input type="hidden" name="id" value="{{$id}}">
                                    <input type="submit" id="save_elemento" value="Actualizar" class="btn col-md-4 col-md-offset-1" style="background: #a50029; color: #fff" >
                                    <a href="{{route('Indicadores')}}" class="btn col-md-4 col-md-offset-1 " style="background:#3377FF; color: #fff" >
                                        Volver a Inicio
                                        </a>
                                       @elseif($ruta =="Indicadores_create" )
                                        <input type="submit" id="save_elmento" value="Crear" class="btn col-md-4 col-md-offset-1  " style="background: #a50029; color: #fff" >
                                        <a href="{{route('Indicadores')}}" class="btn col-md-4 col-md-offset-1 " style="background:#3377FF; color: #fff" >
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
        $("#proceso_id").val("{{$elemento->proceso_id}}");
        $("#subproceso_id").val("{{$elemento->subproceso_id}}")
        $("#periocidad").val("{{$elemento->frecuencia}}")
        $("#user_id").val("{{$elemento->user_id}}")


         $("#subproceso_id").on("change", function(){

            $("#proceso_id").val($("#subproceso_id option:selected").attr("data-proceso"));
        
        });

         






    });
</script>
@endsection
