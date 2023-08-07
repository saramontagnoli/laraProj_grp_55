<?php

namespace App\Models;

use App\Models\Resources\Auto;
use App\Models\Resources\Faq;

/*
 * Classe CatalogoAuto con i metodi getCatalogoAuto() e getAutoSpec()
 */
class CatalogoAuto {

    /*
     * Metodo che permette di restituire tutte le auto contenute all'interno della tabella auto del database
     */
    public function getCatalogoAuto() {
        //query di estrazione di tutte le auto
        return auto::all();
    }

    /*
     * Metodo che permette di restituire una specifica auto selezionata da tutto il catalogo
     */
    public function getAutoSpec($codice_auto)
    {
        //query di estrazione della singola auto definita da $codice_auto
        return auto::where('codice_auto', $codice_auto)->get();
    }


}
