<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
             $table->increments('id');
             $table->string("indicador");
             $table->integer("proceso_id")->unsigned();
             $table->foreign("proceso_id")->references('id')->on('procesos')->onDelete('cascade');
             $table->integer("subproceso_id")->unsigned();
             $table->foreign("subproceso_id")->references('id')->on('subprocesos')->onDelete('cascade');
             $table->string("formula");
             $table->string("frecuencia");
             $table->string("interpretacion");
             $table->string("origen");
             $table->string("funcionarios");
             $table->string("meta_cucuta");
             $table->string("meta_bucaramanga");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadores');
    }
}
