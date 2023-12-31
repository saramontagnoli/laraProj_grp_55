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
        /*
         * Inserimento dei dati predefiniti all'interno della tabella occupazione del database mediante insert
         */
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


        /*
         * Inserimento dei dati predefiniti all'interno della tabella marca del database mediante insert
         */
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


        /*
         * Inserimento dei dati predefiniti all'interno della tabella modello del database mediante insert
         */
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






        /*
         * Inserimento dei dati predefiniti all'interno della tabella auto del database mediante insert
         */
        DB::table('auto')->insert([
            ['codice_auto' => 1, 'targa' => 'GF856ZN', 'foto_auto' => 'assets/img/fiat_punto.jpeg', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 50.00, 'num_posti' => 5, 'modello_ref' => 6],
            ['codice_auto' => 2, 'targa' => 'GT422GT', 'foto_auto' => 'assets/img/ferrari_portofino.webp', 'allestimento' => 'Optional: aria condizionata, radio, turbo', 'costo_giorno' => 500.00, 'num_posti' => 4, 'modello_ref' => 1],
            ['codice_auto' => 3, 'targa' => 'DE235DE', 'foto_auto' => 'assets/img/fiat_punto2.jpg', 'allestimento' => 'Optional: base', 'costo_giorno' => 45.00, 'num_posti' => 5, 'modello_ref' => 6],
            ['codice_auto' => 4, 'targa' => 'EF578FH', 'foto_auto' => 'assets/img/lancia_ypsilon.png', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 50.00, 'num_posti' => 5, 'modello_ref' => 5],
            ['codice_auto' => 5, 'targa' => 'FH255EB', 'foto_auto' => 'assets/img/audi_r8.jpg', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 65.00, 'num_posti' => 2, 'modello_ref' => 10],
            ['codice_auto' => 6, 'targa' => 'FB265CS', 'foto_auto' => 'assets/img/ferrari_purosangue.jpg', 'allestimento' => 'Optional: aria condizionata, radio, turbo', 'costo_giorno' => 600.00, 'num_posti' => 4, 'modello_ref' => 9],
            ['codice_auto' => 7, 'targa' => 'FA254FA', 'foto_auto' => 'assets/img/alfa_romeo_giulia.jpg', 'allestimento' => 'Optional: aria condizionata, radio', 'costo_giorno' => 75.00, 'num_posti' => 4, 'modello_ref' => 7],
            ['codice_auto' => 8, 'targa' => 'FA000CK', 'foto_auto' => 'assets/img/bmw_m4.jpg', 'allestimento' => 'Optional: aria condizionata, radio, turbo', 'costo_giorno' => 70.00, 'num_posti' => 4, 'modello_ref' => 4]
        ]);


        /*
         * Inserimento dei dati predefiniti all'interno della tabella users del database mediante insert
         */
        DB::table('users')->insert([
            ['id' => 1, 'nome' => 'Sara', 'cognome' => 'Montagnoli', 'data_nascita' => '2001-10-31', 'username' => 'clieclie', 'password' => bcrypt('3Esp6L54'), 'role' => 'user', 'email' => 'sara@gmail.com', 'indirizzo' => 'via caso 13', 'occupazione_ref' => 4, 'comune_ref' => 1002],
            ['id' => 2, 'nome' => 'Giada', 'cognome' => 'Remedia', 'data_nascita' => '2001-09-26', 'username' => 'staffstaff', 'password' => bcrypt('3Esp6L54'), 'role' => 'staff', 'email' => 'giada@gmail.com', 'indirizzo' => 'via nulla 10', 'occupazione_ref' => 4, 'comune_ref' => 1004],
            ['id' => 3, 'nome' => 'Admin', 'cognome' => 'Admin', 'data_nascita' => '1990-11-11', 'username' => 'adminadmin', 'password' => bcrypt('3Esp6L54'), 'role' => 'admin', 'email' => 'admin@gmail.com', 'indirizzo' => 'via roma 11', 'occupazione_ref' => 1, 'comune_ref' => 1003],
            ['id' => 4, 'nome' => 'Luca', 'cognome' => 'Bianchi', 'data_nascita' => '1997-06-11', 'username' => 'lucabianchi', 'password' => bcrypt('ciao01!'), 'role' => 'user', 'email' => 'lucabianchi@gmail.com', 'indirizzo' => 'via napoli 11', 'occupazione_ref' => 2, 'comune_ref' => 1005],
            ['id' => 5, 'nome' => 'Marco', 'cognome' => 'Verdi', 'data_nascita' => '1998-01-27', 'username' => 'marcoverdi98', 'password' => bcrypt('ciaociao01!'), 'role' => 'user', 'email' => 'marcoverdi@gmail.com', 'indirizzo' => 'via torino 5', 'occupazione_ref' => 3, 'comune_ref' => 1006]
        ]);


        /*
         * Inserimento dei dati predefiniti all'interno della tabella faq del database mediante insert
         */
        DB::table('faq')->insert([
            ['codice_faq' => 1, 'domanda' => 'Posso noleggiare più auto contemporaneamente?', 'risposta' => 'Si, si possono noleggiare contemporaneamente più macchina sotto lo stesso nome', 'admin_ref' => 3],
            ['codice_faq' => 2, 'domanda' => 'Come noleggio una macchina?', 'risposta' => 'Per noleggiare una macchina si deveno specificare le caratteristiche desiderate. Successivamente si apre la scheda della macchina da noleggiare e si cliccka sul buttone "NOLEGGIA"', 'admin_ref' => 3],
            ['codice_faq' => 3, 'domanda' => 'Per quanto tempo posso noleggiare un auto?', 'risposta' => 'Non ci sono limiti di tempo per il noleggio delle auto.', 'admin_ref' => 3],
        ]);


        /*
         * Inserimento dei dati predefiniti all'interno della tabella noleggio del database mediante insert
         */
        DB::table('noleggio')->insert([
            ['codice_noleggio' => 1, 'data_inizio' => '2023-07-31', 'data_fine' => '2023-08-13', 'utente_ref' => 1, 'auto_ref' => 1],
            ['codice_noleggio' => 2, 'data_inizio' => '2023-08-05', 'data_fine' => '2023-08-08', 'utente_ref' => 4, 'auto_ref' => 5],
            ['codice_noleggio' => 3, 'data_inizio' => '2023-07-25', 'data_fine' => '2023-08-25', 'utente_ref' => 5, 'auto_ref' => 8],
            ['codice_noleggio' => 4, 'data_inizio' => '2023-07-28', 'data_fine' => '2023-08-28', 'utente_ref' => 5, 'auto_ref' => 6],
        ]);
    }
}
