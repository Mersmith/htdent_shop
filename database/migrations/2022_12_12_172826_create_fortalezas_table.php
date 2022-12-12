<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fortalezas', function (Blueprint $table) {
            $table->id();

            $table->string('icono');
            $table->string('titulo');
            $table->string('descripcion');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fortalezas');
    }
};
