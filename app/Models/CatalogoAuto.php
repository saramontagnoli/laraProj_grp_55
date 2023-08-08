<?php

namespace App\Models;

use App\Models\Resources\Auto;
use App\Models\Resources\Marca;
use App\Models\Resources\Modello;
use Illuminate\Support\Facades\DB;

/*
 * Classe CatalogoAuto con i metodi getCatalogoAuto() e getAutoSpec()
 */
class CatalogoAuto {

    /*
     * Metodo che permette di restituire tutte le auto contenute all'interno della tabella auto del database
     */
    public function getCatalogoAuto() {
        //query di estrazione di tutte le auto comprese marca e modello

        return Auto::join('modello', 'auto.modello_ref', '=', 'modello.codice_modello')
            ->join('marca', 'modello.marca_ref', '=', 'marca.codice_marca')
            ->get();


        //return DB::table('auto')
          //  ->join('modello', 'auto.modello_ref', '=', 'modello.codice_modello')
            //->join('marca', 'modello.marca_ref', '=', 'marca.codice_marca')
            //->get();

    }

    /*
     * Metodo che permette di restituire una specifica auto selezionata da tutto il catalogo
     */
    public function getAutoSpec($codice_auto)
    {
        //query di estrazione della singola auto definita da $codice_auto

        return DB::table('auto')
            ->join('modello', 'auto.modello_ref', '=', 'modello.codice_modello')
            ->join('marca', 'modello.marca_ref', '=', 'marca.codice_marca')
            ->where('codice_auto', $codice_auto)
            ->get();

        //return auto::where('codice_auto', $codice_auto)->get();
    }


}
