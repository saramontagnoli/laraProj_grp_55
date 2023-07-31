<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupazione')->insert([
            ['codice_occupazione' => 1, 'nome_occupazione' => 'Libero professionista'],
            ['codice_occupazione' => 2, 'nome_occupazione' => 'Dipendente'],
            ['codice_occupazione' => 3, 'nome_occupazione' => 'Operaio'],
            ['codice_occupazione' => 4, 'nome_occupazione' => 'Studente'],
            ['codice_occupazione' => 5, 'nome_occupazione' => 'Militare'],
            ['codice_occupazione' => 6, 'nome_occupazione' => 'In pensione'],
            ['codice_occupazione' => 7, 'nome_occupazione' => 'Disoccupato'],
            ['codice_occupazione' => 8, 'nome_occupazione' => 'Altro']
        ]);

    }
}
