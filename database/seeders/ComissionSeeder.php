<?php

namespace Database\Seeders;

use App\Models\Comission;
use Illuminate\Database\Seeder;

class ComissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comissions = [
            [
                'description' => 'Comisionado',
                'start_date' => '01-01-2024',
                'end_date' => '31-12-2024',
                'self_assessment_id' => 1,
                'c_member_id' => 1,
            ],
            [
                'description' => 'Comisionado',
                'start_date' => '01-01-2024',
                'end_date' => '31-12-2024',
                'self_assessment_id' => 1,
                'c_member_id' => 2,
            ],
            [
                'description' => 'Comisionado',
                'start_date' => '01-01-2024',
                'end_date' => '31-12-2024',
                'self_assessment_id' => 1,
                'c_member_id' => 3,
            ],
            [
                'description' => 'Comisionado',
                'start_date' => '01-01-2024',
                'end_date' => '31-12-2024',
                'self_assessment_id' => 1,
                'c_member_id' => 4,
            ],
            [
                'description' => 'Comisionado',
                'start_date' => '01-01-2024',
                'end_date' => '31-12-2024',
                'self_assessment_id' =>2,
                'c_member_id' => 1,
            ],
            [
                'description' => 'Comisionado',
                'start_date' => '01-01-2024',
                'end_date' => '31-12-2024',
                'self_assessment_id' => 2,
                'c_member_id' => 2,
            ]
        ];
        foreach ($comissions as $comission) {
            Comission::create($comission);
        }
    }
}
