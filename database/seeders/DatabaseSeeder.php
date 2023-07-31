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

        DB::table('marca')->insert([
            ['codice_marca' => 1, 'nome_marca' => 'Ferrari'],
            ['codice_marca' => 2, 'nome_marca' => 'Lamborghini'],
            ['codice_marca' => 3, 'nome_marca' => 'Audi'],
            ['codice_marca' => 4, 'nome_marca' => 'BMW'],
            ['codice_marca' => 5, 'nome_marca' => 'Lancia'],
            ['codice_marca' => 6, 'nome_marca' => 'FIAT'],
            ['codice_marca' => 7, 'nome_marca' => 'Alfa Romeo'],
            ['codice_marca' => 8, 'nome_marca' => 'Bugatti']
        ]);

        DB::table('modello')->insert([
            ['codice_modello' => 1, 'nome_modello' => 'Portofino', 'marca_ref' => 1],
            ['codice_modello' => 2, 'nome_modello' => 'Urus', 'marca_ref' => 2],
            ['codice_modello' => 3, 'nome_modello' => 'TT', 'marca_ref' => 3],
            ['codice_modello' => 4, 'nome_modello' => 'M4', 'marca_ref' => 4],
            ['codice_modello' => 5, 'nome_modello' => 'Ypsilon', 'marca_ref' => 5],
            ['codice_modello' => 6, 'nome_modello' => 'Punto', 'marca_ref' => 6],
            ['codice_modello' => 7, 'nome_modello' => 'Giulia', 'marca_ref' => 7],
            ['codice_modello' => 8, 'nome_modello' => 'Veyron', 'marca_ref' => 8],
            ['codice_modello' => 9, 'nome_modello' => 'Purosangue', 'marca_ref' => 1],
            ['codice_modello' => 10, 'nome_modello' => 'R8', 'marca_ref' => 3]
        ]);

    }
}
