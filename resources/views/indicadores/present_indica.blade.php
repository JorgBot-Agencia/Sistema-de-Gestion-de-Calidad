@extends('layouts.encabezado')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body" >

                	<form class="form-horizontal" method="POST" action="{{ route('C_present_indicador') }}">
                	     {{ csrf_field() }}
					  <div class="form-group col-md-12">
					    <label for="exampleInputEmail1">Proceso</label>
				           <select  disabled id="proceso_id" class="form-control" name="proceso_id" >
                                    @foreach($procesos as $proceso)
                                    <option value="{{$proceso->id}}">{{$proceso->nombre}}</option>
                                    @endforeach
                                </select>
					  </div>
                          <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Subroceso</label>
                        <select  id="subproceso_id" class="form-control" name="subproceso_id" >
                                  <!-- {{-- @foreach($subprocesos as $subproceso)--}}
                                    <option data-proceso="{{--$subproceso->proceso_id--}}" value="{{--$subproceso->id--}}">{{--$subproceso->nombre--}}</option>-->
                                  {{--  @endforeach--}}
                                </select>
                         </div>

                              <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Indicador</label>
                                <select id="indicadore_id" class="form-control" name="indicadore_id" >
                                           {{-- @foreach($indicadores as $indicadore)--}}
                                            <!--<option  data-subproceso="{{--$indicadore->subproceso_id--}}"  data-proceso="{{--$indicadore->proceso_id--}}" value="{{--$indicadore->id--}}">{{--$indicadore->indicador--}}</option>-->
                                           {{--  @endforeach--}}
                                </select>
                             </div>

                             <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Formula de Indicador  </label>
                                <textarea class="form-control" rows="5" id="formula_indicador" name="formula_indicador">


                                </textarea>
                             </div>
                             <input type="hidden" id="id_resul_indicadores" name="id_resul_indicadores">
      

                              <div class="form-group col-md-12">
                                <label class="col-md-12"  id="frecuencia_indicador" for="exampleInputEmail1">PERIODICIDAD </label>
                               <div class="col-md-6">
                                   <select id="anio" class="form-control" name="anio" >

                                            <!--<option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>-->
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>

                                </select>
                               </div>
                               <div id="periodo_trimestral" style="display:none" class="col-md-6">
                                   <select id="mes" class="form-control" name="mes" >

                                            <option data-inicio="01" data-fin="03" value="1">Enero - Marzo</option>
                                            <option data-inicio="04" data-fin="06" value="2">Abril - Junio</option>
                                            <option data-inicio="07" data-fin="09" value="3">Julio - Septiembre</option>
                                            <option data-inicio="10" data-fin="12" value="4">Octubre - Diciembre</option>



                                </select>
                               </div>


                               <div id="periodo_mensual" style="display:none" class="col-md-6">
                                   <select id="mes" class="form-control" name="mes" >

                                            <option value="01">Enero</option>
                                            <option value="02">Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
                                            <option value="06">Junio</option>
                                            <option value="07">Julio</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>


                                </select>
                               </div>

                             </div>
                               
                                <div class="form-group col-md-6">
                                         <label for="exampleInputEmail1">Ciudad</label>
                                   <select id="ciudad" class="form-control" name="ciudad" >

                                            <option value="Cucuta">Cucuta</option>
                                            <option value="Bucaramanga">Bucaramanga</option>


                                </select>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label id="rs" for="exampleInputEmail1">Resultado de Indicador</label>
                                    <input step="0.01" required type="number" id="resultado" name="resultados" class="form-control" placeholder="">
                                </div>

                                 <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Analisis de Desempeño</label>
                                    <textarea required class="form-control" rows="5" id="analisis" name="analisis">


                                    </textarea>
                                </div>

                                 <div class="form-group col-md-12">
                                                <label class="col-md-12" for="exampleInputEmail1">FUNCIONARIOS A LOS QUE DEBE INFORMAR:</label>
                                                <textarea required class="form-control" rows="5" id="user_report" name="user_report">


                                                </textarea>
                                              <!--  <div class="col-md-12">


                                               </div>-->
                                 </div>

                                 <div class=" col-md-12">
                                    <input type="submit" id="save_indicador" value="Enviar" class="btn col-md-6 col-md-offset-3" style="background: #a50029; color: #fff" >

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

    function ajax_all_post(data_send,url){

                 $.ajax({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        type:"POST",
                        dataType:"json",
                        data:data_send,
                        url:url,
                        success: function(resp){

                            $("#formula_indicador").text(resp["formula"])
                            localStorage.setItem("periocidad",resp["frecuencia"]);
                            $("label#frecuencia_indicador").html("PERIODICIDAD: <strong style='color:#000'>"+ resp["frecuencia"]+"</strong>");
                              if(resp["frecuencia"]==="TRIMESTRAL"){
                                  $("#periodo_mensual").hide();
                                  $("#periodo_trimestral").show();
                              }else{
                                $("#periodo_mensual").show();
                                $("#periodo_trimestral").hide();

                              }
                              $("#ciudad").change();

                                       },

                        error:function(jq,status,error){
                                alert("Se ha presentado un error");
                        }
                    });

    }

    $(document).ready(function($) {

        var fecha = new Date();
      var anio = fecha.getFullYear();

      $("select#anio").val(anio)
        $("#proceso_id").val("{{Auth::user()->proceso_id}}");
         
       // $("#subproceso_id").val("{{Auth::user()->subproceso_id}}")

        $("#subproceso_id").on("change", function(){

            //$("#proceso_id").val($("#subproceso_id option:selected").attr("data-proceso"));
             var subproceso_selec = $("#subproceso_id option:selected").val();

             $.ajax({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        type:"POST",
                        dataType:"json",
                        data:{subproceso: subproceso_selec },
                        url:"{{ route('Indicadores_subproceso')}}",
                        success: function(resp){
                          console.log(resp)
                          if(resp["estado"]==="Ninguno"){
                             $("#resultado").val("");
                             $("#analisis").val("");
                             $("#user_report").val("");
                            $("#formula_indicador").text("")
                            $("select#indicadore_id").empty();
                             return;
                          }
                          $("select#indicadore_id").empty();
                              var indicadores_obtenidos= resp["resultado"];

                          for(var x =0; x<indicadores_obtenidos.length; x++ ){
                            var indicadore_se= indicadores_obtenidos[x];
                            $("select#indicadore_id").append('<option data-id_proc="'+indicadore_se["proceso_id"]+'"    data-id_subproc="'+indicadore_se["subproceso_id"]+'"   value="'+indicadore_se["id"]+'">'+indicadore_se["indicador"]+'</option>');

                          }
                           $("select#indicadore_id").val("");
                          if(indicadores_obtenidos.length===1){
                            $("select#indicadore_id").change();
                          }

                                       },

                        error:function(jq,status,error){
                                alert("Se ha presentado un error");
                        }
                    });





        });





$("#proceso_id").on("change", function(){

            var proceso_select =$("#proceso_id option:selected").val();
           // var subproceso_selec = $("#subproceso_id option:selected").val();


                $.ajax({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        type:"POST",
                        dataType:"json",
                        data:{proceso: proceso_select },
                        url:"{{ route('Indicadores_subproceso_proceso')}}",
                        success: function(resp){
                          console.log(resp)
                          
                             $("select#indicadore_id").val("");
                             $("#resultado").val("");
                             $("#analisis").val("");
                             $("#user_report").val("");
                            $("#id_resul_indicadores").val("");
                          $("select#subproceso_id").empty();
                              var indicadores_obtenidos= resp["resultado"];

                          for(var x =0; x<indicadores_obtenidos.length; x++ ){
                            var indicadore_se= indicadores_obtenidos[x];
                            $("select#subproceso_id").append('<option  value="'+indicadore_se["id"]+'">'+indicadore_se["nombre"]+'</option>');

                          }
                          $("select#subproceso_id").change();

                                       },

                        error:function(jq,status,error){
                                alert("Se ha presentado un error");
                        }
                    });








        });









$("select#proceso_id").change();










        $("#indicadore_id").val("");  

        $("#indicadore_id").on("change", function(){

            var id_indicadore = $("#indicadore_id option:selected").val();
                var url = "{{ route('formula_indicador')}}";
                var data = {
                                    id_indicadore: id_indicadore,
                                    _token:'{{ csrf_token() }}',

                              }
           ajax_all_post(data,url);


        });

        $("#save_indicador").on("click", function(e){
          e.preventDefault();
          var fecha_inicio   ="";
          var fecha_fin      ="";
          var anio_indicador = $("#anio option:selected").val();
          var periocidad     = "";
          var periocidad_id  = "";
          var resultado      = $("#resultado").val();
          var analisis       = $("#analisis").val();
          var user_report    = $("#user_report").val();
          var id_resul_indicadores =$("#id_resul_indicadores").val();
          var ciudad          = $("#ciudad option:selected").val();
          if(localStorage.getItem("periocidad") ==="TRIMESTRAL"){

            fecha_inicio     = $("#periodo_trimestral option:selected").attr("data-inicio");
            fecha_fin        = $("#periodo_trimestral option:selected").attr("data-fin");
            periocidad       = $("#periodo_trimestral option:selected").text();
            periocidad_id    = $("#periodo_trimestral option:selected").val();
          }else{

            fecha_inicio     = $("#periodo_mensual option:selected").val();
            fecha_fin        = $("#periodo_mensual option:selected").val();
            periocidad       = $("#periodo_mensual option:selected").text();
            periocidad_id    = $("#periodo_mensual option:selected").val();
          }
         // alert(resultado+"--"+analisis+"--"+id_resul_indicadores)
          if(resultado==="" || analisis==="" || user_report===""){
            alert("Ingrese los datos necesarios")
            return;
          }
        
        

         var data_send       = {
                                    id_indicadore        :    $("#indicadore_id").val(),
                                    fecha_inicio         : fecha_inicio,
                                    fecha_fin            : fecha_fin,
                                    periocidad           : periocidad,
                                    resultado            : resultado,
                                    analisis             : analisis,
                                    user_report          : user_report,
                                    anio_indicador       : anio_indicador,
                                    periocidad_id        : periocidad_id,
                                    id_resul_indicadores :id_resul_indicadores,
                                    ciudad               : ciudad,
                                    _token        :'{{ csrf_token() }}',

                              }



        $.ajax({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        type:"POST",
                        dataType:"json",
                        data:data_send,
                        url:"{{ route('Indicador.store')}}",
                        success: function(resp){

                          if(resp["estado"]==="OK"){
                            alert(resp["mensaje"]);
                            location.reload(true);
                          }else{
                          alert("Se ha presentado Algun Error");
                          }

                                       },

                        error:function(jq,status,error){
                                alert("Se ha presentado un error");
                        }
                    });


        });



        $("#periodo_trimestral, #ciudad, #periodo_mensual").on("change", function(e){
            e.preventDefault();
          var fecha_inicio   ="";
          var fecha_fin      ="";
          var anio_indicador = $("#anio option:selected").val();
          var periocidad     = "";
          var periocidad_id  = "";
          var ciudad          = $("#ciudad option:selected").val();
          var id_indicadore =    $("#indicadore_id").val();


          if(localStorage.getItem("periocidad") ==="TRIMESTRAL"){

            fecha_inicio     = $("#periodo_trimestral option:selected").attr("data-inicio");
            fecha_fin        = $("#periodo_trimestral option:selected").attr("data-fin");
            periocidad       = $("#periodo_trimestral option:selected").text();
            periocidad_id    = $("#periodo_trimestral option:selected").val();
          }else{

            fecha_inicio     = $("#periodo_mensual option:selected").val();
            fecha_fin        = $("#periodo_mensual option:selected").val();
            periocidad       = $("#periodo_mensual option:selected").text();
            periocidad_id    = $("#periodo_mensual option:selected").val();
          }
         
          if(id_indicadore===null){
            return;
          }

           
               var data_send       = {
                                    id_indicadore :   id_indicadore,
                                    fecha_inicio  : fecha_inicio,
                                    fecha_fin     : fecha_fin,
                                    periocidad    : periocidad,
                                    anio_indicador: anio_indicador,
                                    periocidad_id : periocidad_id,
                                    ciudad               : ciudad,
                                    _token        :'{{ csrf_token() }}',


                              }

          $.ajax({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        type:"POST",
                        dataType:"json",
                        data:data_send,
                        url:"{{ route('Indicador_busquedad')}}",
                        success: function(resp){

                          if(resp["estado"]==="Indicador Existente"){

                            alert(resp["mensaje"]);
                            
                            var result= resp["resultado"];
                            var datos = result[0];
                           $("#resultado").val(datos["resultado"]);
                           $("#analisis").text(datos["analisis"]);
                           $("#user_report").text(datos["user_report"]);
                           $("#analisis").val(datos["analisis"]);
                           $("#user_report").val(datos["user_report"]);
                           $("#id_resul_indicadores").val(datos["id"]);

                           if("adminprocar@procar.com.co"!=="{{Auth::user()->email}}"){
                            
                            $("#id_resul_indicadores").attr("disabled","disabled");
                              $("#resultado").attr("enable","enable");
                              $("#analisis").attr("enable","enable");
                              $("#user_report").attr("disabled","disabled");
                              $("#analisis").attr("enable","enable");
                              $("#user_report").attr("disabled","disabled");
                              $("#id_resul_indicadores").attr("disabled","disabled");
                            }

                          }else{

                            $("#id_resul_indicadores").prop('disabled', false);
                              $("#resultado").prop('disabled', false);
                              $("#analisis").prop('disabled', false);
                              $("#user_report").prop('disabled', false);
                              $("#analisis").prop('disabled', false);
                              $("#user_report").prop('disabled',false);
                              $("#id_resul_indicadores").prop('disabled', false);



                             $("#id_resul_indicadores").val("");
                              $("#resultado").val("");
                              $("#analisis").text("");
                              $("#user_report").text("");
                              $("#analisis").val("");
                              $("#user_report").val("");
                              $("#id_resul_indicadores").val("")
                          }

                                       },

                        error:function(jq,status,error){
                                alert("Se ha presentado un error");
                        }
                    });
        });

    });
</script>
@endsection
