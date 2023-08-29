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

    /*
     * Il metodo index consente di accedere alla home dell'utente di livello 2
     */
    public function index() {
        //return della vista della home del cliente
        return view('home');
    }


    /*
     * Il metodo profilo consente di accedere al profilo dedll'utente che si è autenticato ed ha effettuato il login al sito
     */
    public function profilo() {
        //return della vista del profilo del cliente
        return view('profilo');
    }


    /*
     * Il metodo getDatiPersonali consente di estrarre i dati del cliente che ha intenzione di modificare i dati
     * Questo serve per riempire i campi di modifica con i campi precedentemente impostati
     */
    function getDatiPersonali1(){
        //estrazione dello username del cliente
        $username = Auth::user()->username;

        //query di estrazione dell'utente dal database
        $data = User::where('username', $username)->first();

        //return della vista di modifica dei dati, compilando i campi di modifica con i dati vecchi estratti dal DB
        return view('modificaDati', ['dati'=>$data]);
    }


    /*
     * Il metodo updateDatiPersonali permette di andare ad aggiornare effettivamente i dati del cliente, secondo i nuovi input
     */
    function updateDatiPersonali1(Request $request)
    {
        //estrazione dello username del cliente
        $username = Auth::user()->username;

        //validazione dei dati della form di modifica
        $request->validate([
            'nome' => ['required','string','max:20'],
            'cognome' => ['required','string','max:20'],
            'data_nascita' => ['required', 'date_format:Y-m-d'],
            'email' => ['string','email','max:30'],
            'password' => ['required','string','min:8']
        ]);


        //se il campo password è vuoto i dati vengono aggiornati senza cambiare la password vecchia
        if (!($request->input('password')))
        {
            //query di update delle informazioni dell'utente senza password
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
            //se il campo password è pieno, la password viene valida e vengono aggiornati tutti i dati
            $request->validate([
                'password' => ['required','string','min:8']
            ]);

            //query di update delle informazioni dell'utente compresa la password
            User::where('username', $username)->update(
                [
                    'nome'=>$request->input('nome'),
                    'cognome'=>$request->input('cognome'),
                    'data_nascita'=>$request->input('data_nascita'),
                    'password'=>Hash::make($request->input('password')),
                    'email'=>$request->input('email')
                ]);
        }

        //redirezione alla rotta del profilo dell'utente
        return redirect()->route('user/profilo');
    }


    /*
     * Il metodo noleggioAuto permette ad un cliente che si è autenticato di noleggiare un'auto
     */
    function noleggioAuto($codice_auto, Request $request)
    {
        //query di estrazione dell'auto selezionata (con codice $codice_auto) comprese di informazioni di marca e modello
        $dbQuery = DB:: table('Auto')
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where ('codice_auto', $codice_auto)
            ->get();

        //definizione dell'array che conterrà le informazioni da passare alla view
        $cardAuto = Array();

        //inserimento del risultato della query all'interno dell'array
        $cardAuto["cardAuto"] = $dbQuery;

        //estrazione delle date del noleggio richieste da $request per quell'auto
        $noleggio_inizio = $request->input("inizioNoleggio");
        $noleggio_fine = $request->input("fineNoleggio");

        //controllo esattezza delle date inserite
        if($noleggio_fine<$noleggio_inizio) {
            //se le date sono sbaglaite viene stampato un popup di errore e si viene rimandati alla scheda dell'auto che si aveva intenzione di noleggiare
            $popupMessage = "Errore, date non valide!";
            echo "<script>alert('$popupMessage');</script>";

            //ritorno della vista dell'auto singola che si intendeva noleggiare
            return view("autosingola", $cardAuto);
        }else {

            //query di verifica per la disponibilità dell'auto selezionata nelle date specificate
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

                $dbQuery = DB:: table('noleggio')
                    ->where ('auto_ref', $codice_auto)
                    ->where('data_inizio', '=', $noleggio_inizio)
                    ->where('data_fine', '=', $noleggio_fine)
                    ->get();

                $cardAuto["cardAuto"] = $dbQuery;

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
