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
    /*
     * Il metodo showFaq permette di visualizzare tutte le F.A.Q. nella sezione F.A.Q. del sito
     */
    function showFaq()
    {
        //query di estrazione di tutte le F.A.Q. dal database
        $data = faq::all();

        //ritorno della vista faq contenente le informazioni di tutte le F.A.Q.
        return view('faq', ['faq'=>$data]);
    }


    /*
     * Il metodo gestioneFaq consente di andare a visualizzare tutte le F.A.Q. di una pagina di gestione delle F.A.Q.
     */
    function gestioneFaq()
    {
        //query di estrazione di tutte le F.A.Q.
        $faq = Faq::get();

        //inserimento del risultato della query all'interno di un oggetto $cardFaq
        $cardFaq["cardFaq"] = $faq;

        //return ddella vista gestioneFaq con le informazioni di tutte le F.A.Q. contenute nel sito
        return view('gestionefaq', $cardFaq);
    }


    /*
     * Il metodo eliminaFaq consente di andare ad eliminare la F.A.Q. scelta dalla tabella di visualizzazione, la F.A.Q. ha codice $codice_faq
     */
    function eliminaFaq($codice_faq)
    {
        //query di estrazione della query scelta da eliminare
        $faq = Faq::where('faq.codice_faq', '=', $codice_faq);

        //eliminazione effettiva della F.A.Q.
        $faq->delete();

        //return della rotta di gestione F.A.Q. con messaggio di avvenuta eliminazione
        return redirect()->route('/gestioneFaq')->with('message', 'Faq eliminata con successo.');
    }


    /*
 * Il metodo updateDatiPersonali permette di andare ad aggiornare effettivamente i dati del cliente, secondo i nuovi input
 */
    function modificaFaq(Request $request)
    {
        //estrazione del codice della F.A.Q. da modificare
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
        return redirect()->route('/gestioneFaq')->with('message', 'Faq modificata con successo.');
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

    function aggiuntaFaq()
    {
        return view('aggiungiFaq');
    }

}
