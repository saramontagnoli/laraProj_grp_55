<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Modello;
use App\Models\Noleggio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;


class GestioneAutoController extends Controller
{
    /*
     * Il metodo gestioneAuto consente di andare ad estrarre tutte le auto comrpese di marca e modello per visualizzare la tabella di gestione
     */
    function gestioneAuto(){

        //query di estrazione delle auto comprese di marca e modello
        $dbQuery = Auto::select("auto.*", "marca.nome_marca", "modello.nome_modello")
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->get();

        //return della vista di gestione delle auto con la lista delle auto estratte in precedenza
        return view('gestioneauto', ['listaNoleggi' => $dbQuery]);
    }


    /*
     * Il metodo visualizzanoleggi permette di andare a selezionare un mese dell'anno corrente e visualizzare tutti i noleggi effettuati in quel mese
     */
    function visualizzanoleggi(Request $request)
    {
        //estrazione del mese selezionato
        $mese = $request->input("mese");

        //estrazione dell'anno corrente
        $annoCorrente = Carbon::now()->year;

        //query di estrazione dei noleggi (e relativi dati) effettuati nel mese specificato dell'anno corrente, raggruppati per mese
        $dbQuery = Noleggio::select("auto.targa", "marca.nome_marca", "modello.nome_modello", "noleggio.data_inizio", "noleggio.data_fine", "users.username")
            ->join("auto", "auto.codice_auto", "=", "noleggio.auto_ref")
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->join("users", "users.id", "=", "noleggio.utente_ref")
            ->whereMonth('noleggio.data_inizio', $mese)
            ->whereYear('noleggio.data_fine', $annoCorrente)
            ->get();

        //return della vista di visualizzazione con i noleggi effettuati nel mese dell'anno corrente e l'anno corrente
        return view('visualizzanoleggi', ['listaNoleggi' => $dbQuery, 'annoCorrente' => $annoCorrente]);
    }


    /*
     * Il metodo getDatiAuto permette di estrarre i dati correnti dell'auto selezionata per la modifica, in modo ad riempire i campi con i dati da modificare
     */
    function getDatiAuto($codice_auto)
    {
       //estrazione delle informazioni dell'auto con $codice_auto da modificare
        $dati = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('auto.codice_auto', $codice_auto)
            ->first();

        //return della vista di modifica delle auto con i relativi dati
        return view('modificaDatiAuto', ['dati' => $dati]);

    }


    /*
     * Il metodo modificaAuto consente di andare ad aggiornare i dati dell'auto e quindi modificare le informazioni secondo la form
     */
    public function modificaAuto(Request $request)
    {
        //estrazione del codice dell'auto da modificare
        $codice_auto = $request->input('codice_auto');

        //validazione dei campi della form
        $request->validate([
            'targa' => [
                'string',
                'max:20',
                'required',
                Rule::unique('auto', 'targa')->ignore($codice_auto, 'codice_auto')
            ],
            'costo_giorno' => ['numeric', 'min:0'],
            'num_posti' => ['integer', 'min:2', 'max:9'],
            'allestimento' => ['string', 'max:500'],
        ]);

        //query di updatee dei dati dell'auto precedentemente validati
        Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('codice_auto', $codice_auto)->update(
            [
                'targa'=>$request->input('targa'),
                'costo_giorno'=>$request->input('costo_giorno'),
                'num_posti'=>$request->input('num_posti'),
                'allestimento'=>$request->input('allestimento'),
            ]);

        //redirect alla rotta di gestione delle auto con messaggio di avvenuta modifica
        return redirect()->route('gestioneauto')->with('message', 'Auto modificata con successo.');
    }


    /*
     * Il metodo eliminaAuto permette di andare ad eliminare l'auto selezionata dalla tabella di gestione
     */
    function eliminaAuto($codice_auto)
    {
        //query di estrazione dell'auto da eliminare avente codice $codice_auto, trova anche i noleggi SE l'auto è stata noleggiata
        $auto = Auto::with('noleggio')->findOrFail($codice_auto);

        //eliminazione dei noleggi a carico dell'auto
        $auto->noleggio()->delete();

        //eliminazione effettiva dell'auto
        $auto->delete();

        //redirect alla rotta di gestioneauto con messaggio di avvenuta eliminazione
        return redirect()->route('gestioneauto')->with('message', 'Auto eliminata con successo.');
    }


    /*
     * Il metodo getAggiuntaAuto permette di
     */
    function getAggiuntaAuto()
    {
        $data = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
                 ->join("marca", "modello.marca_ref", "=", "marca.codice_marca");
        return view('aggiungiAuto', ['ListaNomi'=>$data]);
    }

    public function getModello()
    {
        $modelli = modello::all();
        return view('aggiungiAuto', ['modelli' => $modelli]);
    }

    public function aggiuntaAuto(Request $request)
    {
        // Valida i campi dell'auto
        $request->validate([
            'targa' => ['string', 'max:20', 'required', Rule::unique('auto')],
            'costo_giorno' => ['numeric', 'min:0'],
            'num_posti' => ['integer', 'min:2', 'max:9'],
            'allestimento' => ['string', 'max:255'],
            'modello_ref' => ['required'],
            'foto_auto' => ['required', 'image', 'max:2048',
                Rule::unique('auto', 'foto_auto')->where(function ($query) use ($request) {
                    // Verifica l'unicità del nome del file dell'immagine
                    return $query->where('foto_auto', $request->file('foto_auto')->getClientOriginalName());
                }),
            ],
        ]);

        // Creazione di un nuovo oggetto Auto
        $auto = new Auto();
        $auto->targa = $request->input('targa');
        $auto->costo_giorno = $request->input('costo_giorno');
        $auto->num_posti = $request->input('num_posti');
        $auto->allestimento = $request->input('allestimento');
        $auto->modello_ref = $request->input('modello_ref');

        // Gestione dell'immagine dell'auto
        if ($request->hasFile('foto_auto')) {
            $imageFile = $request->file('foto_auto');
            $imageName = $imageFile->getClientOriginalName();
            // Salva il file nella cartella pubblica
            $imageFile->move(public_path('assets/img'), $imageName);

            // Salva solo il nome del file nel campo foto_auto
            $auto->foto_auto = 'assets/img/' . $imageName;
        }


        // Salva l'auto nel database
        $auto->save();

        // Reindirizza o effettua altre operazioni necessarie
        return view('gestioneauto');
    }



}


