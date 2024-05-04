<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            [
                'name' => 'Autoridades',
            ],
            [
                'name' => 'Docentes',
            ],
            [
                'name' => 'Estudiantes',
            ],
            [
                'name' => 'Titulados',
            ],
            [
                'name' => 'Empleadores',
            ]
        ];
        foreach ($sources as $source) {
            Source::create($source);
        }
    }
}
