<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/*
 * Definizione del Controller delle F.A.Q.
 */
class ControllerFaq extends Controller
{
    /*
     * Il metodo showFaq permette di andare ad estrarre tutte le F.A.Q. contenute nel sito
     */
    function showFaq()
    {
        //query di estrazione di tutte le F.A.Q. dal database
        $data = Faq::all();

        //return della vista faq contenente tutte le F.A.Q. appena estratte
        return view('faq', ['faq'=>$data]);
    }


    /*
     * Il metodo gestioneFaq consente di andare ad estrarre tutte le F.A.Q. per visualizzarle in una tabella di gestione
     */
    function gestioneFaq()
    {
        //query di estrazione di tutte le F.A.Q.
        $faq = Faq::all();

        //inserimento del risultato della query all'interno di un oggetto $cardFaq
        $cardFaq["cardFaq"] = $faq;

        //return della vista di gestione delle F.A.Q. contenente l'insieme di tutte le F.A.Q. estratte
        return view('gestionefaq', $cardFaq);
    }


    /*
     * Il metodo eliminaFaq consente di andare ad eliminare la F.A.Q. con codice $codice_faq selezionata dalla tabella di gestione
     */
    function eliminaFaq($codice_faq)
    {
        //query di estrazione della F.A.Q. selezionata avente come codice $codice_faq
        $faq = Faq::where('faq.codice_faq', '=', $codice_faq);

        //eliminazione effettiva della F.A.Q. selezionata
        $faq->delete();

        //redirect alla rotta di gestioneFaq con messaggio di avvenuta eliminazione
        return redirect()->route('gestioneFaq')->with('message', 'Faq eliminata con successo.');
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
        return redirect()->route('gestioneFaq')->with('message', 'Faq modificata con successo.');
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

    function aggiuntaFaq(Request $request)
    {
        // Valida i campi dell'auto
        $request->validate([
            'domanda' => ['string', 'max:600', 'required', Rule::unique('faq')],
            'risposta' => ['string', 'max:600', 'required']
        ]);

        // Creazione di un nuovo oggetto Auto
        $faq = new Faq();
        $faq->domanda = $request->input('domanda');
        $faq->risposta = $request->input('risposta');
        $faq->admin_ref = Auth::user()->id;

        // Salva l'auto nel database
        $faq->save();

        // Reindirizza o effettua altre operazioni necessarie
        return redirect()->route('gestioneFaq')->with('message', 'Faq aggiunta con successo.');
    }

}
