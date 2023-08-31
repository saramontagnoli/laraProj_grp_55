<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

    function eliminaFaq($codice_faq)
    {
        $faq = Faq::where('faq.codice_faq', '=', $codice_faq);

        // Elimina i noleggi correlati utilizzando la relazione
        $faq->delete();

        return redirect()->route('/gestioneFaq')->with('message', 'Faq eliminata con successo.');
    }


    /*
 * Il metodo updateDatiPersonali permette di andare ad aggiornare effettivamente i dati del cliente, secondo i nuovi input
 */
    function modificaFaq(Request $request)
    {

        $codice_faq = $request->input('codice_faq');

        //validazione dei dati della form di modifica
        $request->validate([
            'domanda' => ['required','string','max:600'],
            'risposta' => ['required','string','max:600']
        ]);

        //query di update delle informazioni dell'utente senza password
        Faq::where('codice_faq', $codice_faq)->update(
            [
                'domanda'=>$request->input('domanda'),
                'risposta'=>$request->input('risposta'),
                'admin_ref' => Auth::user()->id
            ]);

        //redirezione alla rotta del profilo dell'utente
        return redirect()->route('/gestioneFaq');
    }

    /*
 * Il metodo getDatiPersonali consente di estrarre i dati del cliente che ha intenzione di modificare i dati
 * Questo serve per riempire i campi di modifica con i campi precedentemente impostati
 */
    function getDatiFaq($codice_faq){

        //query di estrazione dell'utente dal database
        $faq = Faq::where('codice_faq', $codice_faq)->first();

        //return della vista di modifica dei dati, compilando i campi di modifica con i dati vecchi estratti dal DB
        return view('modificaFaq', ['faq'=>$faq]);
    }


}
