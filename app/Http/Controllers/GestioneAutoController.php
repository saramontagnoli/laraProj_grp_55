<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use App\Models\Noleggio;
use Illuminate\Http\Request;


class GestioneAutoController extends Controller
{
    //funzione che gestisce le azioni CRUD per le auto
    function gestioneAuto(){
        return view('gestioneauto');
    }

    //funzione che gestisce la visualizzazione dei noleggi in base al mese e in base all'utente
    function visualizzanoleggi(Request $request){
        $mese = $request->input("mese");

        if ($mese!=null){
            $dbQuery = Noleggio::
                join("auto", "auto.codice_auto", "=", "noleggio.auto_ref")
                ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
                ->join("marca", "modello.marca_ref", "=", "marca.codice_marca");
            $listaNoleggi = Array();

            //si inserisce il risultato della query di base
            $listaNoleggi["listaNoleggi"] = $dbQuery;
        }
        return view('visualizzanoleggi', $listaNoleggi);
    }
}

