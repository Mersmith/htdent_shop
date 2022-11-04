<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'celular', 'imagen_ruta'];

    //Relación uno a muchos
    //Un Usuario tiene muchas ordenes
    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}
