<?php

use Illuminate\Database\Seeder;
use App\Subproceso;
class SubprocesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Subproceso::create(["nombre"=>"Gerencia ejecutiva","descripcion"=>"Gerencia ejecutiva", "proceso_id"=>1]);
        Subproceso::create(["nombre"=>"Gerencia administrativa","descripcion"=>"Gerencia administrativa", "proceso_id"=>1]);
        Subproceso::create(["nombre"=>"Gestión comercial y distribución","descripcion"=>"Gestión comercial y distribución", "proceso_id"=>2]);
        Subproceso::create(["nombre"=>"Crédito y Cartera","descripcion"=>"Crédito y Cartera", "proceso_id"=>2]);
        Subproceso::create(["nombre"=>"Compras y traslado de mercancías","descripcion"=>"Compras y traslado de mercancías", "proceso_id"=>3]);
        Subproceso::create(["nombre"=>"Infraestructura","descripcion"=>"Infraestructura", "proceso_id"=>4]);
        Subproceso::create(["nombre"=>"Suministros","descripcion"=>"Suministros", "proceso_id"=>4]);
        Subproceso::create(["nombre"=>"Gestión de personal","descripcion"=>"Gestión de personal", "proceso_id"=>5]);
        Subproceso::create(["nombre"=>"Seguridad y salud en el trabajo","descripcion"=>"Seguridad y salud en el trabajo", "proceso_id"=>6]);
        Subproceso::create(["nombre"=>"Calidad","descripcion"=>"Calidad", "proceso_id"=>6]);
    }
}
