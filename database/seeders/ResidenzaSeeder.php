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
            ['codice_stato' => 1, 'nome_stato' => 'Italia'],
            ['codice_stato' => 2, 'nome_stato' => 'Paese europeo'],
            ['codice_stato' => 3, 'nome_stato' => 'Paese non europeo'],
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
