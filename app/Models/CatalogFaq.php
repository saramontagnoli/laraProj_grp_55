<?php

namespace App\Models;

use App\Models\Resources\Faq;

/*
 * Classe CatalogFaq con un singolo metodo getFaq
 */
class CatalogFaq {

    /*
     * Metodo che permette di restituire tutte le faq contenute all'interno della tabella faq del database
     */
    public function getFaq() {
        return faq::all();
    }

}
