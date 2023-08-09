<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Facades\Log;

/*
 * Definizione del Controller delle F.A.Q.
 */
class ControllerFaq extends Controller
{
    // Ottiene l'intera lista di FAQ, utilizzata per la pagina di Gestione FAQ
    function showFaq()
    {
        $data = faq::all();
        return view('faq', ['faq'=>$data]);
    }
}
