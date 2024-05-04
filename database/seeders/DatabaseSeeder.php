<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(SourceSeeder::class);
       $this->call(CareerSeeder::class);
       $this->call(FacultySeeder::class);
       $this->call(PlaceSeeder::class);
       $this->call(ModalitySeeder::class);
       $this->call(SelfAssessmentSeeder::class);
       $this->call(CMemberSeeder::class);
       $this->call(ComissionSeeder::class);
    }
}
