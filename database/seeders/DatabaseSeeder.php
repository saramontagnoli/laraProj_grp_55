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

        DB::table('stato')->insert([
            ['codice_stato' => 1, 'nome_stato' => 'Albania'],
            ['codice_stato' => 2, 'nome_stato' => 'Andorra'],
            ['codice_stato' => 3, 'nome_stato' => 'Armenia'],
            ['codice_stato' => 4, 'nome_stato' => 'Austria'],
            ['codice_stato' => 5, 'nome_stato' => 'Azerbaijan'],
            ['codice_stato' => 6, 'nome_stato' => 'Bosnia-Erzegovina'],
            ['codice_stato' => 7, 'nome_stato' => 'Belgio'],
            ['codice_stato' => 8, 'nome_stato' => 'Bulgaria'],
            ['codice_stato' => 9, 'nome_stato' => 'Croazia'],
            ['codice_stato' => 10, 'nome_stato' => 'Cipro'],
            ['codice_stato' => 11, 'nome_stato' => 'Danimarca'],
            ['codice_stato' => 12, 'nome_stato' => 'Estonia'],
            ['codice_stato' => 13, 'nome_stato' => 'Finlandia'],
            ['codice_stato' => 14, 'nome_stato' => 'Francia'],
            ['codice_stato' => 15, 'nome_stato' => 'Georgia'],
            ['codice_stato' => 16, 'nome_stato' => 'Germania'],
            ['codice_stato' => 17, 'nome_stato' => 'Grecia'],
            ['codice_stato' => 18, 'nome_stato' => 'Islanda'],
            ['codice_stato' => 19, 'nome_stato' => 'Irlanda'],
            ['codice_stato' => 20, 'nome_stato' => 'Italia'],
            ['codice_stato' => 21, 'nome_stato' => 'Lettonia'],
            ['codice_stato' => 22, 'nome_stato' => 'Liechtestein'],
            ['codice_stato' => 23, 'nome_stato' => 'Lituania'],
            ['codice_stato' => 24, 'nome_stato' => 'Lussemburgo'],
            ['codice_stato' => 25, 'nome_stato' => 'Malta'],
            ['codice_stato' => 26, 'nome_stato' => 'Moldova'],
            ['codice_stato' => 27, 'nome_stato' => 'Monaco'],
            ['codice_stato' => 28, 'nome_stato' => 'Montenegro'],
            ['codice_stato' => 29, 'nome_stato' => 'Norvegia'],
            ['codice_stato' => 30, 'nome_stato' => 'Paesi Bassi'],
            ['codice_stato' => 31, 'nome_stato' => 'Polonia'],
            ['codice_stato' => 32, 'nome_stato' => 'Portogallo'],
            ['codice_stato' => 33, 'nome_stato' => 'Regno Unito'],
            ['codice_stato' => 34, 'nome_stato' => 'Romania'],
            ['codice_stato' => 35, 'nome_stato' => 'Repubblica Ceca'],
            ['codice_stato' => 36, 'nome_stato' => 'Russia'],
            ['codice_stato' => 37, 'nome_stato' => 'San Marino'],
            ['codice_stato' => 38, 'nome_stato' => 'Serbia'],
            ['codice_stato' => 39, 'nome_stato' => 'Slovacchia'],
            ['codice_stato' => 40, 'nome_stato' => 'Slovenia'],
            ['codice_stato' => 41, 'nome_stato' => 'Spagna'],
            ['codice_stato' => 42, 'nome_stato' => 'Svezia'],
            ['codice_stato' => 43, 'nome_stato' => 'Svizzera'],
            ['codice_stato' => 44, 'nome_stato' => 'Turchia'],
            ['codice_stato' => 45, 'nome_stato' => 'Ucraina'],
            ['codice_stato' => 46, 'nome_stato' => 'Ungheria'],
            ['codice_stato' => 47, 'nome_stato' => 'Macedonia'],
            ['codice_stato' => 48, 'nome_stato' => 'Paese non europeo']
        ]);

        DB::table('comune')->insert([
            ['codice_comune' => 1, 'CAP' => '60121', 'nome_comune' => 'Ancona', 'stato_ref' => 20],
            ['codice_comune' => 2, 'CAP' => '63900', 'nome_comune' => 'Fermo', 'stato_ref' => 20],
            ['codice_comune' => 3, 'CAP' => '63822', 'nome_comune' => 'Porto San Giorgio', 'stato_ref' => 20],
            ['codice_comune' => 4, 'CAP' => '00042', 'nome_comune' => 'Roma', 'stato_ref' => 20],
            ['codice_comune' => 5, 'CAP' => 'E1W', 'nome_comune' => 'Londra', 'stato_ref' => 33],
            ['codice_comune' => 6, 'CAP' => '28001', 'nome_comune' => 'Madrid', 'stato_ref' => 41],
            ['codice_comune' => 7, 'CAP' => 'VLT', 'nome_comune' => 'Valletta', 'stato_ref' => 25],
            ['codice_comune' => 8, 'CAP' => '10115', 'nome_comune' => 'Berlino', 'stato_ref' => 16],
            ['codice_comune' => 9, 'CAP' => '1001', 'nome_comune' => 'Tirana', 'stato_ref' => 1],
            ['codice_comune' => 10, 'CAP' => '100', 'nome_comune' => 'Tokyo', 'stato_ref' => 48]
        ]);

        DB::table('auto')->insert([
            ['codice_auto' => 1, 'targa' => 'GF856ZN', 'foto_auto' => '/assets/img/fiat_punto.jpeg', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 50.00, 'num_posti' => 5, 'modello_ref' => 6],
            ['codice_auto' => 2, 'targa' => 'GT422GT', 'foto_auto' => '/assets/img/ferrari_portofino.jpg', 'allestimento' => 'Optional: aria condizionata, radio, turbo', 'costo_giorno' => 500.00, 'num_posti' => 4, 'modello_ref' => 1],
            ['codice_auto' => 3, 'targa' => 'DE235DE', 'foto_auto' => '/assets/img/fiat_punto2.jpg', 'allestimento' => 'Optional: base', 'costo_giorno' => 45.00, 'num_posti' => 5, 'modello_ref' => 6],
            ['codice_auto' => 4, 'targa' => 'EF578FH', 'foto_auto' => '/assets/img/lancia_ypsilon.jpg', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 50.00, 'num_posti' => 5, 'modello_ref' => 5],
            ['codice_auto' => 5, 'targa' => 'FH255EB', 'foto_auto' => '/assets/img/audi_r8.jpg', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 65.00, 'num_posti' => 2, 'modello_ref' => 10],
            ['codice_auto' => 6, 'targa' => 'FB265CS', 'foto_auto' => '/assets/img/ferrari_purosangue.jpg', 'allestimento' => 'Optional: aria condizionata, radio, turbo', 'costo_giorno' => 600.00, 'num_posti' => 4, 'modello_ref' => 9],
            ['codice_auto' => 7, 'targa' => 'FA254FA', 'foto_auto' => '/assets/img/alfa_romeo_giulia.jpg', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 75.00, 'num_posti' => 4, 'modello_ref' => 7],
            ['codice_auto' => 8, 'targa' => 'FA000CK', 'foto_auto' => '/assets/img/bmw_m4.jpg', 'allestimento' => 'Optional: aria condizionata, radio, turbo', 'costo_giorno' => 70.00, 'num_posti' => 4, 'modello_ref' => 4]
        ]);
    }
}
