<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Noleggio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller {

    public function index() {
        return view('home');
    }

    public function profilo() {
        return view('profilo');
    }

    // Ottenimento dati personali del Cliente, per la pagina Modifica dati personali del Cliente.
    function getDatiPersonali1(){
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();

        return view('modificaDati', ['dati'=>$data]);
    }

    // Modifica dei dati personali del cliente.
    function updateDatiPersonali1(Request $request)
    {
        // questo è lo username dell'utente che si è loggato
        $username = Auth::user()->username;

        // Validazione dei dati inviati dalla form di registrazione
        $request->validate([
            'nome' => ['required','string','max:20'],
            'cognome' => ['required','string','max:20'],
            'data_nascita' => ['required', 'date_format:Y-m-d'],
            'email' => ['string','email','max:30'],
            'password' => ['required','string','min:8']
        ]);

        if (!($request->input('password')))
        {
            User::where('username', $username)->update(
                [
                    'nome'=>$request->input('nome'),
                    'cognome'=>$request->input('cognome'),
                    'data_nascita'=>$request->input('data_nascita'),
                    'email'=>$request->input('email')
                ]);
        }
        else
        {
            $request->validate([
                'password' => ['required','string','min:8']
            ]);
            User::where('username', $username)->update(
                [
                    'nome'=>$request->input('nome'),
                    'cognome'=>$request->input('cognome'),
                    'data_nascita'=>$request->input('data_nascita'),
                    'password'=>Hash::make($request->input('password')),
                    'email'=>$request->input('email')
                ]);
        }

        return redirect()->route('user/profilo');
    }

    //funzione per noleggiare un'auto
    function noleggioAuto($codice_auto, Request $request)
    {
        $dbQuery = DB:: table('Auto')
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where ('codice_auto', $codice_auto)
            ->get();

        // Questo è l'array che contiene i dati che vengono inviati alla View
        $cardAuto = Array();

        $cardAuto["cardAuto"] = $dbQuery;


        $noleggio_inizio = $request->input("inizioNoleggio");
        $noleggio_fine = $request->input("fineNoleggio");

        if($noleggio_fine<$noleggio_inizio) {
            $popupMessage = "Errore, date non valide!";
            echo "<script>alert('$popupMessage');</script>";
            return view("autosingola", $cardAuto);
        }else {

            $noleggio_disponibile = Noleggio::whereBetween('data_inizio', [$noleggio_inizio, $noleggio_fine])
                ->orWhereBetween('data_fine', [$noleggio_inizio, $noleggio_fine])
                ->exists();

            if ($dbQuery->isEmpty()) {
                // L'auto selezionata non esiste
                $popupMessage = "Auto non trovata!";
                echo "<script>alert('$popupMessage');</script>";
                return view("autosingola", $cardAuto);
            } else if (! $noleggio_disponibile) {
                //variabile noleggio da inserire nel DB
                $noleggio = new Noleggio();
                // questo è lo username del cliente
                $user = Auth::user()->id;

                $noleggio->data_inizio = $noleggio_inizio;
                $noleggio->data_fine = $noleggio_fine;
                $noleggio->auto_ref = $codice_auto;
                $noleggio->utente_ref = $user;
                $noleggio->save();
                return view("noleggio", $cardAuto);

            } else {
                // L'auto è già prenotata nel periodo selezionato
                $popupMessage = "Auto non disponibile!";
                echo "<script>alert('$popupMessage');</script>";
                return view("autosingola", $cardAuto);
            }
        }
    }
}
