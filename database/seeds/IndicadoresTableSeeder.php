<?php

use Illuminate\Database\Seeder;
use App\Indicadore;
use App\Indicadores_visore;
use App\Indicadore_user;
class IndicadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Indicadore::create(["indicador"=>"%CUMPLIMIENTO DE LA POLÍTICA DEL SIG","proceso_id"=>1,
        "subproceso_id"=>2,"formula"=>"SUMATORIA DEL RESULTADO PONDERADO DE OBJETIVOS","user_id"=>1,
        "frecuencia"=>"TRIMESTRAL","interpretacion"=>"Mide el cumplimiento de la politica de calidad","origen"=>"Resultado de indicadores","funcionarios"=>"Todos los que lo necesiten",
    "meta_cucuta"=>"logar Cucuta","meta_bucaramanga"=>"logra Bucaramanga"]);


Indicadore_user::create(["user_id"=>1,"indicadore_id"=>1,"privilegios"=>3]);
Indicadores_visore::create(["user_id"=>1,"indicadore_id"=>1]);
Indicadores_visore::create(["user_id"=>3,"indicadore_id"=>1]);
Indicadores_visore::create(["user_id"=>4,"indicadore_id"=>1]);

Indicadore::create(["indicador"=>"% INCREMENTO EN VENTAS DE LLANTAS","proceso_id"=>1,
"subproceso_id"=>1,"formula"=>"(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100%",
"frecuencia"=>"TRIMESTRAL","interpretacion"=>"verificar el incremento de la ventas tomando como base el presupuesto en pesos de LLANTAS","user_id"=>2,
"origen"=>"Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL","funcionarios"=>"Todos los que lo necesiten",
"meta_cucuta"=>"logar Cucuta","meta_bucaramanga"=>"logra Bucaramanga"]);




Indicadore::create(["indicador"=>"% INCREMENTO EN VENTAS DE FILTROS","proceso_id"=>1,
"subproceso_id"=>1,"formula"=>"(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100% ",
"frecuencia"=>"TRIMESTRAL","interpretacion"=>"verificar el incremento de la ventas tomando como base el presupuesto en pesos de FILTROS","user_id"=>3,
"origen"=>"Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL","funcionarios"=>"Todos los que lo necesiten",
"meta_cucuta"=>"logar Cucuta","meta_bucaramanga"=>"logra Bucaramanga"]);




Indicadore::create(["indicador"=>"% INCREMENTO EN VENTAS DE LUBRICANTES Y ADITIVOS","proceso_id"=>1,
"subproceso_id"=>1,"formula"=>"(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100% ",
"frecuencia"=>"TRIMESTRAL","interpretacion"=>"verificar el incremento de la ventas tomando como base el presupuesto en pesos de LUBRICANTES","user_id"=>4,
"origen"=>"Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL","funcionarios"=>"Todos los que lo necesiten",
"meta_cucuta"=>"logar Cucuta","meta_bucaramanga"=>"logra Bucaramanga"]);





Indicadore::create(["indicador"=>"CUMPLIMIENTO VENTAS GLOBALES","proceso_id"=>2,
"subproceso_id"=>3,"formula"=>"ventas a credito de todas las lineas + ventas de contado de todas las lineas en todos los establecimientos comerciales. ","user_id"=>5,
"frecuencia"=>"MENSUAL","interpretacion"=>"Establecer un monto mínimo de ventas a nivel general",
"origen"=>"Reporte solin Cumplimi vendedor marca SGC","funcionarios"=>"Todos los que lo necesiten",
"meta_cucuta"=>"logar Cucuta","meta_bucaramanga"=>"logra Bucaramanga"]);
    }
}
