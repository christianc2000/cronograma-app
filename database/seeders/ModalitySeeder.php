<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $modalities=[
        [
            'nombre'=>'Anual'
        ],
        [
            'nombre'=>'Semestral'
        ]
        ];
        foreach ($modalities as $modality) {
            Modality::create($modality);
        }

    }
}
