<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         	    $this->call(ProcesosTableSeeder::class);
               $this->call(SubprocesosTableSeeder::class);
               $this->call(UsersTableSeeder::class);
               $this->call(IndicadoresTableSeeder::class);
    }
}
