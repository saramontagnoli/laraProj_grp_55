<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

/*
 * Classe Controller per il catalogo auto
 */
class ControllerCatalogoAuto extends Controller
{
    // Ottiene tutte le offerte (assieme alle aziende a cui appartengono) per il Catalogo.
    function showCatalogoAuto()
    {
        $auto = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->get();
        $cardAuto["cardAuto"]=$auto;
        return view('catalogoauto', $cardAuto);
    }

    function showAutoSpec($ccodice_auto)
    {
        $auto = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('codice_auto', $ccodice_auto)
            ->get();
        $cardAuto["cardAuto"]=$auto;
        return view('autosingola', $cardAuto);
    }

    function showCatalogoAutoFiltri(Request $request)
    {
        //ricerca per prezzo
        $filtro_min = $request->input("min");
        $filtro_max = $request->input("max");

        //ricerca per periodo
        $filtro_inizio =$request->input("inizio");
        $filtro_fine =$request->input("fine");


        // Query di base per ottenere la lista di offerte e le aziende che le pubblicano
        $dbQuery = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca");

        // Questo è l'array che contiene i dati che vengono inviati alla View
        $cardAuto = Array();
        $cardAuto["cardAuto"]=$dbQuery;

        //query in base al prezzo
        if ($filtro_min < $filtro_max)
        {
            if($filtro_max != null)
            {
                $massimo = $dbQuery->where("auto.costo_giorno", "<=", $filtro_max);
                $massimo = $massimo->get();
                $cardAuto['cardAuto'] = $massimo;
            }

            if($filtro_min != null)
            {
                $minimo = $dbQuery->where("auto.costo_giorno", ">=", $filtro_min);
                $minimo = $minimo->get();
                $cardAuto['cardAuto'] = $minimo;
            }
        }
        if($filtro_min > $filtro_max)
        {
            $popupMessage = "Errore. Il prezzo minimo deve essere minore del prezzo massimo!";
            echo "<script>alert('$popupMessage');</script>";
        }


        //query in base al periodo
        if($filtro_inizio!=null && $filtro_fine!=null){
            if($filtro_inizio<=$filtro_fine)
            {
                $periodo = Auto::select('auto.costo_giorno', 'auto.foto_auto', 'auto.codice_auto', 'marca.nome_marca', 'modello.nome_modello')
                    ->join('modello', 'auto.modello_ref', '=', 'modello.codice_modello')
                    ->join('marca', 'modello.marca_ref', '=', 'marca.codice_marca')
                    ->whereNotIn('auto.codice_auto', function ($query) use ($filtro_inizio, $filtro_fine) {
                        $query->select('auto_ref')
                            ->from('noleggio')
                            ->whereBetween('data_inizio', [$filtro_inizio, $filtro_fine])
                            ->orWhereBetween('data_fine', [$filtro_inizio, $filtro_fine]);
                    })
                    ->orWhereNotIn('auto.codice_auto', function ($query) {
                        $query->select('noleggio.auto_ref')
                            ->from('noleggio');
                    })
                    ->groupBy( 'marca.nome_marca', 'modello.nome_modello', 'auto.codice_auto', 'auto.costo_giorno', 'auto.foto_auto')
                    ->get();

                $cardAuto["cardAuto"]=$periodo;
            }else if($filtro_inizio> $filtro_fine) {
                $popupMessage = "Errore, date non valide!";
                echo "<script>alert('$popupMessage');</script>";
            }
        }
        // Ritorno la View con i dati inseriti nell'array, che verranno visualizzati sulla View stessa.
        return view("catalogoauto", $cardAuto);

    }
}
