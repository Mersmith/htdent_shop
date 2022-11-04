<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();

            $table->string('codigo')->unique();
            $table->enum('tipo', ['fijo', 'porcentaje']);
            $table->decimal('descuento');
            $table->decimal('carrito_monto');
            $table->date('fecha_expiracion')->default(DB::raw('CURRENT_DATE'));

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cupons');
    }
};
