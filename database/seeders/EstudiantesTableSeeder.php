<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estudiantes')->insert([
            ['nombre' => 'Juan Pérez', 'curso_id' => 1],
            ['nombre' => 'Ana Gómez', 'curso_id' => 2],
        ]);
    }
}
