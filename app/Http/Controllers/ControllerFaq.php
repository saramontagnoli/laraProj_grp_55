<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Facades\Log;

/*
 * Definizione del Controller delle F.A.Q.
 */
class ControllerFaq extends Controller
{
    //Il metodo showFaq permette di estrarre tutte le FAQ dalla tabella relativa nel database
    function showFaq()
    {
        //query di estrazione del database
        $data = faq::all();

        //ritorno della vista contenente tutte le FAQ
        return view('faq', ['faq'=>$data]);
    }

    function gestioneFaq()
    {
        //query di estrazione di tutte le auto, query con due join per estrazione di informazioni riguardanti marca e modello dell'auto
        $faq = Faq::get();

        //inserimento del risultato della query all'interno di un oggetto $cardAuto
        $cardFaq["cardFaq"] = $faq;

        //return della vista contenente il catalogo completo
        return view('gestionefaq', $cardFaq);
    }
}
