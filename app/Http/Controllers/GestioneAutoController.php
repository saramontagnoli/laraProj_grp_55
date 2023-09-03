<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use App\Models\Noleggio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GestioneAutoController extends Controller
{
    /*
     * Il metodo gestioneAuto consente di visualizzare tutte le auto per effettuarne la gestione
     */
    function gestioneAuto(){

        //query di estrazione di tutte le auto comprese di marca e modello
        $dbQuery = Auto::select("auto.*", "marca.nome_marca", "modello.nome_modello")
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->get();

        //return della vista gestioneauto con l'array contenente tutte le informazioni delle auto
        return view('gestioneauto', ['listaNoleggi' => $dbQuery]);
    }


    /*
     * Il metodo visualizzanoleggi permette di selezionare un mese e visionare i noleggi per quel mese durante l'anno corrente
     */
    function visualizzanoleggi(Request $request)
    {
        //estrazione del mese scelto per la visualizzazione dei noleggi
        $mese = $request->input("mese");

        //estrazione dell'anno corrente
        $annoCorrente = Carbon::now()->year;

        //query di estrazione dei noleggi effettuati tali che siano stati durante l'anno corrente e nel mese specificato
        $dbQuery = Noleggio::select("auto.targa", "marca.nome_marca", "modello.nome_modello", "noleggio.data_inizio", "noleggio.data_fine", "users.username")
            ->join("auto", "auto.codice_auto", "=", "noleggio.auto_ref")
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->join("users", "users.id", "=", "noleggio.utente_ref")
            ->where(function ($query) use ($mese, $annoCorrente) {
                $query->whereMonth('noleggio.data_inizio', $mese)
                    ->whereYear('noleggio.data_fine', $annoCorrente);
            })
            ->get();

        //return della vista visualizzanoleggi con l'array contenente tutti i noleggi effettuati nel mese specificato e anno corrente
        return view('visualizzanoleggi', ['listaNoleggi' => $dbQuery]);
    }


    /*
     * Il metodo riepilogoannuo permette all'admin (LIVELLO 4) di visualizzare il riepilogo dell'anno attuale con il numero di noleggi effettuati divisi per mese
     */
    function riepilogoannuo()
    {
        //estrazione dell'anno corrente
        $annoCorrente = Carbon::now()->year;

        //query di estrazione dei mesi e del numero di noleggi per ogni mese, raggruppati per mese
        $mesiNoleggi = Noleggio::select(DB::raw('MONTH(noleggio.data_inizio) as mese'), DB::raw('COUNT(*) as num_noleggi'))
            ->leftJoin('auto', 'noleggio.auto_ref', '=', 'auto.codice_auto')
            ->groupBy('mese')
            ->get();

        //definizione dei mesi da 1 (gennaio) a 12 (dicembre)
        $mesiDesiderati = range(1, 12);

        //si rende la variabile un array avvente la key uguale al mese
        $mesiNoleggi = $mesiNoleggi->keyBy('mese')->toArray();

        //costruisco un array che conterrà i dati finali
        $risultatiFinali = [];

        //scorro ogni mese e costruisco l'array ddei dati finali
        foreach ($mesiDesiderati as $mese) {
            //se il mese ha un n° di noleggio diverso da 0 lo inserisco nella variabile numNoleggi, altrimenti inserisco 0
            $numNoleggi = isset($mesiNoleggi[$mese]) ? $mesiNoleggi[$mese]['num_noleggi'] : 0;

            //riempio l'array dei risultati finali inserendo il mese di interesse e il numero dei noleggi
            $risultatiFinali[] = [
                'mese' => $mese,
                'num_noleggi' => $numNoleggi
            ];
        }

        //return dedlla vista del riepilogoannuo con l'array dei dati e l'anno corrente estratto
        return view('riepilogoannuo', ['risultatiFinali' => $risultatiFinali, 'annoCorrente' => $annoCorrente]);
    }


    /*
     * Il metodo getDatiAuto permette di riempire i campi della vista di modifica dei dati con i vecchi dati, ovvero i dati attuali
     */
    function getDatiAuto($codice_auto)
    {
       //query di estrazione dell'auto da modificare, ovvero l'auto selezionata che ha codice: $codice_auto
        $dati = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('auto.codice_auto', $codice_auto)
            ->first();

        //return della vista di modifica con i dati attuali dell'auto che deve essere modificata
        return view('modificaDatiAuto', ['dati' => $dati]);

    }

    /*
     * Il metodo modificaAuto permette di andare a modificare le informazioni di un'auto secondo quanto inserito nei campi della vista
     */
    public function modificaAuto(Request $request)
    {
        //estrazione de $request del codice dell'auto da modificare
        $codice_auto = $request->input('codice_auto');

        //validazione dei dati della form contenente i dati da modificare
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

        //query che ricerca l'auto specificata da modificare e aggiorna le informazioni inserite all'interno della form
        Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('codice_auto', $codice_auto)->update(
            [
                'targa'=>$request->input('targa'),
                'costo_giorno'=>$request->input('costo_giorno'),
                'num_posti'=>$request->input('num_posti'),
                'allestimento'=>$request->input('allestimento'),
            ]);

        //redirezione alla rotta di gestione delle auto
        return redirect()->route('/gestioneauto');
    }


    /*
     * Il metodo eliminaAuto permette di andaare a cancellare l'auto selezionata avente come codice: $codice_auto
     */
    function eliminaAuto($codice_auto)
    {
        //ricerca dell'auto da cancellare nella tabella noleggio
        $auto = Auto::with('noleggio')->findOrFail($codice_auto);

        //eliminazione effettiva dei noleggi dell'auto
        $auto->noleggio()->delete();

        //eliminazione effettiva dell'auto
        $auto->delete();

        //redirect alla rotta di gestione delle auto con messaggio di avvenuta cancellazione dell'auto
        return redirect()->route('/gestioneauto')->with('message', 'Auto eliminata con successo.');
    }
}


