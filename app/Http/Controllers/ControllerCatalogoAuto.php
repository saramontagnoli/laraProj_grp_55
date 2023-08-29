<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

/*
 * Classe Controller per il catalogo auto generale
 */
class ControllerCatalogoAuto extends Controller
{
    /*
     * Il metodo showCatalogoAuto stampa tutto il catalogo contenente le auto
     */
    function showCatalogoAuto()
    {
        //query di estrazione di tutte le auto, query con due join per estrazione di informazioni riguardanti marca e modello dell'auto
        $auto = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->get();

        //inserimento del risultato della query all'interno di un oggetto $cardAuto
        $cardAuto["cardAuto"] = $auto;

        //return della vista contenente il catalogo completo
        return view('catalogoauto', $cardAuto);
    }


    /*
     * Il metodo showAutoSpec mostra l'auto selezionata con tutte le informazioni
     */
    function showAutoSpec($ccodice_auto)
    {
        //query di estrazione dal database della macchian specifica avente come codice $codice_auto
        $auto = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('codice_auto', $ccodice_auto)
            ->get();

        //inserimento del risultato della query all'interno di un oggetto $cardAuto
        $cardAuto["cardAuto"] = $auto;

        //return della vista dell'auto singola con relative informazioni
        return view('autosingola', $cardAuto);
    }


    /*
     * Il metodo showCatalogoAutoFiltri permette di filtrare il catalogo totale secondo 4 diversi parametri:
     *      - prezzo minimo
     *      - prezzo massimo
     *      - data inizio noleggio
     *      - data fine noleggio
     */
    function showCatalogoAutoFiltri(Request $request)
    {
        //da $request vengono estratte le informazioni contenute all'interno dei campi min e max (ovvero i prezzi filtro)
        $filtro_min = $request->input("min");
        $filtro_max = $request->input("max");

        //vengono controllati i filtri dei prezzi specificati
        if(($filtro_min > $filtro_max) && $filtro_max!=null)
        {
            //si stampa un messaggio di errore mediante popup perché i filtri sono errati
            $popupMessage = "Errore. Il prezzo minimo deve essere minore del prezzo massimo!";
            echo "<script>alert('$popupMessage');</script>";

            //essendo i filtri di prezzo errati viene ritornata la vista del catalogo VUOTA
            return view("catalogoauto");
        }

        //da $request vengono estratte le informazioni contenute all'interno dei campi inizio e fine (ovvero le date filtro)
        $filtro_inizio =$request->input("inizio");
        $filtro_fine =$request->input("fine");

        //vengono controllati i filtri delle date specificate
        if($filtro_inizio> $filtro_fine)
        {
            //si stampa un messaggio di errore mediante popup perché i filtri sono errati
            $popupMessage = "Errore. Date inserite non valide";
            echo "<script>alert('$popupMessage');</script>";

            //essendo i filtri di data errati viene ritornata la vista del catalogo VUOTA
            return view("catalogoauto");
        }

        //si controlla se tutti e 4 i filtri non sono stati settati contemporaneamente
        if($request->isNotFilled('min') && $request->isNotFilled('max') && $request->isNotFilled('inizio') && $request->isNotFilled('fine'))
        {
            //se tutti i filtri sono notFilled allora viene stampato un popup di errore
            $popupMessage = "Errore. Nessun filtro selezionato";
            echo "<script>alert('$popupMessage');</script>";

            //essendo i filtri non settati viene ritornata la vista del catalogo VUOTA
            return view("catalogoauto");
        }else
        {
            //Altrimenti se almeno uno dei filtri è stato settato si procede con il ritrno della vista in base ai filtri specificati

            //query di base di estrazione di tutte le auto comprese di marce e modello (grazie ai due join)
            $dbQuery = Auto::select('auto.costo_giorno', 'auto.foto_auto', 'auto.codice_auto', 'marca.nome_marca', 'modello.nome_modello')
                ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
                ->join("marca", "modello.marca_ref", "=", "marca.codice_marca");

            //definizione dell'array per l'invio dei dati estratti alla View
            $cardAuto = Array();

            //si inserisce il risultato della query di base
            $cardAuto["cardAuto"] = $dbQuery;


            if($filtro_min < $filtro_max)
            {
                //se è stato settato il $filtro_max (ovvero il prezzo massimo per le auto)
                if($filtro_max != null)
                {
                    //si aggiunge una condizione alla query di base precedentemente eseguita, specificando il prezzo massimo
                    $massimo = $dbQuery->where("auto.costo_giorno", "<=", $filtro_max);

                    //si estraggono i risultati
                    $massimo = $massimo->get();

                    //si aggiorna il contenuto da inviare alla view
                    $cardAuto['cardAuto'] = $massimo;
                }

                //se è stato settato il $filtro_min (ovvero il prezzo minimo per le auto)
                if($filtro_min != null)
                {
                    //si aggiunge una condizione alla query di base precedentemente eseguita, specificando il prezzo minimo
                    $minimo = $dbQuery->where("auto.costo_giorno", ">=", $filtro_min);

                    //si estraggono i risultati
                    $minimo = $minimo->get();

                    //si aggiorna il contenuto da inviare alla view
                    $cardAuto['cardAuto'] = $minimo;
                }
            }

            //se sono state settate entrambe le date di inizio e fine
            if($filtro_inizio!=null && $filtro_fine!=null){

                if($filtro_inizio<=$filtro_fine) {
                    //si estrae dal DB l'insieme delle auto che in quel periodo sono libere e non già noleggiate
                    $periodo = $dbQuery->whereNotIn('auto.codice_auto', function ($query) use ($filtro_inizio, $filtro_fine) {
                        $query->select('auto_ref')
                            ->from('noleggio')
                            ->whereBetween('data_inizio', [$filtro_inizio, $filtro_fine])
                            ->orWhereBetween('data_fine', [$filtro_inizio, $filtro_fine]);
                    })
                        ->groupBy('marca.nome_marca', 'modello.nome_modello', 'auto.codice_auto', 'auto.costo_giorno', 'auto.foto_auto')
                        ->get();

                    //viene inserito il risultato della query nell'array per ritornare i dati alla view
                    $cardAuto["cardAuto"] = $periodo;
                }
            }
        }

        // Ritorno la View con i dati inseriti nell'array, che verranno visualizzati sulla View stessa.
        return view("catalogoauto", $cardAuto);
    }
}
