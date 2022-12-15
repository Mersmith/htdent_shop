<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ckeditors', function (Blueprint $table) {
            $table->id();

            $table->string('imagen_ruta');
            $table->unsignedBigInteger('ckeditorable_id');
            $table->string('ckeditorable_type');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ckeditors');
    }
};
