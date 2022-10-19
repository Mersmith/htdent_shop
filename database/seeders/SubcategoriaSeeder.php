<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategoriaSeeder extends Seeder
{
    public function run()
    {
        $subcategorias = [
            /* Equipos intraorales */
            [
                'categoria_id' => 1,
                'nombre' => 'Rayos x Portatil',
                'slug' => Str::slug('Rayos x Portatil'),
            ],
            [
                'categoria_id' => 1,
                'nombre' => 'Sensor RVG',
                'slug' => Str::slug('Sensor RVG'),
                'tiene_medida' => true
            ],
            [
                'categoria_id' => 1,
                'nombre' => 'Digitalizador Intraoral',
                'slug' => Str::slug('Digitalizador Intraoral'),
            ],
            [
                'categoria_id' => 1,
                'nombre' => 'Escaneador Intraoral',
                'slug' => Str::slug('Escaneador Intraoral'),
            ],

            /* Equipos extraorales */
            [
                'categoria_id' => 2,
                'nombre' => 'Vatech',
                'slug' => Str::slug('Vatech'),
            ],
            [
                'categoria_id' => 2,
                'nombre' => 'Pointnix',
                'slug' => Str::slug('Pointnix'),
            ],

            /* Materiales */
            [
                'categoria_id' => 3,
                'nombre' => 'Zirconia',
                'slug' => Str::slug('Zirconia'),
                'tiene_color' => true,
                'tiene_medida' => true
            ],

            /* Implantes */
            [
                'categoria_id' => 4,
                'nombre' => 'Point Implant',
                'slug' => Str::slug('Point Implant'),
                'tiene_medida' => true
            ],
            [
                'categoria_id' => 4,
                'nombre' => 'Megagen',
                'slug' => Str::slug('Megagen'),
                'tiene_medida' => true
            ],
            [
                'categoria_id' => 4,
                'nombre' => 'Kuwotech',
                'slug' => Str::slug('Kuwotech'),
                'tiene_medida' => true
            ],
        ];

        foreach ($subcategorias as $subcategoria) {
            Subcategoria::factory(1)->create($subcategoria);
        }
    }
}
