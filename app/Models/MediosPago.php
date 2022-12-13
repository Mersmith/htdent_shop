<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediosPago extends Model
{
    use HasFactory;

    protected $fillable = ['posicion'];

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, "imagenable");
    }

}
