<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicadore;
use App\Resultados_indicadore;
class OperationsController extends Controller
{
    //


    public function  formula_indicador(Request $request)
    {

    	$id_indicador = $request["id_indicadore"];

        $indicadores = Indicadore::find($id_indicador);
    	echo json_encode($indicadores);
    }


        public function Indicadores_get_resultado(Request $request){


        $resultados = Resultados_indicadore::select("*")->with(["indicadore","indicadore.subproceso"])->where("id","=",$request["id"])->get();
        echo json_encode(array('estado' => "OK", "mensaje"=>"Agregado Correctamente",
                        "resultados"=>$resultados)); 


            
        }



    public function  get_indicadores_proceso(Request $request)
    {

    	$id_proceso    = $request["id_proceso"];
      $anio_informe  = $request["anio_informe"];
        $resultados = Resultados_indicadore::select("*")->with(["indicadore","indicadore.subproceso"])->where([['proceso_id',"=",$id_proceso]])->whereYear('fecha_inicio', '=',$anio_informe )->orderBy('indicadore_id', 'ASC')->get();
    	echo json_encode(array('estado' => "OK", "mensaje"=>"Agregado Correctamente",
                        "resultados"=>$resultados));
    }
}
