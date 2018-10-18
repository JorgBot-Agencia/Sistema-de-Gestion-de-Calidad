<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proceso;
use App\Subproceso;
use App\Indicadore;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Resultados_indicadore;
class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

public function presentacion()
    {
        return  view("indicadores.present_indica", array("formato"=>"Presentacion de Indicadores"));
    }

         public function  register()
    {
        $procesos = Proceso::All();
        $subprocesos = Subproceso::All();

        return  view("auth.register", array("procesos"=>$procesos,"subprocesos"=>$subprocesos));
    }


    public function  present_indicador()
    {
        $procesos    = Proceso::All();
        $subprocesos = Subproceso::All();
        $indicadores = Indicadore::All();
        $user        = User::All();
    return  view("indicadores.present_indica", array("procesos"=>$procesos,"subprocesos"=>$subprocesos,
                "indicadores"=>$indicadores, "users"=>$user,"titulo1"=>"PRESENTACIÓN DE INDICADORES",
                "titulo2"=>"SISTEMA INTEGRADO DE GESTIÓN CALIDAD"));
    }




       public function  visualizar_indicador()
    {
        $procesos    = Proceso::All();
    return  view("indicadores.visualizacion_indica", array("procesos"=>$procesos,"titulo1"=>"PRESENTACIÓN DE INDICADORES",
                "titulo2"=>""));
    }




  
    public function store(Request $request)
    {
        $fecha_inicio =date_create($request["anio_indicador"]."/".$request["fecha_inicio"]."/01");
        $fecha_fin =date_create($request["anio_indicador"]."/".$request["fecha_fin"]."/01");
        if($request["id_resul_indicadores"]==""){

        $indicador = Indicadore::find($request["id_indicadore"]);

        if($request["ciudad"]==="Cucuta"){
            $meta =$indicador->meta_cucuta;
        }else{
            $meta =$indicador->meta_bucaramanga;
        }
        Resultados_indicadore::create(["indicadore_id"=>$request["id_indicadore"],
         "proceso_id"=>$indicador->proceso_id, "subproceso_id"=>$indicador->subproceso_id,
         "fecha_inicio"=>$fecha_inicio,"fecha_fin"=>$fecha_fin,
         "periocidad"=>$request["periocidad"],"resultado"=>$request["resultado"],
         "analisis"=>$request["analisis"],"user_report"=>$request["user_report"],
         "user_id"=>Auth::user()->id,"periocidad_id"=>$request["periocidad_id"],"meta"=>$meta,"ciudad"=>$request["ciudad"]]);
        if(DB::statement('UPDATE subprocesos SET subprocesos.unir = (SELECT COUNT(id) FROM indicadores WHERE indicadores.subproceso_id = subprocesos.id)WHERE subprocesos.id>0')){
            echo json_encode( array('estado' => "OK", "mensaje"=>"Agregado Correctamente" )); 
        }
        
             }
             else
             {
                $indicador = Indicadore::find($request["id_indicadore"]);

                $resultado =Resultados_indicadore::find($request["id_resul_indicadores"]);
                 $resultado->indicadore_id = $request["id_indicadore"];
                 $resultado->proceso_id = $indicador->proceso_id;
                 $resultado->subproceso_id = $indicador->subproceso_id;
                 $resultado->fecha_inicio = $fecha_inicio;
                 $resultado->fecha_fin = $fecha_fin;
                 $resultado->periocidad = $request["periocidad"];
                 $resultado->resultado = $request["resultado"];
                 $resultado->analisis = $request["analisis"];
                 $resultado->ciudad = $request["ciudad"];
                 $resultado->user_report = $request["user_report"];
                 $resultado->save();
                 if(DB::statement('UPDATE subprocesos SET subprocesos.unir = (SELECT COUNT(id) FROM indicadores WHERE indicadores.subproceso_id = subprocesos.id)WHERE subprocesos.id>0')){
                    echo json_encode( array('estado' => "OK", "mensaje"=>"Actualizado Correctamente" ));
 
                 }
                



             }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
        

    public function Indicadores_subproceso(Request $request)
    {
    
      $subproceso = $request["subproceso"];
        $resultados = Indicadore::select("*")->where([["subproceso_id","=", $subproceso]])->get();
    
         if($resultados->count()==0){
            echo json_encode(array("estado"=>"Ninguno"));
            
         }else
         {
             echo json_encode(array("estado"=>"Indicador Existente","mensaje"=>"Indicador Existente, Actualize los datos","resultado"=>$resultados));
            
         }
    }



 public function Indicadores_subproceso_proceso(Request $request)
    {
    
      $proceso = $request["proceso"];
        $resultados = Subproceso::select("*")->where([["proceso_id","=", $proceso]])->get();
    
         if($resultados->count()==0){
            echo json_encode(array("estado"=>"Ninguno"));
            
         }else
         {
             echo json_encode(array("estado"=>"Indicador Existente","mensaje"=>"Indicador Existente, Actualize los datos","resultado"=>$resultados));
            
         }
    }











    public function Indicador_busquedad(Request $request)
    {
    
        $fecha_inicio =date_create($request["anio_indicador"]."/".$request["fecha_inicio"]."/01");
        $fecha_fin =date_create($request["anio_indicador"]."/".$request["fecha_fin"]."/01");
        $resultados = Resultados_indicadore::select("*")->where([["fecha_inicio","=",$fecha_inicio],["fecha_fin","=",$fecha_fin],
            ["indicadore_id","=",$request["id_indicadore"]],["ciudad","=",$request["ciudad"]]])->get();
    
         if($resultados->count()==0){
            echo json_encode(array("estado"=>"Ninguno"));
            
         }else
         {
             echo json_encode(array("estado"=>"Indicador Existente","mensaje"=>"Indicador Existente, Actualize los datos","resultado"=>$resultados));
            
         }
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
