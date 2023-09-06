<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Modello;
use App\Models\Noleggio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;



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
        return view('gestioneauto', ['listaAuto' => $dbQuery]);
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
     * Il metodo di riepilogoannuo permette di andare a effettuare un riepilogo del numero di noleggi per ogni mese dell'anno corrente
     */
    function riepilogoannuo()
    {
        //estrazione dell'anno corrente mediante Carbon
        $annoCorrente = Carbon::now()->year;

        //estrazione delle informazioni del numero dei noleggi dell'anno corrente, raggruppati per mese
        $mesiNoleggi = Noleggio::select(DB::raw('MONTH(noleggio.data_inizio) as mese'), DB::raw('COUNT(*) as num_noleggi'))
            ->leftJoin('auto', 'noleggio.auto_ref', '=', 'auto.codice_auto')
            ->groupBy('mese')
            ->get();

        //predisposizione variabile con i mesi da 1 a 12
        $mesiDesiderati = range(1, 12);

        //conversione in array avente come key il mese
        $mesiNoleggi = $mesiNoleggi->keyBy('mese')->toArray();

        //dichiarazione della variabile array risultatiFinali che permette di inserire il mese con il realtivo numero di noleggi
        $risultatiFinali = [];

        foreach ($mesiDesiderati as $mese) {
            //se il numero di noleggi è settato viene inserito, altrimenti se è 0 viene inserito 0
            $numNoleggi = isset($mesiNoleggi[$mese]) ? $mesiNoleggi[$mese]['num_noleggi'] : 0;

            //inserimento all'intenro dell'array del mese e del numero di noleggi
            $risultatiFinali[] = [
                'mese' => $mese,
                'num_noleggi' => $numNoleggi
            ];
        }

        //return alla vista di riepilogo annuo con i dati di mesi e numero noleggi, e anno corrente
        return view('riepilogoannuo', ['risultatiFinali' => $risultatiFinali, 'annoCorrente' => $annoCorrente]);
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
    function modificaAuto(Request $request)
    {
        //estrazione del codice dell'auto da modificare
        $codice_auto = $request->input('codice_auto');

        //validazione dei campi della form
        $request->validate([
            'targa' => [
                'string',
                'max:20',
                'required',
                Rule::unique('auto', 'targa')->ignore($codice_auto, 'codice_auto') //regola di unique per la targa dell'auto
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
        // Query di estrazione dell'auto da eliminare avente codice $codice_auto, trova anche i noleggi SE l'auto è stata noleggiata
        $auto = Auto::with('noleggio')->findOrFail($codice_auto);

        // Eliminazione dei noleggi a carico dell'auto
        $auto->noleggio()->delete();

        //eliminazione della foto dell'auto
        unlink($auto->foto_auto);

        //eliminazione effettiva dell'auto
        $auto->delete();

        //redirect alla rotta di gestioneauto con messaggio di avvenuta eliminazione
        return redirect()->route('gestioneauto')->with('message', 'Auto eliminata con successo.');
    }


    /*
     * Il metodo getModello permette di estrarre tutti i modelli di auto presenti nel database
     */
    function getModello()
    {
        //query di estrazione dei modelli contenuti nella tabella modello del database
        $modelli = modello::orderBy('nome_modello')->get();

        //return della vista di aggiunta dell'auto in cui verrà inserita una tendina per visionare i modelli
        return view('aggiungiAuto', ['modelli' => $modelli]);
    }


    /*
     * Il metodo aggiuntaAuto permette di andare ad aggiungere al catalogo delle auto
     */
    function aggiuntaAuto(Request $request)
    {
        //validazione delle informazioni inserite all'interno della form con relative regole
        $request->validate([
            'targa' => ['string', 'max:20', 'required', Rule::unique('auto')],
            'costo_giorno' => ['numeric', 'min:0'],
            'num_posti' => ['integer', 'min:2', 'max:9'],
            'allestimento' => ['string', 'max:600'],
            'modello_ref' => ['required'],
            'foto_auto' => ['required', 'image', 'max:2048']
        ]);

        //creazione di un oggetto auto
        $auto = new Auto();

        //inserimento di tutte le informazioni dell'auto all'interno dell'oggetto
        $auto->targa = $request->input('targa');
        $auto->costo_giorno = $request->input('costo_giorno');
        $auto->num_posti = $request->input('num_posti');
        $auto->allestimento = $request->input('allestimento');
        $auto->modello_ref = $request->input('modello_ref');

        //gestione dell'immagine caricata
        if ($request->hasFile('foto_auto')) {
            $imageFile = $request->file('foto_auto');
            $imageName = $imageFile->getClientOriginalName();
            //salvataggio della foto in assets/img, concatenato vi è il nome del file
            $imageFile->move(public_path('assets/img'), $imageName);

            // Salva solo il nome del file nel campo foto_auto
            $auto->foto_auto = 'assets/img/' . $imageName;
        }

        //query per l estrazione del databese per verificare se la foto è gia presente nel db
        $dati = Auto::select('auto.foto_auto')
            ->get();
        foreach ($dati as $dato){
            if($dato->foto_auto==$auto->foto_auto){
                return redirect()->route('gestioneauto')->with('message', 'Foto auto già presente nel db.');
            }
        }
        //salvataggio dell'auto all'interno del database
        $auto->save();

        //redirect alla rotta di gestioneauto con realativo messaggio di avvenuta aggiunta
        return redirect()->route('gestioneauto')->with('message', 'Auto aggiunta con successo.');
    }

}


