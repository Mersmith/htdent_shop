<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medios_pagos', function (Blueprint $table) {
            $table->id();
            
            $table->integer('posicion');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medios_pagos');
    }
};
