<?php

namespace App\Http\Controllers;

use App\Models\CatalogoAuto;
use Illuminate\Support\Facades\Log;

/*
 * Classe Controller per il catalogo auto
 */
class ControllerCatalogoAuto extends Controller
{
    //definizione della variabile che conterrà il catalogo completo delle auto
    protected $_catalogAuto;

    /*
     * Costruttore della classe ControllerCatalogoAuto
     */
    public function __construct() {
        //la variabile viene inizializzata come variabile di CatalogoAuto()
        $this->_catalogAuto = new CatalogoAuto();
    }

    /*
     * Metodo che consente di mostrare tutte le auto mediante la vista catalogoauto
     */
    public function showCatalogoAuto()
    {
        //estrazione delle auto mediante il metodo getCatalogoAuto() della classe CatalogoAuto()
        $data = $this->_catalogAuto->getCatalogoAuto();

        //ritorno della vista del catalogo completo di tutte le auto noleggiabili
        return view('catalogoauto', compact('data'));
    }

    /*
     * Metodo che consente di mostrare una singola auto tra tutte quelle del catalogo
     */
    public function showCatalogoAutoSpec($codice_auto)
    {
        //estrazione dell'auto specifica selezionata con il metodo getAutoSpec() della classe CatalogoAuto()
        $data = $this->_catalogAuto->getAutoSpec($codice_auto);

        //ritorno della vista dell'auto singola contenente tutte le informazioni
        return view('autosingola', compact('data'));
    }

}
