<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proceso;
use App\Subproceso;
use \stdClass;
use App\Indicadore;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Redirect;
class CRUDSController extends Controller
{
    //
    //   * @return void

      public function __construct()
      {
          $this->middleware('auth');
      }
      //Request $request
      public function procesos_view()
      {
        $procesos =Proceso::all();

      return view('CRUDS.procesos', array('procesos' => $procesos));
      }

      public function Procesos_Visualiza($id,$ruta)
      {
        $proceso="";
        if($ruta=="actualizar"){
          $ruta ="procesos_update";
           $proceso =Proceso::find($id);
        }else if($ruta=="crear"){
          $ruta ="procesos_create";
          $proceso1 = new stdClass();
          $proceso1->nombre = "";
          $proceso1->descripcion = "";
          $proceso1->id = "";
          $proceso = $proceso1;
        }else{
          $ruta ="Procesos";
           $proceso =Proceso::find($id);
        }

      return view('CRUDS.procesos_visualiza', array('proceso' => $proceso,"id"=>$id,"ruta"=>$ruta));
      }

      public function procesos_update(Request $request)
      {
       $proceso = Proceso::find($request["id"]);
       $proceso->nombre =$request["nombre_proceso"];
       $proceso->descripcion =$request["descripcion_proceso"];
       $proceso->save();
        
       return  redirect('Procesos')->with('status', 'Actualizado Correctamente');

      
      }

      public function procesos_create(Request $request)
      {
         Proceso::create(["nombre"=>$request["nombre_proceso"],"descripcion"=>$request["descripcion_proceso"]]);
      
        return  redirect('Procesos')->with('status', 'Agregado Correctamente');
      
      }

      public function procesos_delete(Request $request)
      {
         Proceso::destroy($request["id"]);
      
        return  redirect('Procesos')->with('status', 'Eliminado Correctamente');
      
      }
      
      
      ////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////INDICADORES/////////////////////////
      ////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////



      public function Indicadores_all()
      {
        $indicadores =Indicadore::all();
        

      return view('CRUDS.indicadores_all', array('elementos' => $indicadores));
      }

      public function Indicadores_Ver($id,$ruta)
      {
        $estilo="";
        $procesos = Proceso::All();
        $subprocesos = Subproceso::All();
        $users = User::All();
        $elemento="";
        if($ruta=="actualizar"){
          $ruta ="Indicadores_update";
           $elemento =Indicadore::find($id);
           $estilo="none";
        }else if($ruta=="crear"){
          $ruta ="Indicadores_create";
          $elemento1 = new stdClass();
          $elemento1->proceso_id = "";
          $elemento1->subproceso_id ="";
          $elemento1->indicador ="";
          $elemento1->formula ="";
          $elemento1->user_id ="";
          $elemento1->interpretacion ="";
          $elemento1->frecuencia ="";
          $elemento1->origen ="";
          $elemento1->meta_cucuta ="";
          $elemento1->meta_bucaramanga ="";
          $elemento1->funcionarios ="";
          $elemento = $elemento1;
        }else{
           $ruta ="Indicadores";
           $estilo="none";
           $elemento =Indicadore::find($id);
        }

      return view('CRUDS.indicadores_formulario', array('elemento' => $elemento,"id"=>$id,"ruta"=>$ruta,
        "procesos"=>$procesos,"subprocesos"=>$subprocesos,"users"=>$users,"estilo"=>$estilo));
      }

      public function Indicadores_update(Request $request)
      {

       $elemento = Indicadore::find($request["id"]);
       $elemento->proceso_id = $request["proceso_id"];
       $elemento->subproceso_id =$request["subproceso_id"];
       $elemento->indicador =$request["nombre_indicador"];
       $elemento->formula =$request["formula_indicador"];
       $elemento->user_id =$request["user_id"];
       $elemento->interpretacion =$request["interpretacion_indicador"];
       $elemento->frecuencia =$request["periocidad"];
       $elemento->origen =$request["origen_indicador"];
       $elemento->funcionarios =$request["funcionarios_indicador"];
        $elemento->meta_cucuta =$request["meta_cucuta"];
        $elemento->meta_bucaramanga =$request["meta_bucaramanga"];
      
       $elemento->save();
        if(DB::statement('UPDATE subprocesos SET subprocesos.unir = (SELECT COUNT(id) FROM indicadores WHERE indicadores.subproceso_id = subprocesos.id)WHERE subprocesos.id>0')){
        
       return  redirect('Indicadores')->with('status', 'Actualizado Correctamente');
     }
      
      }

      public function Indicadores_create(Request $request)
      {
         Indicadore::create(["indicador"=>$request["nombre_indicador"],"proceso_id"=>$request["proceso_id"],
          "subproceso_id"=>$request["subproceso_id"],"formula"=>$request["formula_indicador"],
          "frecuencia"=>$request["periocidad"],"interpretacion"=>$request["interpretacion_indicador"],
          "origen"=>$request["origen_indicador"],"funcionarios"=>$request["funcionarios_indicador"],
          "user_id"=>$request["user_id"], "meta_cucuta"=>$request["meta_cucuta"],
          "meta_bucaramanga"=>$request["meta_bucaramanga"]]);
       if(DB::statement('UPDATE subprocesos SET subprocesos.unir = (SELECT COUNT(id) FROM indicadores WHERE indicadores.subproceso_id = subprocesos.id)WHERE subprocesos.id>0')){
        return  redirect('Indicadores')->with('status', 'Agregado Correctamente');
      }
      }

      public function Indicadores_delete(Request $request)
      {
         Indicadore::destroy($request["id"]);
      
        return  redirect('Indicadores')->with('status', 'Eliminado Correctamente');
      
      }





















}
