<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidenzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
             * Inserimento dei dati predefiniti all'interno della tabella stato del database mediante insert
             */
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
            ['codice_stato' => 48, 'nome_stato' => 'Paese non europeo'],
        ]);

        DB::statement(file_get_contents(database_path('seeders/sql_file/database_regioni.sql')));
        DB::statement(file_get_contents(database_path('seeders/sql_file/database_province.sql')));
        DB::statement(file_get_contents(database_path('seeders/sql_file/database_comuni.sql')));

        //inserimento dati tabella province
        DB::table('comuni')->insert([
            ['id'=>110011, 'nome'=>'comune europeo', 'codice_catastale'=>1, 'latitudine'=>1, 'longitudine'=>1, 'id_provincia'=>111, 'id_regione'=>21],
            ['id'=>110012, 'nome'=>'comune non europeo', 'codice_catastale'=>0, 'latitudine'=>0, 'longitudine'=>0, 'id_provincia'=>112, 'id_regione'=>22],

        ]);
    }



}
