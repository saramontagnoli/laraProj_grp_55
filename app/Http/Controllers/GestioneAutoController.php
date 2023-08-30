<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use App\Models\Noleggio;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GestioneAutoController extends Controller
{
    //funzione che gestisce le azioni CRUD per le auto
    function gestioneAuto(){
        $dbQuery = Auto::select("auto.*", "marca.nome_marca", "modello.nome_modello")
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->get();
        return view('/gestioneauto', ['listaNoleggi' => $dbQuery]);
    }

    function visualizzanoleggi(Request $request)
    {
        $mese = $request->input("mese");
        $annoCorrente = Carbon::now()->year;
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
        return view('visualizzanoleggi', ['listaNoleggi' => $dbQuery]);
    }

    //fIl metodo getDatiAuto consente di estrarre i dati delle auto che lo staff ha intenzione di modificare
    //     * Questo serve per riempire i campi di modifica con i campi precedentemente impostati
    function getDatiAuto()
    {

    }
    //metodo per la modifica delle auto (livello 3)
    function modificaAuto($codice_auto)
    {
        return view ('modificadatiauto');
    }


    function eliminaAuto($codice_auto)
    {
        $auto = Auto::with('noleggio')->findOrFail($codice_auto);

        // Elimina i noleggi correlati utilizzando la relazione
        $auto->noleggio()->delete();

        // Elimina l'auto stessa
        $auto->delete();
        return redirect()->route('/gestioneauto')->with('message', 'Auto eliminata con successo.');
    }
}


