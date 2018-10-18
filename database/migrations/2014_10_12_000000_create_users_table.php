<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer("proceso_id")->unsigned();
            $table->foreign("proceso_id")->references('id')->on('procesos')->onDelete('cascade');
            $table->integer("subproceso_id")->unsigned();
            $table->foreign("subproceso_id")->references('id')->on('subprocesos')->onDelete('cascade');
            $table->integer("privilegios")->default(1);
            $table->timestamps();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
