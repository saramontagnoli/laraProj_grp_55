<?php

namespace App\Models;

use App\Models\Resources\Auto;
use App\Models\Resources\Faq;

/*
 * Classe CatalogFaq con un singolo metodo getFaq
 */
class CatalogoAuto {

    /*
     * Metodo che permette di restituire tutte le faq contenute all'interno della tabella faq del database
     */
    public function getCatalogoAuto() {
        return auto::all();
    }

    public function getAutoSpec($codice_auto)
    {
        return auto::where('codice_auto', $codice_auto)->get();
    }


}
