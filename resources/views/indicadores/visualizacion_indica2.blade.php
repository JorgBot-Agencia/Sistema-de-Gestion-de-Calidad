@extends('layouts.encabezado')

@section('content')
<div class="container">

    <div class="col-md-12" style="margin-top:15px">
      <div class="col-md-6 col-md-offset-3">
        <div class="col-md-6" style="margin-right: 0; padding-right: 0;">
        <label class="form-control" style="border:none; background: #ffe2e2;">Seleccione el Año:</label>
        </div>
        <div class="col-md-6">
        <select id="anio_informe" class="form-control">
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
      </div>
    </div>

    <div class="col-md-12">
       @foreach($procesos as $proceso)
        <div id="menu_proceso" class="col-md-2" data-id_proceso="{{$proceso->id}}">
          {{$proceso->nombre}}
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="overflow: scroll;">
                  <div class="row" style="overflow: scroll;">

                     <div id="indicadores_trimestrales2" class="col-md-12" style="margin-top:15px">
                      </div>
                      <div  id="indicadores_mensuales2"  class="col-md-12">
                     
                        </div>


                  </div>
                   





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script >
  var desicion_id="";
$("#fila_promedio1").hide();
$("#fila_promedio2").hide();
var id_proceso ="";
    $(document).ready(function($) {
var fecha = new Date();
var anio = fecha.getFullYear();

$("select#anio_informe").val(anio)
$("select#anio_informe").on("change", function(){


id_proceso      = 1;
 
  var anio_informe    = $("#anio_informe option:selected").val();
  var data_send       = {
                            id_proceso     : id_proceso,
                             _token        :'{{ csrf_token() }}',
                             anio_informe  : anio_informe
                       }

                       $.ajax({
                                   headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                           },
                                       type:"POST",
                                       dataType:"json",
                                       data:data_send,
                                       url:"{{ route('Get_indicador')}}",
                                       success: function(resp){
             


                                                    $("#indicadores_trimestrales2").empty();
                                                     $("#indicadores_mensuales2").empty();
                                        $("#indicadores_trimestrales").empty();
                                          $("#fila_promedio1").hide();
                                          $("#fila_promedio2").hide();
                                          $("tr#trimestre_1").empty();
                                          $("tr#trimestre_2").empty();
                                          $("tr#trimestre_3").empty();
                                          $("tr#trimestre_4").empty();
                                          if(resp["estado"]==="OK"){
                                            var indicadores = resp["resultados"];
                                            
                                            var contador_trimestre =0;
                                            var fila_trimestre_1="";
                                            var fila_trimestre_2="";
                                            var fila_trimestre_3="";
                                            var fila_trimestre_4="";
                                            var mensual_dato =3;
                                            var trimestral_dato =3;

                                            var fila_trimestre_1_mes="";
                                            var fila_trimestre_2_mes="";
                                            var fila_trimestre_3_mes="";
                                            var fila_trimestre_4_mes="";
                                            var fila_trimestre_5_mes="";
                                            var fila_trimestre_6_mes="";
                                            var fila_trimestre_7_mes="";
                                            var fila_trimestre_8_mes="";
                                            var fila_trimestre_9_mes="";
                                            var fila_trimestre_10_mes="";
                                            var fila_trimestre_11_mes="";
                                            var fila_trimestre_12_mes="";
                                            var ejemploPropiedades = new Array();

                                             
                                            for(var x=0; x<indicadores.length; x++){

                                                var indicadore_selec =indicadores[x];
                                                var desc_indicadore =indicadore_selec["indicadore"];
                                               var subproceso = desc_indicadore["subproceso"];
                                                      

                                                if(desc_indicadore["frecuencia"]==="TRIMESTRAL")
                                                {
                                                    
                                                          var subproceso = desc_indicadore["subproceso"];



                                                        //alert(subproceso["nombre"])
                                                 
                                                          if($('table#trimestrales').length)
                                                           {

                                                          if($('table#trimestrales tr#indicadores td#'+desc_indicadore["id"]+'').length){
                                                            if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {


                                                              
                                                            }else{
                                                              $('table#trimestrales tr#indicadores td#'+desc_indicadore["id"]+'').attr('colspan',2)
                                                            }

                                                            }else
                                                            {
                                                              $("table#trimestrales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')
                                                            }
                                                            if($("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).length)
                                                            {
                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              if(trimestral_dato>3){
                                                               //alert(indicadore_selec["resultado"]+"--fila--"+fila_correspondiente_tri);
                                                               //  var mescla = $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan')
                                                             // mescla = parseFloat(mescla) +1;
                                                             // trimestral_dato = trimestral_dato+1;
                                                              //$("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan', mescla)
                                                              }
                                                              


                                                            }else{
                                                             // alert("distintp"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri)

                                                             trimestral_dato = trimestral_dato+1;
                                                            }
                                                            }else

                                                            {
                                                            
                                                            trimestral_dato = trimestral_dato+1;
                                                            //alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);
                                                              $("table#trimestrales thead tr#proceso_trimestre").append('<th colspan="1" id="subproceso_'+subproceso["id"]+'">'+subproceso["nombre"]+'</th>');
                                                              
                                                            }

                                                            ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = trimestral_dato;
                                                            var fila_correspondiente_tri = ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]];
                                                            // alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);
                                                              
                                                            if(indicadore_selec["periocidad_id"]===1){
                                                            //alert(4)
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                             $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                                                             
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                             $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){
                                                             

                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3+"");
                                                              //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){
                                                            
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                             $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(4+"--"+indicadore_selec["resultado"])
                                                               
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }

                                                            if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").text()+"--"+indicadore_selec["meta"] )
                                                             if(fila_correspondiente_tri ===3) {
                                                              
                                                               
                                                               //alert(indicadore_selec["resultado"]+"--fila--"+fila_correspondiente_tri);
                                                                // var mescla = $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan')
                                                              //mescla = parseFloat(mescla) +1;
                                                              
                                                             // trimestral_dato = trimestral_dato+1;
                                                             //$("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan', mescla)
                                                              
                                                            }
                                                            }
                                                           
                                                            
                                                            

                                                            //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                        else{

                                                      
                                                                 var agregar_2="<table class='table table-bordered mitable'  id='trimestrales'>"+
                                                                  "<thead><tr id='proceso_trimestre'>"+
                                                                 '<th></th><th></th><th colspan="1" style="text-align:center" id="subproceso_'+subproceso["id"]+'" >'+subproceso["nombre"]+'</th>'+
                                                                  "</tr>"+
                                                                  "<tr id='indicadores'>"+
                                                                   '<td rowspan="2">TRIMESTRE</td>'+
                                                                              '<td rowspan="2">AÑO</td>'+
                                                                  "</tr>"+
                                                                 '<tr id="metas"></tr>'+
                                                                  "</thead>"+
                                                                  "<tbody>"+
                                                                  "<tr id='trimestre_1'><td>Enero - Marzo</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_2'><td>Abril - Junio</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_3'><td>Julio - Septiembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_4'><td>Octubre - Diciembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "</tbody>"+
                                                                  "</table>";
                                                          
                                                                    $("#indicadores_trimestrales2").append(agregar_2)
                                                                    $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" class="meta" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'" >'+indicadore_selec["meta"]+'</td>');
                                                                    $("table#trimestrales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')  
                                                                ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = trimestral_dato;
                                                                    //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                                    if(indicadore_selec["periocidad_id"]===1){
                                          
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                  
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){

                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){
                                               
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                           

                                                             }


                                                             contador_trimestre=contador_trimestre+1
                                                 // $("table#trimestrales thead th#proceso_trimestre").attr('colspan',(contador_trimestre+2))




                                                  

                                                }
                                                if(desc_indicadore["frecuencia"]==="MENSUAL")
                                                { 


















                                                               var subproceso = desc_indicadore["subproceso"];





                                                        //alert(subproceso["nombre"])
                                                 
                                                          if($('table#mensuales').length)
                                                           {

                                                          if($('table#mensuales tr#indicadores td#'+desc_indicadore["id"]+'').length){
                                                            if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {

                                                              
                                                            }else{
                                                              $('table#mensuales tr#indicadores td#'+desc_indicadore["id"]+'').attr('colspan',2)
                                                            }

                                                            }else
                                                            {
                                                              $("table#mensuales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')
                                                            }
                                                            if($("table#mensuales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).length)
                                                            {
                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //if(mensual_dato>3){
                                                              // alert(indicadore_selec["resultado"]+"--fila--"+fila_correspondiente_tri);
                                                                 var mescla = $("table#mensuales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan')
                                                              mescla = parseFloat(mescla) +1;
                                                              
                                                             // trimestral_dato = trimestral_dato+1;
                                                              $("table#mensuales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan',subproceso["unir"])
                                                             // }
                                                             mensual_dato = parseFloat($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").attr("data-fila"))
                                                              


                                                            }else{
                                                             // alert("distintp"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri)

                                                             mensual_dato = mensual_dato+1;
                                                            }
                                                            }else

                                                            {
                                                            
                                                            mensual_dato = mensual_dato+1;
                                                            //alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);
                                                              $("table#mensuales thead tr#proceso_trimestre").append('<th colspan="1" id="subproceso_'+subproceso["id"]+'">'+subproceso["nombre"]+'</th>');
                                                              
                                                            }

                                                            ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = mensual_dato;
                                                            var fila_correspondiente_tri = ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]];
                                                            // alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);
                                                            if(indicadore_selec["periocidad_id"]===1){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              

                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                                                             
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){
                                                             

                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3_mes+"");
                                                              //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===5){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_5_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===6){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_6_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }

                                                            if(indicadore_selec["periocidad_id"]===7){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_7_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===8){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_8_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }


                                                            if(indicadore_selec["periocidad_id"]===9){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_9_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }


                                                            if(indicadore_selec["periocidad_id"]===10){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_10_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                           


                                                           if(indicadore_selec["periocidad_id"]===11){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_11_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                           
                                                            


                                                            if(indicadore_selec["periocidad_id"]===12){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_12_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            

                                                            //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                        else{

                                                      
                                                                 var agregar_2="<table class='table table-bordered mitable'  id='mensuales'>"+
                                                                  "<thead><tr id='proceso_trimestre'>"+
                                                                 '<th></th><th></th><th colspan="1" style="text-align:center" id="subproceso_'+subproceso["id"]+'" >'+subproceso["nombre"]+'</th>'+
                                                                  "</tr>"+
                                                                  "<tr id='indicadores'>"+
                                                                   '<td rowspan="2">TRIMESTRE</td>'+
                                                                              '<td rowspan="2">AÑO</td>'+
                                                                  "</tr>"+
                                                                 '<tr id="metas"></tr>'+
                                                                  "</thead>"+
                                                                  "<tbody>"+
                                                                  "<tr id='trimestre_1'><td>Enero</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_2'><td>Febrero</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_3'><td>Marzo</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_4'><td>Abril</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_5'><td>Mayo</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_6'><td>Junio</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_7'><td>Julio</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_8'><td>Agosto</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_9'><td>Septiembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_10'><td>Octubre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_11'><td>Noviembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_12'><td>Diciembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "</tbody>"+
                                                                  "</table>";
                                                          
                                                                    $("#indicadores_mensuales2").append(agregar_2)
                                                                    $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'" >'+indicadore_selec["meta"]+'</td>');
                                                                    $("table#mensuales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')  
                                                                ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = mensual_dato;
                                                                    //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                                    if(indicadore_selec["periocidad_id"]===1){
                                                              //alert(indicadore_selec["resultado"]+"--"+ mensual_dato)
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                  
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){

                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }








                                                            if(indicadore_selec["periocidad_id"]===5){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_5_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===6){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_6_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }




                                                            if(indicadore_selec["periocidad_id"]===7){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_7_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }





                                                            if(indicadore_selec["periocidad_id"]===8){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_8_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===9){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_9_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===10){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_10_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }

                                                            if(indicadore_selec["periocidad_id"]===11){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_11_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }


                                                            if(indicadore_selec["periocidad_id"]===12){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_12_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                           

                                                             }


                                                             contador_trimestre=contador_trimestre+1
                                                 // $("table#trimestrales thead th#proceso_trimestre").attr('colspan',(contador_trimestre+2))




                                                  



















                                                    

                                                  }//cierre mensual
                                                  
                                            }//cierre for
                                          
                                            var filas =  5;
                                            var maximo_fila = $("table#trimestrales tr#metas td").length+2;
                                            //alert("maximo --"+maximo_fila)
                                            var celdas = $("table#trimestrales thead tr#metas td").length;
                                            //alert(celdas)
                                            for(var j=1; j<15; j++ ){
                                          
                                             $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+j).attr("colspan",0)
                                             
                                            }
                                            var celdas = $("table#trimestrales thead tr#metas td").length;

                                            for(var j=1; j<(celdas+1); j++ ){
                                             var subproceso= $("table#trimestrales thead tr#metas td:nth-child("+j+")").attr("data-proceso");

                                             //alert("Procesp---"+subproceso)
                                             var mescla = $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso).attr('colspan')
                                            // alert("mescla----"+mescla+"subproceso---"+subproceso)
                                             
                                             
                                              mescla =parseFloat(mescla)+1;
                                            
                                                           //var suma=  parseFloat(mescla) +1;
                                                              
                                             $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso).attr("colspan",mescla)
                                             
                                            }

                                            for(var x=1; x<filas; x++){
                                              var fila =$("table#trimestrales tbody tr:nth-child("+x+") td").length;
                                               var agregar = (contador_trimestre+2)-fila;
                                               //alert("agregar--"+ agregar)
                                                for(var y=0; y<agregar; y++){
                                                  
                                                  $("table#trimestrales tbody tr:nth-child("+x+")").append("<td></td>");
                                                }
                                                var fila =$("table#trimestrales tbody tr:nth-child("+x+") td").length;



                                             //alert("mis filas + "+fila)
                                             var diferencia = fila-maximo_fila;
                                             //alert("diferencia --"+diferencia+" --"+fila+"--")
                                             for(var m=0; m<(diferencia); m++)
                                             {
                                              var w = fila-m;
                                               $("table#trimestrales tbody tr:nth-child("+x+") td:nth-child("+w+")").remove();
                                             }
                                               
                                                  
                                                
                                              }



                                              
                                              var filas =  13;
                                            
                                            var maximo_fila = $("table#mensuales tr#metas td").length+2;
                                            //alert("maximo --"+maximo_fila)

                                            for(var x=1; x<filas; x++){
                                              var fila =$("table#mensuales tbody tr:nth-child("+x+") td").length;
                                               var agregar = (contador_trimestre+2)-fila;
                                               //alert("agregar--"+ agregar)
                                                for(var y=0; y<agregar; y++){
                                                  
                                                  $("table#mensuales tbody tr:nth-child("+x+")").append("<td></td>");
                                                }
                                                var fila =$("table#mensuales tbody tr:nth-child("+x+") td").length;



                                             //alert("mis filas + "+fila)
                                             var diferencia = fila-maximo_fila;
                                             //alert("diferencia --"+diferencia+" --"+fila+"--")
                                             for(var m=0; m<(diferencia); m++)
                                             {
                                              var w = fila-m;
                                               $("table#mensuales tbody tr:nth-child("+x+") td:nth-child("+w+")").remove();
                                             }
                                               
                                                  
                                                
                                              }

                                            

                                              desicion_id="";
                                         }//cierre estado ok
                                         else
                                         {
                                         alert("Se ha presentado Algun Error");
                                         }



                                                      },

                                       error:function(jq,status,error){
                                               alert("Se ha presentado un error");
                                       }
                                   });




 





});
$("div#menu_proceso").on("click", function(){

 id_proceso      = $(this).attr("data-id_proceso");
 
  var anio_informe    = $("#anio_informe option:selected").val();
  var data_send       = {
                            id_proceso     : id_proceso,
                             _token        :'{{ csrf_token() }}',
                             anio_informe  : anio_informe
                       }

                       $.ajax({
                                   headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                           },
                                       type:"POST",
                                       dataType:"json",
                                       data:data_send,
                                       url:"{{ route('Get_indicador')}}",
                                       success: function(resp){
             


                                                    $("#indicadores_trimestrales2").empty();
                                                     $("#indicadores_mensuales2").empty();
                                        $("#indicadores_trimestrales").empty();
                                          $("#fila_promedio1").hide();
                                          $("#fila_promedio2").hide();
                                          $("tr#trimestre_1").empty();
                                          $("tr#trimestre_2").empty();
                                          $("tr#trimestre_3").empty();
                                          $("tr#trimestre_4").empty();
                                          if(resp["estado"]==="OK"){
                                            var indicadores = resp["resultados"];
                                            
                                            var contador_trimestre =0;
                                            var fila_trimestre_1="";
                                            var fila_trimestre_2="";
                                            var fila_trimestre_3="";
                                            var fila_trimestre_4="";
                                            var mensual_dato =3;
                                            var trimestral_dato =3;

                                            var fila_trimestre_1_mes="";
                                            var fila_trimestre_2_mes="";
                                            var fila_trimestre_3_mes="";
                                            var fila_trimestre_4_mes="";
                                            var fila_trimestre_5_mes="";
                                            var fila_trimestre_6_mes="";
                                            var fila_trimestre_7_mes="";
                                            var fila_trimestre_8_mes="";
                                            var fila_trimestre_9_mes="";
                                            var fila_trimestre_10_mes="";
                                            var fila_trimestre_11_mes="";
                                            var fila_trimestre_12_mes="";
                                            var ejemploPropiedades = new Array();

                                             var mens = 0;
                                            for(var x=0; x<indicadores.length; x++){

                                                var indicadore_selec =indicadores[x];
                                                var desc_indicadore =indicadore_selec["indicadore"];
                                               var subproceso = desc_indicadore["subproceso"];

                                                  

                                                if(desc_indicadore["frecuencia"]==="TRIMESTRAL")
                                                {
                                                    
                                                          var subproceso = desc_indicadore["subproceso"];
                                                        //alert(subproceso["nombre"])
                                                 
                                                          if($('table#trimestrales').length)
                                                           {

                                                          if($('table#trimestrales tr#indicadores td#'+desc_indicadore["id"]+'').length){
                                                            if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {


                                                              
                                                            }else{
                                                              $('table#trimestrales tr#indicadores td#'+desc_indicadore["id"]+'').attr('colspan',2)
                                                            }

                                                            }else
                                                            {
                                                              $("table#trimestrales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')
                                                            }
                                                            if($("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).length)
                                                            {
                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              if(trimestral_dato>3){
                                                               //alert(indicadore_selec["resultado"]+"--fila--"+fila_correspondiente_tri);
                                                               //  var mescla = $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan')
                                                             // mescla = parseFloat(mescla) +1;
                                                             // trimestral_dato = trimestral_dato+1;
                                                              //$("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan', mescla)
                                                              }
                                                              


                                                            }else{
                                                             // alert("distintp"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri)

                                                             trimestral_dato = trimestral_dato+1;
                                                            }
                                                            }else

                                                            {
                                                            
                                                            trimestral_dato = trimestral_dato+1;
                                                            //alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);
                                                              $("table#trimestrales thead tr#proceso_trimestre").append('<th colspan="1" id="subproceso_'+subproceso["id"]+'">'+subproceso["nombre"]+'</th>');
                                                              
                                                            }

                                                            ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = trimestral_dato;
                                                            var fila_correspondiente_tri = ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]];
                                                            // alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);
                                                              
                                                            if(indicadore_selec["periocidad_id"]===1){
                                                            //alert(4)
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                             $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                                                             
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                             $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){
                                                             

                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3+"");
                                                              //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){
                                                            
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                             $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(4+"--"+indicadore_selec["resultado"])
                                                               
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }

                                                            if($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert($("table#trimestrales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").text()+"--"+indicadore_selec["meta"] )
                                                             if(fila_correspondiente_tri ===3) {
                                                              
                                                               
                                                               //alert(indicadore_selec["resultado"]+"--fila--"+fila_correspondiente_tri);
                                                                // var mescla = $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan')
                                                              //mescla = parseFloat(mescla) +1;
                                                              
                                                             // trimestral_dato = trimestral_dato+1;
                                                             //$("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan', mescla)
                                                              
                                                            }
                                                            }
                                                           
                                                            
                                                            

                                                            //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                        else{

                                                      
                                                                 var agregar_2="<table class='table table-bordered mitable'  id='trimestrales'>"+
                                                                  "<thead><tr id='proceso_trimestre'>"+
                                                                 '<th></th><th></th><th colspan="1" style="text-align:center" id="subproceso_'+subproceso["id"]+'" >'+subproceso["nombre"]+'</th>'+
                                                                  "</tr>"+
                                                                  "<tr id='indicadores'>"+
                                                                   '<td rowspan="2">TRIMESTRE</td>'+
                                                                              '<td rowspan="2">AÑO</td>'+
                                                                  "</tr>"+
                                                                 '<tr id="metas"></tr>'+
                                                                  "</thead>"+
                                                                  "<tbody>"+
                                                                  "<tr id='trimestre_1'><td>Enero - Marzo</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_2'><td>Abril - Junio</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_3'><td>Julio - Septiembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_4'><td>Octubre - Diciembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "</tbody>"+
                                                                  "</table>";
                                                          
                                                                    $("#indicadores_trimestrales2").append(agregar_2)
                                                                    $("table#trimestrales tr#metas").append('<td data-proceso="'+subproceso["id"]+'" class="meta" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'" >'+indicadore_selec["meta"]+'</td>');
                                                                    $("table#trimestrales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')  
                                                                ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = trimestral_dato;
                                                                    //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                                    if(indicadore_selec["periocidad_id"]===1){
                                          
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                  
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){

                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_4 = fila_trimestre_4 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){
                                               
                                                              fila_trimestre_2 = fila_trimestre_2 +"<td></td>";
                                                              fila_trimestre_1 = fila_trimestre_1 +"<td></td>";
                                                              fila_trimestre_3 = fila_trimestre_3 +"<td></td>";
                                                              $("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                           

                                                             }


                                                             contador_trimestre=contador_trimestre+1
                                                 // $("table#trimestrales thead th#proceso_trimestre").attr('colspan',(contador_trimestre+2))




                                                  

                                                }

                                                if(desc_indicadore["frecuencia"]==="MENSUAL")
                                                { 




                                                                 









                                                 
                                                            


                                                               var subproceso = desc_indicadore["subproceso"];
                                                        //alert(subproceso["nombre"]) ===0
                                                          console.log($('table#mensuales').length);
                                                          if($('table#mensuales').length)
                                                           {

                                                              
                                                          if($('table#mensuales tr#indicadores td#'+desc_indicadore["id"]+'').length){
                                                            if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {

                                                              
                                                            }else{
                                                              $('table#mensuales tr#indicadores td#'+desc_indicadore["id"]+'').attr('colspan',2)
                                                            }

                                                            }else
                                                            {
                                                              $("table#mensuales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')
                                                            }
                                                            if($("table#mensuales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).length)
                                                            {
                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //if(mensual_dato>3){
                                                              // alert(indicadore_selec["resultado"]+"--fila--"+fila_correspondiente_tri);
                                                                 var mescla = $("table#mensuales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan')
                                                                  
                                                                   //console.log(mescla);
                                                              mescla = parseFloat(mescla) +1;

                                                              console.log("mescla--"+ mescla+"----"+subproceso["id"])

                                                               var mescla2 = $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan')
                                                               
                                                              $("table#mensuales thead tr#proceso_trimestre th#subproceso_"+subproceso["id"]).attr('colspan', subproceso["unir"])
                                                             // }
                                                             mensual_dato = parseFloat($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").attr("data-fila"))
                                                              


                                                            }else{
                                                             // alert("distintp"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri)

                                                             mensual_dato = mensual_dato+1;
                                                            }
                                                            }else

                                                            {
                                                            
                                                            mensual_dato = mensual_dato+1;
                                                            //alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);
                                                              $("table#mensuales thead tr#proceso_trimestre").append('<th colspan="1" id="subproceso_'+subproceso["id"]+'">'+subproceso["nombre"]+'</th>');
                                                              
                                                            }

                                                            ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = mensual_dato;
                                                            var fila_correspondiente_tri = ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]];
                                                            // alert(indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri);

                                                             mens = mens+1;
                                                            if(indicadore_selec["periocidad_id"]===1){

                                                             //  alert( indicadore_selec["resultado"] + "---"+ x)
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              

                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                                                             
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";

                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])
                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){
                                                             

                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3_mes+"");
                                                              //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');  
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===5){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_5_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===6){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_6_mes+"");

                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }

                                                            if(indicadore_selec["periocidad_id"]===7){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_7_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===8){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_8_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }


                                                            if(indicadore_selec["periocidad_id"]===9){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_9_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }


                                                            if(indicadore_selec["periocidad_id"]===10){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_10_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                           


                                                           if(indicadore_selec["periocidad_id"]===11){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_11_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])
                                                            }
                                                            }
                                                           
                                                            


                                                            if(indicadore_selec["periocidad_id"]===12){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                             $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_12_mes+"");
                                                             //alert(desc_indicadore["id"]+"-"+indicadore_selec["ciudad"])

                                                              if($("table#mensuales tr#metas td#"+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+"").length)
                                                            {
                                                             
                                                                //alert(4)
                                                              //alert(fila_correspondiente_tri +"--"+indicadore_selec["periocidad_id"]+"--"+indicadore_selec["resultado"])
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }else{
                                                              //alert("in fila 4--"+indicadore_selec["resultado"]+"--fila"+fila_correspondiente_tri+"perio"+indicadore_selec["periocidad_id"]);
                                                              //alert(fila_correspondiente_tri) 
                                                            $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'">'+indicadore_selec["meta"]+'</td>');
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+"").append("<td></td>")
                                                            $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]+" td:nth-child("+fila_correspondiente_tri+")").text(indicadore_selec["resultado"])

                                                            }
                                                            }


                                                            //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                        else{

                                                      
                                                                 var agregar_2="<table class='table table-bordered mitable'  id='mensuales'>"+
                                                                  "<thead><tr id='proceso_trimestre'>"+
                                                                 '<th></th><th></th><th colspan="1" style="text-align:center" id="subproceso_'+subproceso["id"]+'" >'+subproceso["nombre"]+'</th>'+
                                                                  "</tr>"+
                                                                  "<tr id='indicadores'>"+
                                                                   '<td rowspan="2">TRIMESTRE</td>'+
                                                                              '<td rowspan="2">AÑO</td>'+
                                                                  "</tr>"+
                                                                 '<tr id="metas"></tr>'+
                                                                  "</thead>"+
                                                                  "<tbody>"+
                                                                  "<tr id='trimestre_1'><td>Enero</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_2'><td>Febrero</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_3'><td>Marzo</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_4'><td>Abril</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_5'><td>Mayo</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_6'><td>Junio</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_7'><td>Julio</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_8'><td>Agosto</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_9'><td>Septiembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_10'><td>Octubre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_11'><td>Noviembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "<tr id='trimestre_12'><td>Diciembre</td><td>"+indicadore_selec["fecha_inicio"].substr(0,4)+"</td></tr>"+
                                                                  "</tbody>"+
                                                                  "</table>";
                                                          
                                                                    $("#indicadores_mensuales2").append(agregar_2)
                                                                    $("table#mensuales tr#metas").append('<td data-fila="'+mensual_dato+'" id="'+desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]+'" >'+indicadore_selec["meta"]+'</td>');
                                                                    $("table#mensuales tr#indicadores").append('<td id="'+desc_indicadore["id"]+'">'+desc_indicadore["indicador"]+'</td>')  
                                                                ejemploPropiedades[desc_indicadore["id"]+"-"+indicadore_selec["ciudad"]] = mensual_dato;
                                                                    //$("table#trimestrales tr#trimestre_"+indicadore_selec["periocidad_id"]).append("<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                                    if(indicadore_selec["periocidad_id"]===1){

                                                              //alert(indicadore_selec["resultado"]+"--"+ mensual_dato)
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                            //  fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_1_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                               
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===2){
                  
                                                             // fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_2_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===3){

                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                            //  fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_3_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                            if(indicadore_selec["periocidad_id"]===4){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                             // fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_4_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }








                                                            if(indicadore_selec["periocidad_id"]===5){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              //fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_5_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===6){

                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              //fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_6_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                             console.log(fila_trimestre_6_mes)

                                                            }




                                                            if(indicadore_selec["periocidad_id"]===7){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                            //  fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_7_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }





                                                            if(indicadore_selec["periocidad_id"]===8){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                             // fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_8_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===9){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                             /// fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_9_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }



                                                            if(indicadore_selec["periocidad_id"]===10){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                            //  fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_10_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }

                                                            if(indicadore_selec["periocidad_id"]===11){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              //fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                              fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_11_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }


                                                            if(indicadore_selec["periocidad_id"]===12){
                                                            
                                                              fila_trimestre_2_mes = fila_trimestre_2_mes +"<td></td>";
                                                              fila_trimestre_3_mes = fila_trimestre_3_mes +"<td></td>";
                                                              fila_trimestre_4_mes = fila_trimestre_4_mes +"<td></td>";
                                                              fila_trimestre_1_mes = fila_trimestre_1_mes +"<td></td>";
                                                              fila_trimestre_5_mes = fila_trimestre_5_mes +"<td></td>";
                                                              fila_trimestre_6_mes = fila_trimestre_6_mes +"<td></td>";
                                                              fila_trimestre_7_mes = fila_trimestre_7_mes +"<td></td>";
                                                              fila_trimestre_8_mes = fila_trimestre_8_mes +"<td></td>";
                                                              fila_trimestre_9_mes = fila_trimestre_9_mes +"<td></td>";
                                                              fila_trimestre_10_mes = fila_trimestre_10_mes +"<td></td>";
                                                              fila_trimestre_11_mes = fila_trimestre_11_mes +"<td></td>";
                                                             // fila_trimestre_12_mes = fila_trimestre_12_mes +"<td></td>";
                                                              $("table#mensuales tr#trimestre_"+indicadore_selec["periocidad_id"]).append(fila_trimestre_12_mes+"<td id='"+indicadore_selec["id"]+"'>"+indicadore_selec["resultado"]+"</td>");
                                                            }
                                                           

                                                             }


                                                             contador_trimestre=contador_trimestre+1
                                                 // $("table#trimestrales thead th#proceso_trimestre").attr('colspan',(contador_trimestre+2))




                                                  



















                                                    

                                                  }//cierre mensual
                                                  
                                            }//cierre for
                                          
                                            var filas =  5;
                                            var maximo_fila = $("table#trimestrales tr#metas td").length+2;
                                            //alert("maximo --"+maximo_fila)
                                            var celdas = $("table#trimestrales thead tr#metas td").length;
                                            //alert(celdas)
                                            for(var j=1; j<15; j++ ){
                                          
                                             $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+j).attr("colspan",0)
                                             
                                            }
                                            var celdas = $("table#trimestrales thead tr#metas td").length;

                                            for(var j=1; j<(celdas+1); j++ ){
                                             var subproceso= $("table#trimestrales thead tr#metas td:nth-child("+j+")").attr("data-proceso");

                                             //alert("Procesp---"+subproceso)
                                             var mescla = $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso).attr('colspan')
                                            // alert("mescla----"+mescla+"subproceso---"+subproceso)
                                              //console.log(mescla)
                                             
                                              mescla =parseFloat(mescla)+1;
                                            
                                                           //var suma=  parseFloat(mescla) +1;
                                                             
                                             $("table#trimestrales thead tr#proceso_trimestre th#subproceso_"+subproceso).attr("colspan",mescla)
                                            
                                             

                                              



                                            }

                                            for(var x=1; x<filas; x++){
                                              var fila =$("table#trimestrales tbody tr:nth-child("+x+") td").length;
                                               var agregar = (contador_trimestre+2)-fila;
                                               //alert("agregar--"+ agregar)
                                                for(var y=0; y<agregar; y++){
                                                  
                                                  $("table#trimestrales tbody tr:nth-child("+x+")").append("<td></td>");
                                                }
                                                var fila =$("table#trimestrales tbody tr:nth-child("+x+") td").length;



                                             //alert("mis filas + "+fila)
                                             var diferencia = fila-maximo_fila;
                                             //alert("diferencia --"+diferencia+" --"+fila+"--")
                                             for(var m=0; m<(diferencia); m++)
                                             {
                                              var w = fila-m;
                                               $("table#trimestrales tbody tr:nth-child("+x+") td:nth-child("+w+")").remove();
                                             }
                                               
                                                  
                                                
                                              }



                                              
                                              var filas =  13;
                                            
                                            var maximo_fila = $("table#mensuales tr#metas td").length+2;
                                            //alert("maximo --"+maximo_fila)

                                            for(var x=1; x<filas; x++){
                                              var fila =$("table#mensuales tbody tr:nth-child("+x+") td").length;
                                               var agregar = (contador_trimestre+2)-fila;
                                               //alert("agregar--"+ agregar)
                                                for(var y=0; y<agregar; y++){
                                                  
                                                  $("table#mensuales tbody tr:nth-child("+x+")").append("<td></td>");
                                                }
                                                var fila =$("table#mensuales tbody tr:nth-child("+x+") td").length;



                                             //alert("mis filas + "+fila)
                                             var diferencia = fila-maximo_fila;
                                             //alert("diferencia --"+diferencia+" --"+fila+"--")
                                             for(var m=0; m<(diferencia); m++)
                                             {
                                              var w = fila-m;
                                               $("table#mensuales tbody tr:nth-child("+x+") td:nth-child("+w+")").remove();
                                             }
                                               
                                                  
                                                
                                              }

                                                mescla=0;                                                                                      

                                              desicion_id="";
                                         }//cierre estado ok
                                         else
                                         {
                                         alert("Se ha presentado Algun Error");
                                         }



                                                      },

                                       error:function(jq,status,error){
                                               alert("Se ha presentado un error");
                                       }
                                   });





});


        $("#save_indicador").on("click", function(e){
          e.preventDefault();
          var fecha_inicio   ="";
          var fecha_fin      ="";
          var anio_indicador = $("#anio option:selected").val();
          var periocidad     = "";
          var resultado      = $("#resultado").val();
          var analisis       = $("#analisis").val();
          var user_report    = $("#user_report").val();
          if(localStorage.getItem("periocidad") ==="TRIMESTRAL"){
            ///alert("trimestral");
            fecha_inicio     = $("#periodo_trimestral option:selected").attr("data-inicio");
            fecha_fin        = $("#periodo_trimestral option:selected").attr("data-fin");
            periocidad       = $("#periodo_trimestral option:selected").text();
          }else{
            //alert("mensual");
            fecha_inicio     = $("#periodo_mensual option:selected").val();
            fecha_fin        = $("#periodo_mensual option:selected").val();
            periocidad       = $("#periodo_mensual option:selected").text();
          }
         var data_send       = {
                                    id_indicadore :    $("#indicadore_id").val(),
                                    fecha_inicio  : fecha_inicio,
                                    fecha_fin     : fecha_fin,
                                    periocidad    : periocidad,
                                    resultado     : resultado,
                                    analisis      : analisis,
                                    user_report   : user_report,
                                    anio_indicador: anio_indicador,
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


    });
</script>
@endsection
