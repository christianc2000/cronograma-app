<?php

namespace Database\Seeders;

use App\Models\SelfAssessment;
use Illuminate\Database\Seeder;

class SelfAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $selfAs = [
            [
                'faculty_id' => 1,
                'career_id' => 1,
                'plan' => "187",
                'modality_id' => 2,
                'place_id' => 1,
                'type' => "E",
                'description' => "Proceso de evaluación en la facultad...",
                'start_date' => "2024-05-01",
                'end_date' => "2024-06-01",
                'year' => 2024,
                'period' => "I",
            ],
            [
                'faculty_id' => 1,
                'career_id' => 2,
                'plan' => "173",
                'modality_id' => 2,
                'place_id' => 1,
                'type' => "E",
                'description' => "Proceso de evaluación en la facultad...",
                'start_date' => "2024-04-01",
                'end_date' => "2024-05-15",
                'year' => 2024,
                'period' => "I",
            ]
        ];
        foreach ($selfAs as $selfA) {
            SelfAssessment::create($selfA);
        }
    }
}
