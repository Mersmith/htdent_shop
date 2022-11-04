<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ciudads', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('departamento_id');
            $table->string('nombre');
            $table->float('costo');

            //Cada vez que eliminamos un Departamento, se elimine tambien las Ciudades asosiados a este Departamento.
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ciudads');
    }
};
