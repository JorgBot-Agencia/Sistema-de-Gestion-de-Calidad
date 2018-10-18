<?php

use Illuminate\Database\Seeder;
use App\Proceso;
class ProcesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Proceso::create(["nombre"=>"DIR. ESTRATÉGICO","descripcion"=>"DIR. ESTRATÉGICO"]);
        Proceso::create(["nombre"=>"COMERCIALIZACIÓN","descripcion"=>"COMERCIALIZACIÓN"]);
        Proceso::create(["nombre"=>"COMPRAS","descripcion"=>"COMPRAS"]);
        Proceso::create(["nombre"=>"SERVICIOS Y SUMINISTROS","descripcion"=>"SERVICIOS Y SUMINISTROS"]);
        Proceso::create(["nombre"=>"RECURSOS HUMANOS","descripcion"=>"RECURSOS HUMANOS"]);
        Proceso::create(["nombre"=>"SIG","descripcion"=>"SIG"]);
    }
}
