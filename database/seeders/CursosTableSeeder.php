<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            ['nombre' => 'Decimo', 'imagen' => 'https://www.juntadeandalucia.es/averroes/centros-tic/41602326/myscrapbook/userimages/fa53d262d2f3.png'],
            ['nombre' => 'Octavo', 'imagen' => 'https://www.juntadeandalucia.es/averroes/centros-tic/41602326/myscrapbook/userimages/fa53d262d2f3.png'],
            ['nombre' => 'Segundo', 'imagen' => 'https://www.juntadeandalucia.es/averroes/centros-tic/41602326/myscrapbook/userimages/fa53d262d2f3.png'],
        ]);
    }
}

