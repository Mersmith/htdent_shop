<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('testimonios', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('cargo');
            $table->text('comentario');
            $table->integer('posicion');
            $table->string('imagen_ruta')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonios');
    }
};
