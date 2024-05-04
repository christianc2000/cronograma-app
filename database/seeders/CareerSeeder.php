<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careers = [
            [
                'nombre' => 'Ingeniería informática'
            ],
            [
                'nombre' => 'Ingeniería en Sistema'
            ],
            [
                'nombre' => 'Ingeniería en redes'
            ],
            [
                'nombre' => 'Medicina'
            ],
            [
                'nombre' => 'Enfermería'
            ]
        ];
        foreach ($careers as $career) {
            Career::create($career);
        }
    }
}
