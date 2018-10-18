<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados_indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("indicadore_id")->unsigned();
            $table->foreign("indicadore_id")->references('id')->on('indicadores')->onDelete('cascade');
            $table->integer("proceso_id")->unsigned();
            $table->foreign("proceso_id")->references('id')->on('procesos')->onDelete('cascade');
            $table->integer("subproceso_id")->unsigned();
            $table->foreign("subproceso_id")->references('id')->on('subprocesos')->onDelete('cascade');
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->string("periocidad");
            $table->decimal("resultado");
            $table->string("analisis");
            $table->string("ciudad");
            $table->string("meta");
            $table->string("user_report");
            $table->integer("periocidad_id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados_indicadores');
    }
}
