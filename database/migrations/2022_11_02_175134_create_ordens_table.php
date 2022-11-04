<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Orden;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->enum('estado', [Orden::PENDIENTE, Orden::RECIBIDO, Orden::ENVIADO, Orden::ENTREGADO, Orden::ANULADO])->default(Orden::PENDIENTE);
            $table->string('contacto');
            $table->string('celular');
            $table->enum('tipo_envio', [1, 2]);
            $table->float('costo_envio');
            $table->float('total');
            $table->json('contenido')->nullable();
            $table->json('envio')->nullable();
            $table->string('puntos_canjeados')->nullable();
            $table->string('cupon_descuento')->nullable();
            $table->string('cupon_precio')->nullable();

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordens');
    }
};
