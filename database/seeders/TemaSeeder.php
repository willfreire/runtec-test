<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $temas = [
            ['tema' => 'Política'],
            ['tema' => 'Esporte'],
            ['tema' => 'Entretenimento'],
        ];

        DB::table('tb_tema')->insert($temas);
    }
}
