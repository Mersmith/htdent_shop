<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('nombres');
            $table->string('celular');
            $table->string('direccion');
            $table->string('referencia');
            $table->string('departamento_id');
            $table->string('departamento_nombre');
            $table->string('provincia_id');
            $table->string('provincia_nombre');
            $table->string('distrito_id');
            $table->string('distrito_nombre');
            $table->string('codigo_postal');
            $table->integer('posicion')->default(1);

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('direccions');
    }
};
