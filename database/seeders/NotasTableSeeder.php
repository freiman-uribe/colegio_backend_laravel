<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notas')->insert([
            ['descripcion' => 'Talle 1', 'estudiante_id' => 1, 'curso_id' => 1, 'materia_id' => 1, 'nota' => 8.5],
            ['descripcion' => 'Evaluacion', 'estudiante_id' => 2, 'curso_id' => 1, 'materia_id' => 2, 'nota' => 9.0],
            ['descripcion' => 'Trabajo escrito', 'estudiante_id' => 1, 'curso_id' => 2, 'materia_id' => 3, 'nota' => 7.0],
        ]);
    }
}
