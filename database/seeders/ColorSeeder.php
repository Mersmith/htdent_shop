<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colores = ['ninguno', 'blanco', 'A1', 'A2', 'A3', 'A3.5'];

        foreach ($colores as $color) {
            Color::create([
                'nombre' => $color
            ]);
        }
    }
}
