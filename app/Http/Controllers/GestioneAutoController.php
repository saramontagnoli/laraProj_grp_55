<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use App\Models\Noleggio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class GestioneAutoController extends Controller
{
    //funzione che gestisce le azioni CRUD per le auto
    function gestioneAuto(){
        return view('gestioneauto');
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
}

