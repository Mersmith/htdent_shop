<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provincia;
use App\Models\Departamento;
use App\Models\Distrito;

class DepartamentoSeeder extends Seeder
{
    public function run()
    {
        //Por cada Departamento se cree 8 Ciudades
        Departamento::factory(8)->create()->each(function (Departamento $departamento) {
            //Por cada Ciudad quiero que se cree 8 distritos
            Provincia::factory(8)->create([
                'departamento_id' => $departamento->id
            ])->each(function (Provincia $provincia) {
                //Se crearan 8 distritos
                Distrito::factory(8)->create([
                    'provincia_id' => $provincia->id
                ]);
            });
        });
    }
}
