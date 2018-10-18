<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([ 'name'=>"Administrador", 'email'=>"admin@calida.com", 'password'=>bcrypt("admin"), "proceso_id"=>1, "subproceso_id"=>1,"privilegios"=>5]);
        User::create([ 'name'=>"GERENTE ADMINISTRATIVO Y FINANCIERO", 'email'=>"adminfinanciero@calida.com", 'password'=>bcrypt("admin"), "proceso_id"=>1, "subproceso_id"=>2,"privilegios"=>5]);
        User::create([ 'name'=>"Gerencia ejecutiva", 'email'=>"adminejecutivo@calida.com", 'password'=>bcrypt("admin"), "proceso_id"=>1, "subproceso_id"=>1,"privilegios"=>2]);
        User::create([ 'name'=>"Crédito y Cartera", 'email'=>"cartera@calida.com", 'password'=>bcrypt("admin"), "proceso_id"=>2, "subproceso_id"=>4,"privilegios"=>2]);
        User::create([ 'name'=>"Gestión de personal", 'email'=>"personal@calida.com", 'password'=>bcrypt("admin"), "proceso_id"=>5, "subproceso_id"=>8,"privilegios"=>2]);

    }
}
