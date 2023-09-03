<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use App\Models\Marca;
use App\Models\Modello;
use App\Models\Noleggio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


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
    function getDatiAuto($codice_auto)
    {
       // $auto = Auto::findOrFail($codice_auto);
        $dati = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('auto.codice_auto', $codice_auto)
            ->first();
        return view('modificaDatiAuto', ['dati' => $dati]);

    }

    public function modificaAuto(Request $request)
    {
        // Recupera l'auto in base al codice_auto
        $codice_auto = $request->input('codice_auto');
        // Valida i dati della form di modifica
        $request->validate([
            'targa' => [
                'string',
                'max:20',
                'required',
                Rule::unique('auto', 'targa')->ignore($codice_auto, 'codice_auto')
            ],
            'costo_giorno' => ['numeric', 'min:0'],
            'num_posti' => ['integer', 'min:2', 'max:9'],
            'allestimento' => ['string', 'max:255'],
        ]);

        Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where('codice_auto', $codice_auto)->update(
            [
                'targa'=>$request->input('targa'),
                'costo_giorno'=>$request->input('costo_giorno'),
                'num_posti'=>$request->input('num_posti'),
                'allestimento'=>$request->input('allestimento'),
            ]);
        // Redirezione alla rotta desiderata dopo la modifica
        return redirect()->route('/gestioneauto');
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


