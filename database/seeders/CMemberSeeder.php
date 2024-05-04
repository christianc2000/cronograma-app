<?php

namespace Database\Seeders;

use App\Models\CMember;
use Illuminate\Database\Seeder;

class CMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cmembers = [
            [
                'code' => 'C0001',
                'type' => 'A',
                'nombre' => 'Christian Celso',
                'correo' => 'chrstncelso@gmail.com',
                'celular' => '77376902'
            ],
            [
                'code' => 'C0002',
                'type' => 'A',
                'nombre' => 'Nadia Torrico',
                'correo' => 'nadiatorrico@gmail.com',
                'celular' => '77376902'
            ],
            [
                'code' => 'C0003',
                'type' => 'A',
                'nombre' => 'Sara Calisaya',
                'correo' => 'sarac@gmail.com',
                'celular' => '77376902'
            ],
            [
                'code' => 'C0004',
                'type' => 'A',
                'nombre' => 'Ronald Cross',
                'correo' => 'ronaldc@gmail.com',
                'celular' => '77376902'
            ]
        ];
        foreach ($cmembers as $cmember) {
            CMember::create($cmember);
        }
    }
}
