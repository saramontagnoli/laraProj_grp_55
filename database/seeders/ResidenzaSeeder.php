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

        DB::statement(file_get_contents(database_path('seeders/sql_file/database_regioni.sql')));
        DB::statement(file_get_contents(database_path('seeders/sql_file/database_province.sql')));
        DB::statement(file_get_contents(database_path('seeders/sql_file/database_comuni.sql')));
    }
}
