<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cargo', 'comentario', 'posicion', 'imagen_ruta'];

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, "imagenable");
    }
}
