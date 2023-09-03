<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use App\Models\Marca;
use App\Models\Modello;
use App\Models\Noleggio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

    function riepilogoannuo()
    {
        $annoCorrente = Carbon::now()->year;

        $mesiNoleggi = Noleggio::select(DB::raw('MONTH(noleggio.data_inizio) as mese'), DB::raw('COUNT(*) as num_noleggi'))
            ->leftJoin('auto', 'noleggio.auto_ref', '=', 'auto.codice_auto')
            ->groupBy('mese')
            ->get();

        $mesiDesiderati = range(1, 12); // Tutti i mesi da gennaio a dicembre
        $mesiNoleggi = $mesiNoleggi->keyBy('mese')->toArray();

        $risultatiFinali = [];

        foreach ($mesiDesiderati as $mese) {
            $numNoleggi = isset($mesiNoleggi[$mese]) ? $mesiNoleggi[$mese]['num_noleggi'] : 0;
            $risultatiFinali[] = [
                'mese' => $mese,
                'num_noleggi' => $numNoleggi
            ];
        }

        return view('riepilogoannuo', ['risultatiFinali' => $risultatiFinali, 'annoCorrente' => $annoCorrente]);
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
        $modelli = modello::all(); // Recupera tutti i modelli dal database
        return view('aggiungiAuto', ['modelli' => $modelli]); // Passa i modelli alla vista
    }
    function aggiuntaAuto(Request $request)
    {
        // Valida i campi dell'auto
        $request->validate([
            'targa' => ['required', 'string', 'max:20', Rule::unique('Auto')],
            'marca_ref' => [ 'string', 'max:20'],
            'num_posti' => ['required', 'integer', 'min:2', 'max:9'],
            'costo_giorno' => ['required', 'numeric', 'min:0'],
            'allestimento' => ['string', 'max:255'],
            'foto_auto' => ['image', 'max:2048', Rule::unique('Auto')], // Max 2MB
        ]);

        // Verifica l'unicità della targa e del nome del file
        $existingAuto = Auto::where('targa', $request->input('targa'))
            ->orWhere('foto_auto', $request->file('foto_auto')->getClientOriginalName())
            ->first();

        if ($existingAuto) {
            return back()->with('error', 'La targa o il nome del file dell\'immagine esistono già nel database.');
        }

        $auto = new Auto();
        $auto->targa = $request->input('targa');
        $auto->modello_ref = $request->input('modello_ref');
        $auto->num_posti = $request->input('num_posti');
        $auto->costo_giorno = $request->input('costo_giorno');
        $auto->allestimento = $request->input('allestimento');

        // Gestione dell'immagine dell'auto
        if ($request->hasFile('foto_auto')) {
            $imageFile = $request->file('foto_auto');
            $imageName = $imageFile->getClientOriginalName();
            // Salva il file nella cartella delle auto
            $imagePathAuto = $imageFile->storeAs('public/assets/img', $imageName);
            // Ottieni il percorso completo del file (includendo "public/")
            $fullImagePath = storage_path('app/public/assets/img/' . $imageName);
            // Muovi il file dalla directory "storage" alla directory pubblica
            Storage::disk('public')->put('assets/img/' . $imageName, file_get_contents($fullImagePath));
            // Elimina il file temporaneo nella directory "storage"
            Storage::delete($imagePathAuto);
            // Salva solo il nome del file nel campo foto_auto
            $auto->foto_auto = 'assets/img/' . $imageName;
        }
        $auto->save();

        // Reindirizza o effettua altre operazioni necessarie
        return view('aggiungiAuto');
    }

}


