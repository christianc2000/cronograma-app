<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            ['nombre' => 'Facultad Cs. de la Computación y telecomunicaciones'],
            ['nombre'=> 'Ciencias de ala salud humana']
        ];
        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
    }
}
