<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Support\Facades\Log;

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

        return view('catalogoauto', ['cardAuto'=>$auto]);
    }

    function showAutoSpec($ccodice_auto)
    {
        $auto = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('codice_auto', $ccodice_auto)
            ->get();

        return view('autosingola', ['cardAuto'=>$auto]);
    }

}
