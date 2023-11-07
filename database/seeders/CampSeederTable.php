<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $camps = [
            [
                'title' => 'JADI JAGO',
                'slug' => 'jadi-jago',
                'description' => 'Kelas buat yang mau jadi jago.',
                'price' => 200000
            ],
            [
                'title' => 'BUAT PEMULA',
                'slug' => 'pemula',
                'description' => 'Kelas buat yang baru belajar.',
                'price' => 100000
            ]
        ];

        foreach ($camps as $key => $camp) {
            Camp::create($camp);
        }
    }
}
