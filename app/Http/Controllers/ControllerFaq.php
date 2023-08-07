<?php

namespace App\Http\Controllers;

use App\Models\CatalogFaq;
use Illuminate\Support\Facades\Log;

/*
 * Definizione del Controller delle F.A.Q.
 */
class ControllerFaq extends Controller
{
    //deifnizione variabile contenente tutti gli elementi faq
    protected $_listFaq;

    /*
     * Il costruttore del Controller permette di definire la variabile _listFaq come un CatalogFaq
     */
    public function __construct() {
        $this->_listFaq = new CatalogFaq();
    }

    /*
     * Il metodo showFaq permette di avere la vista delle faq riempita con le informazioni del database
     */
    public function showFaq()
    {
        //mediante il metodo getFaq della classe CatalogGaq vengono estratte tutte le informazioni contenute nella tabellaf aq del database
        $data = $this->_listFaq->getFaq();

        //ritorno della vista faq, al quale viene associata la variabile data
        return view('faq', compact('data'));
    }
}
