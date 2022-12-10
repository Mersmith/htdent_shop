<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cupon;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();

            $table->string('codigo')->unique();
            $table->enum('tipo', [Cupon::FIJO, Cupon::PORCENTAJE])->default(Cupon::FIJO);
            $table->float('descuento');
            $table->float('carrito_monto');
            $table->date('fecha_expiracion');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cupons');
    }
};
