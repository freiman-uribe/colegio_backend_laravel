<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('materias')->insert([
            ['nombre' => 'Álgebra'],
            ['nombre' => 'Biología'],
            ['nombre' => 'Geografía'],
        ]);
    }
}
