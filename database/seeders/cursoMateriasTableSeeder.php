<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cursoMateriasTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('curso_materia')->insert([
            ['curso_id' => '1', 'materia_id' => '2'],
            ['curso_id' => '1', 'materia_id' => '1'],
            ['curso_id' => '1', 'materia_id' => '3'],
            ['curso_id' => '2', 'materia_id' => '2'],
            ['curso_id' => '3', 'materia_id' => '3']
        ]);
    }
}
