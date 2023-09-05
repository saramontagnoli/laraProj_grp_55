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
     * Il metodo updateDatiPersonali permette di andare ad aggiornare i dati della F.A.Q. selezionata, secondo i nuovi input
     */
    function modificaFaq(Request $request)
    {

        //estrazione del codice della F.A.Q. selezionata
        $codice_faq = $request->input('codice_faq');

        //validazione dei dati della form di modifica
        $request->validate([
            'domanda' => ['required','string','max:600'],
            'risposta' => ['required','string','max:600']
        ]);

        //query di update delle informazioni della F.A.Q. secondo i nuovi input
        Faq::where('codice_faq', $codice_faq)->update(
            [
                'domanda'=>$request->input('domanda'),
                'risposta'=>$request->input('risposta'),
                'admin_ref' => Auth::user()->id
        ]);

        //redirezione alla rotta di gestioneFaq con messaggio di avvenuta aggiunta
        return redirect()->route('gestioneFaq')->with('message', 'Faq modificata con successo.');
    }

    /*
     * Il metodo getDatiFaq consente di estrarre i dati della F.A.Q. selezionata per andare a riempire i campi con i dati attuali
     */
    function getDatiFaq($codice_faq){

        //query di estrazione della F.A.Q. selezionata per la modifica
        $faq = Faq::where('codice_faq', $codice_faq)->first();

        //return della vista di modifica della F.A.Q., compilando i campi di modifica con i dati vecchi estratti dal DB
        return view('modificaFaq', ['faq'=>$faq]);
    }


    /*
     * Il metodo aggiuntaFaq permette di andare ad aggiungere una nuova F.A.Q. all'interno del database
     */
    function aggiuntaFaq(Request $request)
    {
        //creazione di un oggetto F.A.Q.
        $faq = new Faq();

        $faq->fill($request->validated());

        $faq->admin_ref = Auth::user()->id;

        //salvataggio della F.A.Q. all'interno della tabella F.A.Q.
        $faq->save();

        //redirect alla rotta di gestioneFaq con relativo messaggio di conferma di inserimento
        return redirect()->route('gestioneFaq')->with('message', 'Faq aggiunta con successo.');
    }

}
